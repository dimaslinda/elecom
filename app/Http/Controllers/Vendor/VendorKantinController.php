<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Kantin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Support\Str;

class VendorKantinController extends Controller
{
    public function index(Request $request): View
    {
        $user = $request->user();
        $kantin = Kantin::where('user_id', $user->id)->first();
        // if (!$kantin) {
        //     return view('vendor/profile', compact('user'));
        // } else {
        //     return view('vendor/profile', compact('user', 'kantin'));
        // }
        // dd($kantin);

        return view('vendor/profile', compact('user', 'kantin'));
    }

    public function store(Request $request)
    {

    if($request->hasFile('image')) {
        $image = $request->file('image');
        $image_name = rand(0, 9999).$image->getClientOriginalName();
        $image_full_name = $image_name;
        $upload_path = 'uploads/kantins/';
        $image_url = $upload_path.$image_full_name;
        Storage::putFileAs($upload_path, $image, $image_full_name);
        // $image->move($upload_path, $image_full_name);
    }

    $save = Kantin::create([
        'kantin_name' => $request->kantin_name,
        'slug' => Str::slug($request->kantin_name),
        'kantin_description' => $request->kantin_description,
        'image' => $image_name,
        'user_id' => $request->user()->id,
    ]);

    return redirect()->back()->with('status', 'profile-updated');

    }

    public function update(Request $request, $id)
    {
        $kantin = Kantin::find($id);

        if($request->hasFile('image')) {
            $oldImageName = $kantin->image;
            $oldFile = Storage::exists('uploads/kantins/'.$oldImageName);
            if (!empty($oldFile)) {
                Storage::delete('uploads/kantins/'.$oldImageName);
                $image_name = rand(0, 9999).$request->file('image')->getClientOriginalName();
                $image_full_name = $image_name;
                $upload_path = 'uploads/kantins/';
                Storage::putFileAs($upload_path, $request->file('image'), $image_full_name);
            }
            // else {
            //     $image = $request->file('image');
            //     $image_name = $image->getClientOriginalName();
            //     $image_full_name = $image_name;
            //     $upload_path = 'uploads/kantins/';
            //     // Storage::putFile($upload_path, $image);
            //     Storage::putFileAs($upload_path, $image, $image_full_name);
            // }
            // $image = $request->file('image');
            // $image_name = $image->getClientOriginalName();
            // $image_full_name = $image_name;
            // $upload_path = 'uploads/kantins/';
            // // Storage::putFile($upload_path, $image);
            // Storage::putFileAs($upload_path, $image, $image_full_name);
        } else {
            $image_name = $kantin->image;
        }

        $dataupdate = [
            'kantin_name' => $request->kantin_name,
            'slug' => Str::slug($request->kantin_name),
            'kantin_description' => $request->kantin_description,
            'image' => $image_name,
            'user_id' => $request->user()->id,
        ];
        $kantin->update($dataupdate);
        return redirect()->back()->with('status', 'profile-updated');
    }
}

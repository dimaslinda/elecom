<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Kantin;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VendorProductController extends Controller
{
    public function index()
    {
        $iduser = auth()->user()->id;
        $product = Product::where('user_id', $iduser)->get();
        $product_makanan = Product::where('category_id', 1)->where('user_id', $iduser)->get();
        $product_minuman = Product::where('category_id', 2)->where('user_id', $iduser)->get();
        $product_snack = Product::where('category_id', 3)->where('user_id', $iduser)->get();
        return view('vendor/product', compact('product_makanan', 'product_minuman', 'product_snack', 'product'));
    }


    public function create()
    {
        $kantin = Kantin::where('user_id', auth()->user()->id)->first();
        // dd($kantin);
        return view('vendor/product-create', compact('kantin'));
    }

    public function store(Request $request)
    {
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = rand(0, 9999).$image->getClientOriginalName();
            $image_full_name = $image_name;
            $upload_path = 'uploads/products/';
            $image_url = $upload_path.$image_full_name;
            Storage::putFileAs($upload_path, $image, $image_full_name);
        }

        $save = Product::create([
            'product_name' => $request->product_name,
            'product_description' => $request->product_description,
            'product_price' => $request->product_price,
            'image' => $image_name,
            'product_stock' => $request->product_stock,
            'kalori' => $request->kalori,
            'kandungan_gizi' => implode(',', $request->kandungan_gizi),
            'category_id' => $request->category_id,
            'user_id' => $request->user()->id,
            'kantin_id' => $request->kantin_id,
        ]);

        $notification = array(
            'message' => 'Menu Baru Ditambahkan',
            'alert-type' => 'success'
        );

        return redirect()->route('kantin.product')->with($notification);
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $kandungan = explode(',', $product->kandungan_gizi);
        return view('vendor/product-edit', compact('product', 'kandungan'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if($request->hasFile('image')) {
            $oldImageName = $product->image;
            $oldFile = Storage::exists('uploads/products/'.$oldImageName);
            if (!empty($oldFile)) {
                Storage::delete('uploads/products/'.$oldImageName);
                $image_name = rand(0, 9999).$request->file('image')->getClientOriginalName();
                $image_full_name = $image_name;
                $upload_path = 'uploads/products/';
                Storage::putFileAs($upload_path, $request->file('image'), $image_full_name);
            }
            // else {
            //     $image = $request->file('image');
            //     $image_name = rand(0, 9999).$image->getClientOriginalName();
            //     $image_full_name = $image_name;
            //     $upload_path = 'uploads/products/';
            //     // Storage::putFile($upload_path, $image);
            //     Storage::putFileAs($upload_path, $image, $image_full_name);
            // }
            // $image = $request->file('image');
            // $image_name = $image->getClientOriginalName();
            // $image_full_name = $image_name;
            // $upload_path = 'uploads/products/';
            // Storage::putFileAs($upload_path, $image, $image_full_name);
        } else {
            $image_name = $product->image;
        }

        $save = $product->update([
            'product_name' => $request->product_name,
            'product_description' => $request->product_description,
            'product_price' => $request->product_price,
            'image' => $image_name,
            'product_stock' => $request->product_stock,
            'kalori' => $request->kalori,
            'kandungan_gizi' => implode(',', $request->kandungan_gizi),
            'category_id' => $request->category_id,
            'user_id' => $request->user()->id,
        ]);

        $notification = array(
            'message' => 'Menu Berhasil Diubah',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    public function destroy($id)
    {
        $product = Product::find($id);
        // dd($product);
        $oldImageName = $product->image;
        $oldFile = Storage::exists('uploads/products/'.$oldImageName);
        if (!empty($oldFile)) {
            Storage::delete('uploads/products/'.$oldImageName);
        }
        $product->delete();

        $notification = array(
            'message' => 'Menu Berhasil Dihapus',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}

<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Kantin;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorMainController extends Controller
{
    public function index()
    {
        $kantin = Kantin::where('user_id', Auth::user()->id)->first();
        $orders = Order::where('kantin_id', $kantin->id)->get();
        $count = $orders->where('created_at', '>=', date('Y-m-d') . '')->where('status_message', '!=', 3)->where('status_message', '!=', 4)->count();
        return view ('vendor/dashboard', compact('kantin', 'orders', 'count'));
    }

    public function antrian()
    {
        $kantin = Kantin::where('user_id', Auth::user()->id)->first();
        $orders = Order::where('kantin_id', $kantin->id)->where('created_at', '>=', date('Y-m-d') . '')->where('status_message', '!=', 3)->where('status_message', '!=', 4)->orderBy('id', 'desc')->get();
        return view ('vendor/antrian', compact('kantin', 'orders'));
    }

    public function statuskantin(Request $request, $id)
    {
        $kantin = Kantin::find($id);
        $dataupdate = [
            'status' => $request->status,
        ];
        $kantin->update($dataupdate);
        return redirect()->back();
    }
}

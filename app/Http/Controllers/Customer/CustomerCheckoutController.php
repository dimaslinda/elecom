<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerCheckoutController extends Controller
{

    public function index()
    {
        return view('customer.checkout');
    }

    public function status()
    {
        return view('customer.status');
    }

    public function riwayat()
    {
        $riwayat = Order::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        return view('customer.riwayat', compact('riwayat'));
    }
}

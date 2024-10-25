<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Kantin;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $kantin = Kantin::where('status', 1)->get();
        return view('index', compact('kantin'));
    }

    public function detailkantin($slug)
    {
        $cart = Cart::where('user_id', Auth::id())->get();
        $kantin = Kantin::where('slug', $slug)->first();
        $product = Product::where('user_id', $kantin->user_id)->get();
        $product_makanan = Product::where('category_id', 1)->where('user_id', $kantin->user_id)->get();
        $product_minuman = Product::where('category_id', 2)->where('user_id', $kantin->user_id)->get();
        $product_snack = Product::where('category_id', 3)->where('user_id', $kantin->user_id)->get();
        // dd($product);
        return view('detailkantin', compact('kantin', 'product', 'product_makanan', 'product_minuman', 'product_snack', 'cart'));
    }
}

<?php

namespace App\Livewire\Frontend\Checkout;

use App\Models\Kantin;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CheckoutShow extends Component
{
    public function render()
    {
        $orders = Order::where('user_id', Auth::user()->id)->where('created_at', '>=', date('Y-m-d'))->where('status_message', '!=', 4)->orderBy('id', 'desc')->get();
        return view('livewire.frontend.checkout.checkout-show', [
            'orders' => $orders
        ]);
    }
}

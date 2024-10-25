<?php

namespace App\Livewire\Frontend\Cart;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Order_item;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;

class CartShow extends Component
{
    public $cart;

    public $fullname, $email;

    public function placeOrder()
    {
        foreach($this->cart as $cartItem)
        {
            $order = Order::create([
                'user_id' => Auth::id(),
                'kantin_id' => $cartItem->kantin_id,
                'tracking_no' => 'KAN'. Str::random(10),
                'fullname' => $this->fullname,
                'email' => $this->email,
                'status_message' => '0',
            ]);

            $orderItems = Order_item::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'quantity' =>   $cartItem->quantity,
                'price' => $cartItem->product->product_price,
            ]);
        }

        return $order;
    }

    public function codOrder()
    {
        $codOrder = $this->placeOrder();

        if($codOrder)
        {
            Cart::where('user_id', Auth::id())->delete();
            return redirect()->route('status')->with('success', 'Pesanan Berhasil di Checkout');
        } else {
            return redirect()->back()->with('error', 'Pesanan gagal di Checkout');
        }
    }

    public function decrementQuantity($cartId)
    {
        $cartData = Cart::where('id', $cartId)->where('user_id', Auth::id())->first();
        if($cartData)
        {
            if($cartData->quantity > 1)
            {
                if($cartData->product->product_stock > $cartData->quantity)
            {
                $cartData->decrement('quantity');
                session()->flash('success', 'Quantity Produk Berhasil di Update');
            }
            } else {
                $cartRemoveData = Cart::where('user_id', Auth::id())->where('id', $cartId)->first();
                session()->flash('success', 'Produk Berhasil di Hapus');
                if($cartRemoveData)
                {
                    $cartRemoveData->delete();

                    $this->dispatch('CartAddedUpdated');

                    session()->flash('success', 'Produk Berhasil di Hapus');
                } else {
                    session()->flash('error', 'Produk gagal di Hapus');
                }
            }

        } else {
            session()->flash('error', 'Quantity gagal di Update');
        }
    }

    public function incrementQuantity($cartId)
    {
        $cartData = Cart::where('id', $cartId)->where('user_id', Auth::id())->first();
        if($cartData)
        {
            if($cartData->product->product_stock > $cartData->quantity)
            {
                $cartData->increment('quantity');
                session()->flash('success', 'Quantity Produk Berhasil di Update');
            }

        } else {
            session()->flash('error', 'Quantity gagal di Update');
        }
    }

    public function removeCartItem($cartId)
    {
        $cartRemoveData = Cart::where('user_id', Auth::id())->where('id', $cartId)->first();
        session()->flash('success', 'Produk Berhasil di Hapus');
        if($cartRemoveData)
        {
            $cartRemoveData->delete();

            $this->dispatch('CartAddedUpdated');

            session()->flash('success', 'Produk Berhasil di Hapus');
        } else {
            session()->flash('error', 'Produk gagal di Hapus');
        }
    }
    public function render()
    {
        $this->fullname = Auth::user()->name;
        $this->email = Auth::user()->email;
        $this->cart = Cart::where('user_id', Auth::id())->get();
        return view('livewire.frontend.cart.cart-show', [
            'cart' => $this->cart
        ]);
    }
}

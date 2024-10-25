<?php

namespace App\Livewire\Frontend\Product;

use App\Models\Cart;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{

    public $product, $product_makanan, $product_minuman, $product_snack, $cart, $quantityCount = 1;

    public function addToCart($productId)
    {
        $newproduct = $this->product->where('id', $productId)->first();
        if(Auth::check())
        {
            if($newproduct)
            {
                if(Cart::where('user_id', Auth::user()->id)->where('product_id', $newproduct->id)->exists())
                {
                    session()->flash('error', 'Produk sudah ada di keranjang');
                }
                else
                {
                    if($newproduct->product_stock > 0)
                    {
                            if($newproduct->product_stock >= $this->quantityCount)
                        {
                            Cart::create([
                               'user_id' => Auth::user()->id,
                               'product_id' => $newproduct->id,
                               'kantin_id' => $newproduct->kantin_id,
                               'quantity' => $this->quantityCount
                            ]);

                            $this->dispatch('CartAddedUpdated');

                            session()->flash('success', 'Produk ditambahkan ke keranjang');
                        } else {
                            session()->flash('error', 'Stok produk habis');
                        }
                    } else {
                        session()->flash('error', 'Produk habis');
                    }
                }

            } else {
                session()->flash('error', 'Produk tidak ditemukan');
            }
        } else {
            session()->flash('error', 'Anda harus login terlebih dahulu');
        }
    }

    public function mount($product, $product_makanan, $product_minuman, $product_snack, $cart)
    {
        $this->product = $product;
        $this->product_makanan = $product_makanan;
        $this->product_minuman = $product_minuman;
        $this->product_snack = $product_snack;
        $this->cart = $cart;
    }
    public function render()
    {
        return view('livewire.frontend.product.index', [
            'product' => $this->product,
            'product_makanan' => $this->product_makanan,
            'product_minuman' => $this->product_minuman,
            'product_snack' => $this->product_snack,
            'cart' => $this->cart
        ]);
    }
}

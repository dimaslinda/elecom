<?php

namespace App\Livewire\Frontend\Order;

use App\Models\Kantin;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\Product;
use App\Models\Token;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class OrderShow extends Component
{
    public $orders, $kantin;

    public function updateStatus($orderId)
    {
        $neworder = $this->orders->find($orderId);
        if(Auth::check())
        {
            if($neworder->status_message == 0)
            {
                $dataupdate = [
                    'status_message' => 1
                ];
                $neworder->update($dataupdate);
            }
        }
    }

    public function doneStatus($orderId)
    {
        $neworder = $this->orders->find($orderId);
        if(Auth::check())
        {
            if($neworder->status_message == 1)
            {
                $dataupdate = [
                    'status_message' => 2
                ];
                $neworder->update($dataupdate);
            }
        }
    }

    public function rejectStatus($orderId)
    {
        $neworder = $this->orders->find($orderId);
        if(Auth::check())
        {
            if($neworder->status_message == 1)
            {
                $dataupdate = [
                    'status_message' => 3
                ];
                $neworder->update($dataupdate);
            }
        }
    }

    public function successStatus($orderId)
    {
        $neworder = $this->orders->find($orderId);
        if(Auth::check())
        {
            if($neworder->status_message == 2)
            {
                $dataupdate = [
                    'status_message' => 4
                ];
                $neworder->update($dataupdate);


                $user = User::where('id', $neworder->user_id)->first();

                $nowa = $user->tlp1;
                $nowa2 = $user->tlp2;
                $nowa3 = $user->tlp3;
                $orderItems = Order_item::where('order_id', $neworder->id)->get();
                $orderItems2 = Order_item::where('order_id', $neworder->id)->first();
                foreach($orderItems as $item)
                {
                    $menu = $item->product_id;
                }
                $product = Product::where('id', $menu)->first();
                $quantity = $product->product_stock - $orderItems2->quantity;

                $productupdate = [
                  'product_stock' =>  $quantity
                ];
                $product->update($productupdate);
                $pesan = "Pesanan ".$neworder->tracking_no." Berhasil Diterima, Berikut Detailnya\n\n"."Nama Kantin : ".$neworder->kantin->kantin_name ."\n\nmenu : ".$product->product_name."\n\nKandungan Gizinya : ".$product->kandungan_gizi . "\n\nJumlah Kalori : ".$product->kalori;
                $tokens = Token::where('id', 1)->first();
                $token = $tokens->token;

                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://api.fonnte.com/send',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => array(
                    'target' => $nowa . ',' . $nowa2 . ',' . $nowa3,
                    'message' => $pesan,
                    ),
                    CURLOPT_HTTPHEADER => array(
                        'Authorization: ' . $token
                    ),
                ));

                $response = curl_exec($curl);
                curl_close($curl);

            }

        }
    }

    public function mount($orders, $kantin)
    {
        $this->orders = $orders;
        $this->kantin = $kantin;
    }

    public function render()
    {
        return view('livewire.frontend.order.order-show', [
            'orders' => $this->orders,
            'kantin' => $this->kantin
        ]);
    }
}

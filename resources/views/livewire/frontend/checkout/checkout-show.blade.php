<div>
    @forelse ($orders as $item)
    <div class="container p-6 mx-auto" wire:poll.keep-alive>
        <div class="col-span-1 p-3 w-full h-auto rounded-xl border-2 shadow-2xl">
            <div class="flex justify-start py-5">
                <div class="text-xl font-extrabold capitalize">
                    {{$item->kantin->kantin_name}}
                </div>
            </div>
            <div class="flex flex-col mt-2">
                <div class="flex flex-col">
                    @foreach ($item->orderItems as $menu)
                    <div class="flex flex-row justify-between items-center mb-5">
                        <div class="font-extrabold">
                            {{$menu->product->product_name}}
                        </div>
                        <div class="font-extrabold text-black">
                            x{{$menu->quantity}}
                        </div>
                        <div class="font-extrabold">
                            @currency($menu->product->product_price * $menu->quantity)
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @if ($item->status_message == 0)
            <div class="container p-6 mx-auto font-bold text-center text-[#bdbdbd]">
                Menunggu Konfirmasi
            </div>
            @endif
            @if ($item->status_message == 1)
            <div class="container p-6 mx-auto font-bold text-center text-secondary">
                Pesanan Diproses
            </div>
            @endif
            @if ($item->status_message == 2)
            <div class="container p-6 mx-auto font-bold text-center text-primary">
                Pesanan Siap Diambil
            </div>
            @endif
            @if ($item->status_message == 3)
            <div class="container p-6 mx-auto font-bold text-center text-[#f41919]">
                Pesanan Ditolak
            </div>
            @endif
            @if ($item->status_message == 4)
            <div class="container p-6 mx-auto font-bold text-center text-primary">
                Pesanan Selesai
            </div>
            @endif
        </div>
    </div>
    @empty
    <div>
        <div class="flex justify-center py-5">
            <div class="text-3xl font-extrabold capitalize text-primary">
               ~ Tidak ada Pesanan yang Diproses ~
            </div>
        </div>
    </div>
    @endforelse
</div>

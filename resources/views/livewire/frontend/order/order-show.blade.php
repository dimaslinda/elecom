<div wire:poll.keep-alive>
    <div class="container p-6 mx-auto">
        @forelse ($orders as $item)
            <div class="col-span-1 p-3 w-full h-auto rounded-xl border-2 shadow-2xl">
                <div class="flex flex-col justify-between py-5">
                    <div class="text-xl font-extrabold capitalize">
                        {{$item->user->name}}
                    </div>
                    <div class="font-extrabold text-black">
                        Kelas : {{$item->user->kelas}}
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
                                @currency($menu->product->product_price)
                            </div>
                        </div>

                        <hr class="my-5 h-px bg-[#D9D9D9] border-0">
                        <div class="flex flex-row justify-between">
                            <div class="flex flex-col mb-5">
                                <div class="font-extrabold">
                                Total Pembayaran
                                </div>
                            </div>
                            <div class="mb-5 font-extrabold">
                                @currency($menu->product->product_price * $menu->quantity)
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @if ($item->status_message == 0)
                <button type="button" wire:loading.attr="disabled" wire:click="updateStatus({{$item->id}})" class="px-3 py-2.5 w-full text-sm font-bold text-white uppercase rounded-full bg-primary">
                    Terima Pesanan ini
                </button>
                @endif
                @if ($item->status_message == 1)
                <div class="flex gap-2 justify-end">
                    <button type="button" wire:loading.attr="disabled" wire:confirm="Apakah anda yakin ingin menolak pesanan ini?" wire:click="rejectStatus({{$item->id}})" class="px-3 py-2.5 w-full text-sm font-bold text-white uppercase rounded-full bg-[#F41919]">
                        Tolak
                    </button>
                    <button type="button" wire:loading.attr="disabled" wire:click="doneStatus({{$item->id}})" class="px-3 py-2.5 w-full text-sm font-bold text-white uppercase rounded-full bg-primary">
                        Selesai
                    </button>
                </div>
                @endif
                @if ($item->status_message == 2)
                <button type="button" wire:loading.attr="disabled" wire:click="successStatus({{$item->id}})" class="px-3 py-2.5 w-full text-sm font-bold text-white uppercase rounded-full bg-primary">
                    selesaikan pesanan
                </button>
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


        @empty

        @endforelse
    </div>
</div>

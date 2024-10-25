@section('back')
<a href="/" class="items-center space-x-3 rtl:space-x-reverse">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 119 123" fill="none">
        <path d="M113.05 43.05V79.95C113.05 86.7335 107.719 92.25 101.15 92.25H17.8502V73.8H95.2002V49.2H29.7502V61.5L5.9502 39.975L29.7502 18.45V30.75H101.15C104.306 30.75 107.333 32.0459 109.565 34.3526C111.796 36.6593 113.05 39.7878 113.05 43.05Z" fill="white"/>
    </svg>
</a>
@endsection
<x-app-layout>
    <section class="container overflow-y-scroll mx-auto max-w-screen-sm min-h-screen max-h-screen md:max-w-screen-2xl xl:max-w-screen-sm">
        <div class="flex flex-col justify-center px-6 pt-10 pb-5 text-center">
            <div class="text-3xl font-extrabold uppercase">
                riwayat pesanan
            </div>
        </div>

        <div class="container p-6 mx-auto" wire:poll.keep-alive>
            @forelse ($riwayat as $item)
            @if ($item->status_message == 4)
            <div class="col-span-1 p-3 w-full h-auto rounded-xl border-2 shadow-2xl">
                <div class="flex justify-between py-5">
                    <div class="text-xl font-extrabold capitalize">
                        {{$item->kantin->kantin_name}}
                    </div>
                    <div class="font-extrabold text-black">
                        {{date('d M Y', strtotime($item->updated_at))}}
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
            </div>
            @endif
            @empty
            <div class="col-span-1 p-3 w-full h-auto font-bold text-center capitalize rounded-xl border-2 shadow-2xl text-primary">
                belum ada riwayat pemesanan
            </div>
            @endforelse

        </div>

    </section>
</x-app-layout>

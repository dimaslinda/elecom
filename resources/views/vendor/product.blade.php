@section('back')
<a href="/vendor/dashboard" class="items-center space-x-3 rtl:space-x-reverse">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 119 123" fill="none">
        <path d="M113.05 43.05V79.95C113.05 86.7335 107.719 92.25 101.15 92.25H17.8502V73.8H95.2002V49.2H29.7502V61.5L5.9502 39.975L29.7502 18.45V30.75H101.15C104.306 30.75 107.333 32.0459 109.565 34.3526C111.796 36.6593 113.05 39.7878 113.05 43.05Z" fill="white"/>
    </svg>
</a>
@endsection
<x-app-layout>
    <section class="container overflow-y-scroll mx-auto max-w-screen-sm min-h-screen max-h-screen md:max-w-screen-2xl xl:max-w-screen-sm">
        <div class="container p-6 mx-auto">
            <a href="{{route('kantin.product.create')}}" class="flex justify-center items-center py-2.5 mb-10 w-full font-extrabold text-white uppercase rounded-full bg-primary">
                Tambahkan Menu
            </a>
            <div class="grid grid-cols-1 gap-4">
                @if ($product->count() > 0)
                    @if ($product_makanan->count() > 0)
                        <div class="mt-5 text-2xl font-extrabold text-black uppercase">
                            Makanan
                        </div>
                        @foreach ($product_makanan as $item)
                            {{-- card --}}
                            <div class="col-span-1 p-3 w-full h-auto rounded-xl border-2 shadow-2xl">
                                <div class="grid grid-cols-3 gap-4">
                                    <div class="col-span-1">
                                        <img src="{{asset('storage/uploads/products/'.$item->image)}}" class="object-cover w-full h-full rounded-lg" alt="minuman">
                                    </div>
                                    <div class="col-span-2 items-center self-center md:items-start md:self-start">
                                        <div class="flex flex-col">
                                            <div class="flex justify-between mb-2 text-sm font-bold md:text-2xl">
                                                <div class="flex flex-col gap-1">
                                                    <div class="line-clamp-1">
                                                        {{$item->product_name}}
                                                    </div>
                                                    <div class="text-primary">
                                                        @currency($item->product_price)
                                                    </div>
                                                </div>
                                                <a href="/vendor/product/edit/{{$item->id}}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-secondary" viewBox="0 0 90 90" fill="#F4A719">
                                                        <path d="M55.0425 12.2702C56.2553 11.0558 57.6955 10.0924 59.2808 9.43488C60.8661 8.77741 62.5655 8.43883 64.2817 8.43848C65.998 8.43813 67.6975 8.77603 69.2831 9.43285C70.8686 10.0897 72.3092 11.0526 73.5225 12.2665L77.7487 16.4927C80.1974 18.9421 81.573 22.2637 81.573 25.7271C81.573 29.1905 80.1974 32.5121 77.7487 34.9615L34.9875 77.734C33.7752 78.9479 32.3355 79.911 30.7506 80.568C29.1657 81.2249 27.4669 81.563 25.7512 81.5627H11.25C10.5041 81.5627 9.78871 81.2664 9.26126 80.7389C8.73382 80.2115 8.4375 79.4961 8.4375 78.7502V64.3352C8.43724 62.6214 8.77456 60.9242 9.43021 59.3408C10.0859 57.7573 11.047 56.3185 12.2587 55.1065L55.0425 12.2702ZM69.5437 16.2452C68.8531 15.5538 68.033 15.0053 67.1302 14.631C66.2274 14.2568 65.2598 14.0642 64.2825 14.0642C63.3052 14.0642 62.3376 14.2568 61.4348 14.631C60.532 15.0053 59.7119 15.5538 59.0212 16.2452L55.6612 19.609L70.4025 34.3502L73.77 30.9827C75.1641 29.5882 75.9473 27.6971 75.9473 25.7252C75.9473 23.7533 75.1641 21.8622 73.77 20.4677L69.5437 16.2452Z" fill="#F4A719"/>
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="text-[#9D9D9D] text-xs md:text-lg mb-2 line-clamp-2">
                                                {!! $item->product_description !!}
                                            </div>
                                            <div class="flex justify-between items-center font-bold">
                                                @if ($item->product_stock > 0)
                                                <div class="text-[#9D9D9D] text-xs md:text-lg line-clamp-2">
                                                    {{$item->product_stock}} Stock
                                                </div>
                                                @else
                                                <div class="text-xs text-black md:text-lg line-clamp-2">
                                                    Out of Stock
                                                </div>
                                                @endif
                                                <div>
                                                    <button data-modal-target="popup-modal-{{$item->id}}" data-modal-toggle="popup-modal-{{$item->id}}" type="button">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-reject" viewBox="0 0 126 126" fill="#F41919">
                                                            <path d="M80.0153 19.5352L81.5535 30.1875H102.375C103.419 30.1875 104.421 30.6023 105.159 31.3408C105.898 32.0792 106.312 33.0807 106.312 34.125C106.312 35.1693 105.898 36.1708 105.159 36.9092C104.421 37.6477 103.419 38.0625 102.375 38.0625H98.3378L93.7545 91.5337C93.4762 94.7887 93.2505 97.4662 92.8883 99.6292C92.5208 101.881 91.959 103.897 90.8617 105.767C89.1388 108.702 86.5773 111.055 83.5065 112.523C81.5535 113.452 79.4955 113.836 77.217 114.014C75.0278 114.187 72.345 114.188 69.0795 114.188H56.9205C53.655 114.188 50.9722 114.187 48.783 114.014C46.5045 113.836 44.4465 113.452 42.4935 112.523C39.4227 111.055 36.8612 108.702 35.1382 105.767C34.0357 103.897 33.4845 101.881 33.1118 99.6292C32.7495 97.461 32.5238 94.7887 32.2455 91.5337L27.6623 38.0625H23.625C22.5807 38.0625 21.5792 37.6477 20.8408 36.9092C20.1023 36.1708 19.6875 35.1693 19.6875 34.125C19.6875 33.0807 20.1023 32.0792 20.8408 31.3408C21.5792 30.6023 22.5807 30.1875 23.625 30.1875H44.4465L45.9847 19.5352L46.0425 19.215C46.998 15.0675 50.5575 11.8125 55.02 11.8125H70.98C75.4425 11.8125 79.002 15.0675 79.9575 19.215L80.0153 19.5352ZM52.4002 30.1875H73.5945L72.2505 20.8635C71.9985 19.9867 71.358 19.6875 70.9748 19.6875H55.0252C54.642 19.6875 54.0015 19.9867 53.7495 20.8635L52.4002 30.1875ZM59.0625 55.125C59.0625 54.0807 58.6477 53.0792 57.9092 52.3408C57.1708 51.6023 56.1693 51.1875 55.125 51.1875C54.0807 51.1875 53.0792 51.6023 52.3408 52.3408C51.6023 53.0792 51.1875 54.0807 51.1875 55.125V81.375C51.1875 82.4193 51.6023 83.4208 52.3408 84.1592C53.0792 84.8977 54.0807 85.3125 55.125 85.3125C56.1693 85.3125 57.1708 84.8977 57.9092 84.1592C58.6477 83.4208 59.0625 82.4193 59.0625 81.375V55.125ZM74.8125 55.125C74.8125 54.0807 74.3977 53.0792 73.6592 52.3408C72.9208 51.6023 71.9193 51.1875 70.875 51.1875C69.8307 51.1875 68.8292 51.6023 68.0908 52.3408C67.3523 53.0792 66.9375 54.0807 66.9375 55.125V81.375C66.9375 82.4193 67.3523 83.4208 68.0908 84.1592C68.8292 84.8977 69.8307 85.3125 70.875 85.3125C71.9193 85.3125 72.9208 84.8977 73.6592 84.1592C74.3977 83.4208 74.8125 82.4193 74.8125 81.375V55.125Z" fill="#F41919"/>
                                                        </svg>
                                                    </button>
                                                </div>

                                                <div id="popup-modal-{{$item->id}}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                            <button type="button" class="inline-flex absolute top-3 justify-center items-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg end-2.5 hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal-{{$item->id}}">
                                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                                </svg>
                                                                <span class="sr-only">Close modal</span>
                                                            </button>
                                                            <div class="p-4 text-center md:p-5">
                                                                <svg class="mx-auto mb-4 w-12 h-12 text-gray-400 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                                </svg>
                                                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah kamu Yakin mau Menghapus Menu {{ $item->product_name }}</h3>
                                                                <a href="{{ route('kantin.product.destroy', $item->id) }}" data-modal-hide="popup-modal-{{$item->id}}" type="button" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-red-600 rounded-lg transition-all duration-300 ease-in-out hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800">
                                                                    Iya, Hapus
                                                                </a>
                                                                <button data-modal-hide="popup-modal-{{$item->id}}" type="submit" class="px-5 py-2.5 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 transition-all duration-300 ease-in-out ms-3 focus:outline-none hover:bg-primary hover:text-white focus:z-10 focus:ring-4 focus:ring-gray-100">Tidak, Tutup</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        {{-- end card --}}
                        @endforeach
                    @else

                    @endif
                    @if ($product_minuman->count() > 0)
                    <div class="mt-5 text-2xl font-extrabold text-black uppercase">
                        Minuman
                    </div>

                    @foreach ($product_minuman as $item)
                            {{-- card --}}
                            <div class="col-span-1 p-3 w-full h-auto rounded-xl border-2 shadow-2xl">
                                <div class="grid grid-cols-3 gap-4">
                                    <div class="col-span-1">
                                        <img src="{{asset('storage/uploads/products/'.$item->image)}}" class="object-cover w-full h-full rounded-lg" alt="minuman">
                                    </div>
                                    <div class="col-span-2 items-center self-center md:items-start md:self-start">
                                        <div class="flex flex-col">
                                            <div class="flex justify-between mb-2 text-sm font-bold md:text-2xl">
                                                <div class="flex flex-col gap-1">
                                                    <div class="line-clamp-1">
                                                        {{$item->product_name}}
                                                    </div>
                                                    <div class="text-primary">
                                                        @currency($item->product_price)
                                                    </div>
                                                </div>
                                                <a href="/vendor/product/edit/{{$item->id}}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-secondary" viewBox="0 0 90 90" fill="#F4A719">
                                                        <path d="M55.0425 12.2702C56.2553 11.0558 57.6955 10.0924 59.2808 9.43488C60.8661 8.77741 62.5655 8.43883 64.2817 8.43848C65.998 8.43813 67.6975 8.77603 69.2831 9.43285C70.8686 10.0897 72.3092 11.0526 73.5225 12.2665L77.7487 16.4927C80.1974 18.9421 81.573 22.2637 81.573 25.7271C81.573 29.1905 80.1974 32.5121 77.7487 34.9615L34.9875 77.734C33.7752 78.9479 32.3355 79.911 30.7506 80.568C29.1657 81.2249 27.4669 81.563 25.7512 81.5627H11.25C10.5041 81.5627 9.78871 81.2664 9.26126 80.7389C8.73382 80.2115 8.4375 79.4961 8.4375 78.7502V64.3352C8.43724 62.6214 8.77456 60.9242 9.43021 59.3408C10.0859 57.7573 11.047 56.3185 12.2587 55.1065L55.0425 12.2702ZM69.5437 16.2452C68.8531 15.5538 68.033 15.0053 67.1302 14.631C66.2274 14.2568 65.2598 14.0642 64.2825 14.0642C63.3052 14.0642 62.3376 14.2568 61.4348 14.631C60.532 15.0053 59.7119 15.5538 59.0212 16.2452L55.6612 19.609L70.4025 34.3502L73.77 30.9827C75.1641 29.5882 75.9473 27.6971 75.9473 25.7252C75.9473 23.7533 75.1641 21.8622 73.77 20.4677L69.5437 16.2452Z" fill="#F4A719"/>
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="text-[#9D9D9D] text-xs md:text-lg mb-2 line-clamp-2">
                                                {!! $item->product_description !!}
                                            </div>
                                            <div class="flex justify-between items-center font-bold">
                                                @if ($item->product_stock > 0)
                                                <div class="text-[#9D9D9D] text-xs md:text-lg line-clamp-2">
                                                    {{$item->product_stock}} Stock
                                                </div>
                                                @else
                                                <div class="text-xs text-black md:text-lg line-clamp-2">
                                                    Out of Stock
                                                </div>
                                                @endif


                                                <div>
                                                    <button data-modal-target="popup-modal-{{$item->id}}" data-modal-toggle="popup-modal-{{$item->id}}" type="button">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-reject" viewBox="0 0 126 126" fill="#F41919">
                                                            <path d="M80.0153 19.5352L81.5535 30.1875H102.375C103.419 30.1875 104.421 30.6023 105.159 31.3408C105.898 32.0792 106.312 33.0807 106.312 34.125C106.312 35.1693 105.898 36.1708 105.159 36.9092C104.421 37.6477 103.419 38.0625 102.375 38.0625H98.3378L93.7545 91.5337C93.4762 94.7887 93.2505 97.4662 92.8883 99.6292C92.5208 101.881 91.959 103.897 90.8617 105.767C89.1388 108.702 86.5773 111.055 83.5065 112.523C81.5535 113.452 79.4955 113.836 77.217 114.014C75.0278 114.187 72.345 114.188 69.0795 114.188H56.9205C53.655 114.188 50.9722 114.187 48.783 114.014C46.5045 113.836 44.4465 113.452 42.4935 112.523C39.4227 111.055 36.8612 108.702 35.1382 105.767C34.0357 103.897 33.4845 101.881 33.1118 99.6292C32.7495 97.461 32.5238 94.7887 32.2455 91.5337L27.6623 38.0625H23.625C22.5807 38.0625 21.5792 37.6477 20.8408 36.9092C20.1023 36.1708 19.6875 35.1693 19.6875 34.125C19.6875 33.0807 20.1023 32.0792 20.8408 31.3408C21.5792 30.6023 22.5807 30.1875 23.625 30.1875H44.4465L45.9847 19.5352L46.0425 19.215C46.998 15.0675 50.5575 11.8125 55.02 11.8125H70.98C75.4425 11.8125 79.002 15.0675 79.9575 19.215L80.0153 19.5352ZM52.4002 30.1875H73.5945L72.2505 20.8635C71.9985 19.9867 71.358 19.6875 70.9748 19.6875H55.0252C54.642 19.6875 54.0015 19.9867 53.7495 20.8635L52.4002 30.1875ZM59.0625 55.125C59.0625 54.0807 58.6477 53.0792 57.9092 52.3408C57.1708 51.6023 56.1693 51.1875 55.125 51.1875C54.0807 51.1875 53.0792 51.6023 52.3408 52.3408C51.6023 53.0792 51.1875 54.0807 51.1875 55.125V81.375C51.1875 82.4193 51.6023 83.4208 52.3408 84.1592C53.0792 84.8977 54.0807 85.3125 55.125 85.3125C56.1693 85.3125 57.1708 84.8977 57.9092 84.1592C58.6477 83.4208 59.0625 82.4193 59.0625 81.375V55.125ZM74.8125 55.125C74.8125 54.0807 74.3977 53.0792 73.6592 52.3408C72.9208 51.6023 71.9193 51.1875 70.875 51.1875C69.8307 51.1875 68.8292 51.6023 68.0908 52.3408C67.3523 53.0792 66.9375 54.0807 66.9375 55.125V81.375C66.9375 82.4193 67.3523 83.4208 68.0908 84.1592C68.8292 84.8977 69.8307 85.3125 70.875 85.3125C71.9193 85.3125 72.9208 84.8977 73.6592 84.1592C74.3977 83.4208 74.8125 82.4193 74.8125 81.375V55.125Z" fill="#F41919"/>
                                                        </svg>
                                                    </button>
                                                </div>

                                                <div id="popup-modal-{{$item->id}}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                            <button type="button" class="inline-flex absolute top-3 justify-center items-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg end-2.5 hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal-{{$item->id}}">
                                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                                </svg>
                                                                <span class="sr-only">Close modal</span>
                                                            </button>
                                                            <div class="p-4 text-center md:p-5">
                                                                <svg class="mx-auto mb-4 w-12 h-12 text-gray-400 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                                </svg>
                                                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah kamu Yakin mau Menghapus Menu {{ $item->product_name }}</h3>
                                                                <a href="{{ route('kantin.product.destroy', $item->id) }}" data-modal-hide="popup-modal" type="button" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-red-600 rounded-lg transition-all duration-300 ease-in-out hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800">
                                                                    Iya, Hapus
                                                                </a>
                                                                <button data-modal-hide="popup-modal-{{$item->id}}" type="submit" class="px-5 py-2.5 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 transition-all duration-300 ease-in-out ms-3 focus:outline-none hover:bg-primary hover:text-white focus:z-10 focus:ring-4 focus:ring-gray-100">Tidak, Tutup</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        {{-- end card --}}
                        @endforeach
                    @else

                    @endif
                    @if ($product_snack->count() > 0)
                    <div class="mt-5 text-2xl font-extrabold text-black uppercase">
                        Snack
                    </div>
                    @foreach ($product_snack as $item)
                    {{-- card --}}
                    <div class="col-span-1 p-3 w-full h-auto rounded-xl border-2 shadow-2xl">
                        <div class="grid grid-cols-3 gap-4">
                            <div class="col-span-1">
                                <img src="{{asset('storage/uploads/products/'.$item->image)}}" class="object-cover w-full h-full rounded-lg" alt="minuman">
                            </div>
                            <div class="col-span-2 items-center self-center md:items-start md:self-start">
                                <div class="flex flex-col">
                                    <div class="flex justify-between mb-2 text-sm font-bold md:text-2xl">
                                        <div class="flex flex-col gap-1">
                                            <div class="line-clamp-1">
                                                {{$item->product_name}}
                                            </div>
                                            <div class="text-primary">
                                                @currency($item->product_price)
                                            </div>
                                        </div>
                                        <a href="/vendor/product/edit/{{$item->id}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-secondary" viewBox="0 0 90 90" fill="#F4A719">
                                                <path d="M55.0425 12.2702C56.2553 11.0558 57.6955 10.0924 59.2808 9.43488C60.8661 8.77741 62.5655 8.43883 64.2817 8.43848C65.998 8.43813 67.6975 8.77603 69.2831 9.43285C70.8686 10.0897 72.3092 11.0526 73.5225 12.2665L77.7487 16.4927C80.1974 18.9421 81.573 22.2637 81.573 25.7271C81.573 29.1905 80.1974 32.5121 77.7487 34.9615L34.9875 77.734C33.7752 78.9479 32.3355 79.911 30.7506 80.568C29.1657 81.2249 27.4669 81.563 25.7512 81.5627H11.25C10.5041 81.5627 9.78871 81.2664 9.26126 80.7389C8.73382 80.2115 8.4375 79.4961 8.4375 78.7502V64.3352C8.43724 62.6214 8.77456 60.9242 9.43021 59.3408C10.0859 57.7573 11.047 56.3185 12.2587 55.1065L55.0425 12.2702ZM69.5437 16.2452C68.8531 15.5538 68.033 15.0053 67.1302 14.631C66.2274 14.2568 65.2598 14.0642 64.2825 14.0642C63.3052 14.0642 62.3376 14.2568 61.4348 14.631C60.532 15.0053 59.7119 15.5538 59.0212 16.2452L55.6612 19.609L70.4025 34.3502L73.77 30.9827C75.1641 29.5882 75.9473 27.6971 75.9473 25.7252C75.9473 23.7533 75.1641 21.8622 73.77 20.4677L69.5437 16.2452Z" fill="#F4A719"/>
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="text-[#9D9D9D] text-xs md:text-lg mb-2 line-clamp-2">
                                        {!! $item->product_description !!}
                                    </div>
                                    <div class="flex justify-between items-center font-bold">
                                        @if ($item->product_stock > 0)
                                        <div class="text-[#9D9D9D] text-xs md:text-lg line-clamp-2">
                                            {{$item->product_stock}} Stock
                                        </div>
                                        @else
                                        <div class="text-xs text-black md:text-lg line-clamp-2">
                                            Out of Stock
                                        </div>
                                        @endif
                                        <div>
                                            <button data-modal-target="popup-modal-{{$item->id}}" data-modal-toggle="popup-modal-{{$item->id}}" type="button">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-reject" viewBox="0 0 126 126" fill="#F41919">
                                                    <path d="M80.0153 19.5352L81.5535 30.1875H102.375C103.419 30.1875 104.421 30.6023 105.159 31.3408C105.898 32.0792 106.312 33.0807 106.312 34.125C106.312 35.1693 105.898 36.1708 105.159 36.9092C104.421 37.6477 103.419 38.0625 102.375 38.0625H98.3378L93.7545 91.5337C93.4762 94.7887 93.2505 97.4662 92.8883 99.6292C92.5208 101.881 91.959 103.897 90.8617 105.767C89.1388 108.702 86.5773 111.055 83.5065 112.523C81.5535 113.452 79.4955 113.836 77.217 114.014C75.0278 114.187 72.345 114.188 69.0795 114.188H56.9205C53.655 114.188 50.9722 114.187 48.783 114.014C46.5045 113.836 44.4465 113.452 42.4935 112.523C39.4227 111.055 36.8612 108.702 35.1382 105.767C34.0357 103.897 33.4845 101.881 33.1118 99.6292C32.7495 97.461 32.5238 94.7887 32.2455 91.5337L27.6623 38.0625H23.625C22.5807 38.0625 21.5792 37.6477 20.8408 36.9092C20.1023 36.1708 19.6875 35.1693 19.6875 34.125C19.6875 33.0807 20.1023 32.0792 20.8408 31.3408C21.5792 30.6023 22.5807 30.1875 23.625 30.1875H44.4465L45.9847 19.5352L46.0425 19.215C46.998 15.0675 50.5575 11.8125 55.02 11.8125H70.98C75.4425 11.8125 79.002 15.0675 79.9575 19.215L80.0153 19.5352ZM52.4002 30.1875H73.5945L72.2505 20.8635C71.9985 19.9867 71.358 19.6875 70.9748 19.6875H55.0252C54.642 19.6875 54.0015 19.9867 53.7495 20.8635L52.4002 30.1875ZM59.0625 55.125C59.0625 54.0807 58.6477 53.0792 57.9092 52.3408C57.1708 51.6023 56.1693 51.1875 55.125 51.1875C54.0807 51.1875 53.0792 51.6023 52.3408 52.3408C51.6023 53.0792 51.1875 54.0807 51.1875 55.125V81.375C51.1875 82.4193 51.6023 83.4208 52.3408 84.1592C53.0792 84.8977 54.0807 85.3125 55.125 85.3125C56.1693 85.3125 57.1708 84.8977 57.9092 84.1592C58.6477 83.4208 59.0625 82.4193 59.0625 81.375V55.125ZM74.8125 55.125C74.8125 54.0807 74.3977 53.0792 73.6592 52.3408C72.9208 51.6023 71.9193 51.1875 70.875 51.1875C69.8307 51.1875 68.8292 51.6023 68.0908 52.3408C67.3523 53.0792 66.9375 54.0807 66.9375 55.125V81.375C66.9375 82.4193 67.3523 83.4208 68.0908 84.1592C68.8292 84.8977 69.8307 85.3125 70.875 85.3125C71.9193 85.3125 72.9208 84.8977 73.6592 84.1592C74.3977 83.4208 74.8125 82.4193 74.8125 81.375V55.125Z" fill="#F41919"/>
                                                </svg>
                                            </button>
                                        </div>

                                        <div id="popup-modal-{{$item->id}}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative p-4 w-full max-w-md max-h-full">
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <button type="button" class="inline-flex absolute top-3 justify-center items-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg end-2.5 hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal-{{$item->id}}">
                                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                    <div class="p-4 text-center md:p-5">
                                                        <svg class="mx-auto mb-4 w-12 h-12 text-gray-400 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                        </svg>
                                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah kamu Yakin mau Menghapus Menu {{ $item->product_name }}</h3>
                                                        <a href="{{ route('kantin.product.destroy', $item->id) }}" data-modal-hide="popup-modal" type="button" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-red-600 rounded-lg transition-all duration-300 ease-in-out hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800">
                                                            Iya, Hapus
                                                        </a>
                                                        <button data-modal-hide="popup-modal-{{$item->id}}" type="submit" class="px-5 py-2.5 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 transition-all duration-300 ease-in-out ms-3 focus:outline-none hover:bg-primary hover:text-white focus:z-10 focus:ring-4 focus:ring-gray-100">Tidak, Tutup</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                {{-- end card --}}
                @endforeach
                    @else

                    @endif
                @else

                @endif




            </div>
        </div>
    </section>
</x-app-layout>

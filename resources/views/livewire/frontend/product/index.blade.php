<div wire:poll.5s>
    @if ($product->count() > 0)
    @if (session('success'))
                <div id="alert-border-3"
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 4000)"
                class="flex items-center p-4 my-4 bg-green-50 border-t-4 border-green-300 text-primary animatecss animatecss-fadeIn dark:text-green-400" role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <div class="ml-3 text-sm font-medium">
                    {{ session('success') }}
                    </div>
                    <button type="button" class="inline-flex justify-center items-center p-1.5 -mx-1.5 -my-1.5 ml-auto w-8 h-8 text-green-500 bg-green-50 rounded-lg focus:ring-2 focus:ring-green-400 hover:bg-green-200"  data-dismiss-target="#alert-border-3" aria-label="Close">
                    <span class="sr-only">Dismiss</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    </button>
                </div>
    @endif
    @if (session('error'))
                <div id="alert-border-3"
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 4000)"
                class="flex items-center p-4 my-4 text-white bg-red-500 border-t-4 border-red-500 animatecss animatecss-fadeIn" role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <div class="ml-3 text-sm font-medium">
                    {{ session('error') }}
                    </div>
                    <button type="button" class="inline-flex justify-center items-center p-1.5 -mx-1.5 -my-1.5 ml-auto w-8 h-8 text-red-500 bg-red-50 rounded-lg focus:ring-2 focus:ring-red-400 hover:bg-red-200"  data-dismiss-target="#alert-border-3" aria-label="Close">
                    <span class="sr-only">Dismiss</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    </button>
                </div>
    @endif
@if ($product_makanan->count() > 0)
    <div class="text-2xl font-extrabold text-black uppercase">
        makanan
    </div>
    <div class="grid grid-cols-1 gap-4 mt-5">
       @forelse ($product_makanan as $item)
            {{-- card --}}
                <div class="col-span-1 p-3 w-full h-auto rounded-xl border-2 shadow-2xl">
                    <div class="grid grid-cols-3 gap-4">
                        <div class="col-span-1">
                            <img src="{{asset('storage/uploads/products/'.$item->image)}}" class="object-cover w-full h-full rounded-lg" alt="minuman">
                        </div>
                        <div class="col-span-2 items-center self-center md:items-start md:self-start">
                            <div class="flex flex-col">
                                <div class="flex justify-between mb-2 text-sm font-bold md:text-2xl">
                                    <div class="line-clamp-1">
                                        {{$item->product_name}}
                                    </div>
                                    <div class="text-primary">
                                        @currency($item->product_price)
                                    </div>
                                </div>
                                <div class="text-[#9D9D9D] text-xs md:text-lg mb-2 md:mt-5 line-clamp-2">
                                    {!! $item->product_description !!}
                                </div>
                                {{-- TAMBAH --}}
                                <div class="flex gap-2 items-center justify-end font-bold text-[#9D9D9D] md:mt-20">
                                    @if ($item->product_stock > 0)
                                    @if ($cart->where('product_id', $item->id)->count())
                                    <div class="text-xs text-primary md:text-lg line-clamp-2">
                                        Already in Cart
                                    </div>
                                    @else
                                    <div id="quantity">
                                        <form class="mx-auto mb-2 max-w-xs">
                                            {{-- <div class="relative flex items-center max-w-[8rem]">
                                                <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" id="decrement-button" class="p-3 h-11 bg-transparent border border-[#9d9d9d] border-r-0 rounded-s-full">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 100 100" fill="none">
                                                        <circle cx="49.9649" cy="50.1278" r="49.5177" fill="#17DF99"/>
                                                        <rect x="74.9502" y="42.8592" width="14.5373" height="49.9719" transform="rotate(90 74.9502 42.8592)" fill="white"/>
                                                    </svg>
                                                </button>
                                                <input type="number" wire:model="quantityCount" name="quantityCount" value="{{$this->quantityCount}}" min="0" id="quantity-input" data-input-counter aria-describedby="helper-text-explanation" class="block py-2.5 w-full h-11 text-sm text-center text-gray-900 bg-transparent border-x-0 border-[#9d9d9d]" placeholder="0" required />
                                                <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()" id="increment-button"" class="p-3 h-11 bg-transparent border border-[#9d9d9d] border-l-0 rounded-e-full">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 100 100" fill="none">
                                                        <circle cx="50.4034" cy="50.1278" r="49.5177" fill="#17DF99"/>
                                                        <rect x="43.5889" y="25.1418" width="14.5373" height="49.9719" fill="white"/>
                                                        <rect x="75.3896" y="42.8592" width="14.5373" height="49.9719" transform="rotate(90 75.3896 42.8592)" fill="white"/>
                                                    </svg>
                                                </button>
                                            </div> --}}
                                            <button type="button" wire:click="addToCart({{$item->id}})" class="px-3 py-2.5 text-sm font-bold text-white uppercase rounded-full bg-primary">Add to Cart</button>
                                        </form>
                                    </div>
                                    @endif
                                    @else
                                    <div class="text-xs text-black md:text-lg line-clamp-2">
                                        Out of Stock
                                    </div>
                                    @endif
                                </div>
                                {{-- TAMBAH --}}
                            </div>
                        </div>
                    </div>
                </div>
            {{-- end card --}}
            @empty

        @endforelse
    </div>
@else

@endif
@if ($product_minuman->count() > 0)
    <div class="mt-10 text-2xl font-extrabold text-black uppercase">
        minuman
    </div>
    <div class="grid grid-cols-1 gap-4 mt-5">
        @forelse ($product_minuman as $item)
        {{-- card --}}
            <div class="col-span-1 p-3 w-full h-auto rounded-xl border-2 shadow-2xl">
                <div class="grid grid-cols-3 gap-4">
                    <div class="col-span-1">
                        <img src="{{asset('storage/uploads/products/'.$item->image)}}" class="object-cover w-full h-full rounded-lg" alt="minuman">
                    </div>
                    <div class="col-span-2 items-center self-center md:items-start md:self-start">
                        <div class="flex flex-col">
                            <div class="flex justify-between mb-2 text-sm font-bold md:text-2xl">
                                <div class="line-clamp-1">
                                    {{$item->product_name}}
                                </div>
                                <div class="text-primary">
                                    @currency($item->product_price)
                                </div>
                            </div>
                            <div class="text-[#9D9D9D] text-xs md:text-lg mb-2 md:mt-5 line-clamp-2">
                                {!! $item->product_description !!}
                            </div>
                            {{-- TAMBAH --}}
                            <div class="flex gap-2 items-center justify-end font-bold text-[#9D9D9D] md:mt-20">
                                @if ($item->product_stock > 0)
                                <div id="quantity">
                                    <form class="mx-auto mb-2 max-w-xs">
                                        {{-- <div class="relative flex items-center max-w-[8rem]">
                                            <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" id="decrement-button" class="p-3 h-11 bg-transparent border border-[#9d9d9d] border-r-0 rounded-s-full">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 100 100" fill="none">
                                                    <circle cx="49.9649" cy="50.1278" r="49.5177" fill="#17DF99"/>
                                                    <rect x="74.9502" y="42.8592" width="14.5373" height="49.9719" transform="rotate(90 74.9502 42.8592)" fill="white"/>
                                                </svg>
                                            </button>
                                            <input type="number" wire:model="quantityCount" name="quantityCount" value="{{$this->quantityCount}}" min="0" id="quantity-input" data-input-counter aria-describedby="helper-text-explanation" class="block py-2.5 w-full h-11 text-sm text-center text-gray-900 bg-transparent border-x-0 border-[#9d9d9d]" placeholder="0" required />
                                            <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()" id="increment-button"" class="p-3 h-11 bg-transparent border border-[#9d9d9d] border-l-0 rounded-e-full">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 100 100" fill="none">
                                                    <circle cx="50.4034" cy="50.1278" r="49.5177" fill="#17DF99"/>
                                                    <rect x="43.5889" y="25.1418" width="14.5373" height="49.9719" fill="white"/>
                                                    <rect x="75.3896" y="42.8592" width="14.5373" height="49.9719" transform="rotate(90 75.3896 42.8592)" fill="white"/>
                                                </svg>
                                            </button>
                                        </div> --}}
                                        <button type="button" wire:click="addToCart({{$item->id}})" class="px-3 py-2.5 text-sm font-bold text-white uppercase rounded-full bg-primary">Add to Cart</button>
                                    </form>
                                </div>
                                    @else
                                    <div class="text-xs text-black md:text-lg line-clamp-2">
                                        Out of Stock
                                    </div>
                                    @endif
                            </div>
                            {{-- TAMBAH --}}
                        </div>
                    </div>
                </div>
            </div>
        {{-- end card --}}
        @empty

        @endforelse
    </div>
@else

@endif
@if ($product_snack->count() > 0)
    <div class="mt-10 text-2xl font-extrabold text-black uppercase">
        snack
    </div>
    <div class="grid grid-cols-1 gap-4 mt-5">
        @forelse ($product_snack as $item)
        {{-- card --}}
            <div class="col-span-1 p-3 w-full h-auto rounded-xl border-2 shadow-2xl">
                <div class="grid grid-cols-3 gap-4">
                    <div class="col-span-1">
                        <img src="{{asset('storage/uploads/products/'.$item->image)}}" class="object-cover w-full h-full rounded-lg" alt="minuman">
                    </div>
                    <div class="col-span-2 items-center self-center md:items-start md:self-start">
                        <div class="flex flex-col">
                            <div class="flex justify-between mb-2 text-sm font-bold md:text-2xl">
                                <div class="line-clamp-1">
                                    {{$item->product_name}}
                                </div>
                                <div class="text-primary">
                                    @currency($item->product_price)
                                </div>
                            </div>
                            <div class="text-[#9D9D9D] text-xs md:text-lg mb-2 md:mt-5 line-clamp-2">
                                {!! $item->product_description !!}
                            </div>
                            {{-- TAMBAH --}}
                            <div class="flex gap-2 items-center justify-end font-bold text-[#9D9D9D] md:mt-20">
                                @if ($item->product_stock > 0)
                                <div id="quantity">
                                    <form class="mx-auto mb-2 max-w-xs">
                                        {{-- <div class="relative flex items-center max-w-[8rem]">
                                            <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" id="decrement-button" class="p-3 h-11 bg-transparent border border-[#9d9d9d] border-r-0 rounded-s-full">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 100 100" fill="none">
                                                    <circle cx="49.9649" cy="50.1278" r="49.5177" fill="#17DF99"/>
                                                    <rect x="74.9502" y="42.8592" width="14.5373" height="49.9719" transform="rotate(90 74.9502 42.8592)" fill="white"/>
                                                </svg>
                                            </button>
                                            <input type="number" wire:model="quantityCount" name="quantityCount" value="{{$this->quantityCount}}" min="0" id="quantity-input" data-input-counter aria-describedby="helper-text-explanation" class="block py-2.5 w-full h-11 text-sm text-center text-gray-900 bg-transparent border-x-0 border-[#9d9d9d]" placeholder="0" required />
                                            <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()" id="increment-button"" class="p-3 h-11 bg-transparent border border-[#9d9d9d] border-l-0 rounded-e-full">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 100 100" fill="none">
                                                    <circle cx="50.4034" cy="50.1278" r="49.5177" fill="#17DF99"/>
                                                    <rect x="43.5889" y="25.1418" width="14.5373" height="49.9719" fill="white"/>
                                                    <rect x="75.3896" y="42.8592" width="14.5373" height="49.9719" transform="rotate(90 75.3896 42.8592)" fill="white"/>
                                                </svg>
                                            </button>
                                        </div> --}}
                                        <button type="button" wire:click="addToCart({{$item->id}})" class="px-3 py-2.5 text-sm font-bold text-white uppercase rounded-full bg-primary">Add to Cart</button>
                                    </form>
                                </div>
                                    @else
                                    <div class="text-xs text-black md:text-lg line-clamp-2">
                                        Out of Stock
                                    </div>
                                    @endif
                            </div>
                            {{-- TAMBAH --}}
                        </div>
                    </div>
                </div>
            </div>
        {{-- end card --}}
        @empty

        @endforelse
    </div>
@else

@endif
@else

@endif

</div>

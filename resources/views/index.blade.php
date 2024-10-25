<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="font-inter">
        <header class="container mx-auto max-w-screen-sm md:max-w-screen-2xl xl:max-w-screen-sm">
            <nav class="border-gray-200 bg-primary dark:bg-gray-900 dark:border-gray-700">
                <div class="flex flex-wrap justify-between items-center p-4 mx-auto max-w-screen-xl">
                    <a href="/" class="items-center space-x-3 rtl:space-x-reverse">
                        {{-- <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 119 123" fill="none">
                            <path d="M113.05 43.05V79.95C113.05 86.7335 107.719 92.25 101.15 92.25H17.8502V73.8H95.2002V49.2H29.7502V61.5L5.9502 39.975L29.7502 18.45V30.75H101.15C104.306 30.75 107.333 32.0459 109.565 34.3526C111.796 36.6593 113.05 39.7878 113.05 43.05Z" fill="white"/>
                        </svg> --}}
                    </a>
                    <a href="/" class="ml-5 text-xl font-bold tracking-normal leading-normal text-white uppercase">
                        Kantin Sehat
                    </a>
                    <div class="flex items-center space-x-0 rtl:space-x-reverse">
                       @auth
                        @if (Auth::user()->role == 2)
                        <a href="{{route('checkout')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 82 82" fill="none">
                                <path d="M36.6599 10.9286C37.3181 10.8346 37.9513 10.6119 38.5234 10.2733C39.0955 9.93457 39.5953 9.48653 39.9943 8.95469C40.3932 8.42285 40.6835 7.81765 40.8486 7.17362C41.0136 6.52959 41.0502 5.85936 40.9563 5.20119C40.8623 4.54303 40.6396 3.90981 40.3009 3.3377C39.9623 2.76559 39.5142 2.26578 38.9824 1.86683C38.4505 1.46787 37.8453 1.17758 37.2013 1.01252C36.5573 0.847453 35.8871 0.810858 35.2289 0.904819C27.7874 1.97557 20.7908 5.09615 15.0221 9.9173C9.25334 14.7385 4.94017 21.0699 2.56529 28.2031C0.190423 35.3362 -0.152429 42.9895 1.57511 50.3065C3.30265 57.6234 7.03241 64.3151 12.3469 69.6328C17.6615 74.9505 24.351 78.6842 31.667 80.416C38.9829 82.1479 46.6364 81.8095 53.7709 79.4388C60.9055 77.0682 67.2395 72.7587 72.064 66.9928C76.8886 61.2269 80.0133 54.2321 81.0884 46.7913C81.2781 45.4621 80.9321 44.1119 80.1264 43.0378C79.3206 41.9637 78.1212 41.2537 76.792 41.0639C75.4628 40.8742 74.1126 41.2202 73.0385 42.026C71.9644 42.8317 71.2544 44.0311 71.0646 45.3603C70.2566 50.9402 67.9118 56.1851 64.2927 60.5083C60.6736 64.8314 55.9229 68.0623 50.5722 69.8392C45.2215 71.6162 39.4819 71.8693 33.9955 70.5701C28.5092 69.2709 23.4926 66.4707 19.5071 62.4828C15.5215 58.4949 12.7243 53.4767 11.4283 47.9896C10.1323 42.5025 10.3888 36.763 12.1689 31.4134C13.949 26.0637 17.1827 21.3149 21.5079 17.6983C25.8332 14.0818 31.0796 11.7333 36.6599 10.9286ZM54.5001 2.80157C53.2336 2.35402 51.8411 2.42794 50.629 3.00707C49.4169 3.58621 48.4846 4.62312 48.037 5.8897C47.5895 7.15627 47.6634 8.54876 48.2425 9.76083C48.8217 10.9729 49.8586 11.9053 51.1251 12.3528C53.1636 13.0728 55.0896 13.9908 56.9031 15.1068C57.4693 15.4756 58.1036 15.7274 58.7687 15.8472C59.4337 15.967 60.116 15.9524 60.7753 15.8044C61.4346 15.6564 62.0576 15.3779 62.6076 14.9853C63.1575 14.5927 63.6234 14.094 63.9776 13.5185C64.3318 12.9431 64.5672 12.3025 64.6699 11.6346C64.7727 10.9668 64.7406 10.2851 64.5758 9.62978C64.4109 8.97447 64.1166 8.3588 63.71 7.81906C63.3035 7.27931 62.793 6.82642 62.2086 6.48707C59.7763 4.99021 57.1924 3.75483 54.5001 2.80157ZM75.5264 19.8116C75.187 19.2272 74.7341 18.7167 74.1944 18.3102C73.6546 17.9036 73.039 17.6093 72.3837 17.4444C71.7284 17.2796 71.0467 17.2476 70.3788 17.3503C69.7109 17.453 69.0704 17.6884 68.4949 18.0426C67.9195 18.3968 67.4208 18.8627 67.0282 19.4126C66.6356 19.9626 66.3571 20.5856 66.209 21.2449C66.061 21.9042 66.0465 22.5865 66.1663 23.2515C66.2861 23.9166 66.5378 24.5509 66.9066 25.1171C68.0181 26.9171 68.9316 28.8296 69.6471 30.8546C70.1104 32.0995 71.0444 33.1124 72.2477 33.6749C73.451 34.2375 74.8271 34.3046 76.0795 33.8618C77.3318 33.4189 78.3599 32.5017 78.9421 31.3078C79.5242 30.1139 79.6139 28.739 79.1916 27.4796C78.2422 24.8021 77.0137 22.2319 75.5264 19.8116ZM41.0001 25.8123C41.0001 24.4697 40.4668 23.182 39.5174 22.2326C38.568 21.2832 37.2803 20.7498 35.9376 20.7498C34.595 20.7498 33.3073 21.2832 32.3579 22.2326C31.4085 23.182 30.8751 24.4697 30.8751 25.8123V46.0623C30.8751 48.8568 33.1431 51.1248 35.9376 51.1248H49.4376C50.7803 51.1248 52.068 50.5914 53.0174 49.642C53.9668 48.6926 54.5001 47.405 54.5001 46.0623C54.5001 44.7197 53.9668 43.432 53.0174 42.4826C52.068 41.5332 50.7803 40.9998 49.4376 40.9998H41.0001V25.8123Z" fill="white"/>
                            </svg>
                        </a>
                        <a href="{{route('cart')}}" class="inline-flex relative items-center p-2 text-sm font-medium text-center text-white bg-transparent rounded-lg focus:ring-4 focus:outline-none focus:ring-blue-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 86 86" fill="none">
                                <path d="M68.25 68.5C63.5325 68.5 59.75 72.2825 59.75 77C59.75 79.2543 60.6455 81.4163 62.2396 83.0104C63.8337 84.6045 65.9957 85.5 68.25 85.5C70.5043 85.5 72.6663 84.6045 74.2604 83.0104C75.8545 81.4163 76.75 79.2543 76.75 77C76.75 74.7457 75.8545 72.5837 74.2604 70.9896C72.6663 69.3955 70.5043 68.5 68.25 68.5ZM0.25 0.5V9H8.75L24.05 41.2575L18.27 51.67C17.6325 52.86 17.25 54.2625 17.25 55.75C17.25 58.0043 18.1455 60.1663 19.7396 61.7604C21.3337 63.3545 23.4957 64.25 25.75 64.25H76.75V55.75H27.535C27.2532 55.75 26.983 55.6381 26.7837 55.4388C26.5844 55.2395 26.4725 54.9693 26.4725 54.6875C26.4725 54.475 26.515 54.305 26.6 54.1775L30.425 47.25H62.0875C65.275 47.25 68.08 45.465 69.525 42.8725L84.74 15.375C85.0375 14.695 85.25 13.9725 85.25 13.25C85.25 12.1228 84.8022 11.0418 84.0052 10.2448C83.2082 9.44777 82.1272 9 81 9H18.1425L14.1475 0.5M25.75 68.5C21.0325 68.5 17.25 72.2825 17.25 77C17.25 79.2543 18.1455 81.4163 19.7396 83.0104C21.3337 84.6045 23.4957 85.5 25.75 85.5C28.0043 85.5 30.1663 84.6045 31.7604 83.0104C33.3545 81.4163 34.25 79.2543 34.25 77C34.25 74.7457 33.3545 72.5837 31.7604 70.9896C30.1663 69.3955 28.0043 68.5 25.75 68.5Z" fill="white"/>
                            </svg>
                            <span class="sr-only">Notifications</span>
                            <div class="inline-flex absolute -top-2 justify-center items-center w-5 h-5 text-xs font-bold text-white bg-red-500 rounded-full border-2 border-white -end-2">
                                @livewire('frontend.cart.cart-count')
                            </div>
                        </a>
                        @endif
                       @endauth

                        @auth
                        <button data-collapse-toggle="navbar-dropdown" type="button" class="inline-flex justify-center items-center p-2 w-10 h-10 text-sm text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-white" aria-controls="navbar-dropdown" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                            </svg>
                        </button>
                        @endauth
                        @guest
                            <a href="{{ route('login') }}" class="px-3 py-2.5 font-bold text-white rounded-xl bg-secondary">Login</a>
                        @endguest
                    </div>
                    <div class="hidden w-full" id="navbar-dropdown">
                        <ul class="flex flex-col p-4 mt-4 font-medium bg-gray-50 rounded-lg border border-gray-100 rtl:space-x-reverse dark:bg-gray-800 dark:border-gray-700">
                            <div class="px-3">
                                @auth
                                <div class="text-base font-bold text-gray-800">Hi, {{ Auth::user()->name }}</div>
                                <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
                                @endauth
                            </div>
                            @auth
                            <hr class="h-px my-4 bg-[#D9D9D9] border-0">
                            @if (Auth::user()->role == 0)
                                <li>
                                    <a href="/secret" class="block px-3 py-2 font-bold text-black rounded hover:text-white hover:bg-secondary" aria-current="page">Dashboard Admin</a>
                                </li>
                            @endif
                            @if (Auth::user()->role == 1)
                                <li>
                                    <a href="/vendor/dashboard" class="block px-3 py-2 font-bold text-black rounded hover:text-white hover:bg-secondary" aria-current="page">Dashboard Seller</a>
                                </li>
                                <li>
                                    <a href="{{route('antrian')}}" class="block px-3 py-2 font-bold text-black rounded hover:text-white hover:bg-secondary">Lihat Pesanan</a>
                                </li>
                            @endif
                            @if (Auth::user()->role == 2)
                                <li>
                                    <a href="/user/dashboard" class="block px-3 py-2 font-bold text-black rounded hover:text-white hover:bg-secondary" aria-current="page">Profile</a>
                                </li>
                                <li>
                                    <a href="user/riwayat" class="block px-3 py-2 font-bold text-black rounded hover:text-white hover:bg-secondary">Riwayat Pesanan</a>
                                </li>
                            @endif
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="block px-3 py-2 w-full font-bold text-black rounded text-start hover:text-white hover:bg-secondary">Logout</button>
                                </form>
                            </li>
                            @endauth
                            @guest
                                <li>
                                    <a href="{{ route('login') }}" class="block px-3 py-2 font-bold text-black rounded hover:text-white hover:bg-secondary">Login</a>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <section class="container overflow-y-scroll mx-auto max-w-screen-sm min-h-screen max-h-screen md:max-w-screen-2xl xl:max-w-screen-sm">
            <div class="grid grid-cols-2 gap-4 px-2 py-10 md:px-6 md:gap-6">
                @forelse ($kantin as $item)
                <a href="user/detailkantin/{{$item->slug}}" class="col-span-1 max-w-full h-auto rounded-xl shadow-2xl bg-primary">
                    <div class="rounded-t-xl">
                        <img src="{{asset('storage/uploads/kantins/'.$item->image)}}" class="object-cover w-full rounded-t-xl" alt="kantin">
                    </div>
                    <div class="p-2 font-extrabold text-center text-white uppercase md:text-2xl md:p-4">
                        {{$item->kantin_name}}
                    </div>
                </a>
                @empty
                <div class="flex col-span-2 justify-center items-center mt-52 w-full text-xl font-bold text-center text-primary">
                    Tidak ada Kantin yang Buka / Online
                </div>
                @endforelse
            </div>
        </section>
        @livewireScripts
    </body>
</html>

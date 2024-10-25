@section('back')
<a href="/" class="items-center space-x-3 rtl:space-x-reverse">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 119 123" fill="none">
        <path d="M113.05 43.05V79.95C113.05 86.7335 107.719 92.25 101.15 92.25H17.8502V73.8H95.2002V49.2H29.7502V61.5L5.9502 39.975L29.7502 18.45V30.75H101.15C104.306 30.75 107.333 32.0459 109.565 34.3526C111.796 36.6593 113.05 39.7878 113.05 43.05Z" fill="white"/>
    </svg>
</a>
@endsection
<x-app-layout>
    <section class="container overflow-y-scroll mx-auto max-w-screen-sm max-h-screen md:max-w-screen-2xl xl:max-w-screen-sm">
        <div class="flex flex-col justify-center px-6 py-10 text-center">
            <div class="text-4xl font-extrabold uppercase">
                {{$kantin->kantin_name}}
            </div>
            <div class="text-[#9D9D9D] text-sm font-medium mt-4">
                {!! $kantin->kantin_description !!}
            </div>
        </div>
        <div class="container p-6 mx-auto">
            <livewire:frontend.product.index :product="$product" :product_makanan="$product_makanan" :product_minuman="$product_minuman" :product_snack="$product_snack" :cart="$cart" />
        </div>
    </section>
</x-app-layout>

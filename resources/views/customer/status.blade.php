@section('back')
<a href="/" class="items-center space-x-3 rtl:space-x-reverse">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 119 123" fill="none">
        <path d="M113.05 43.05V79.95C113.05 86.7335 107.719 92.25 101.15 92.25H17.8502V73.8H95.2002V49.2H29.7502V61.5L5.9502 39.975L29.7502 18.45V30.75H101.15C104.306 30.75 107.333 32.0459 109.565 34.3526C111.796 36.6593 113.05 39.7878 113.05 43.05Z" fill="white"/>
    </svg>
</a>
@endsection
<x-app-layout>
    <section class="container overflow-y-scroll mx-auto max-w-screen-sm max-h-screen md:max-w-screen-2xl xl:max-w-screen-sm">
        <div class="container p-6 pt-10 mx-auto md:pt-20 md:mb-5">
            <div class="col-span-1 p-3 w-full h-auto rounded-xl border-2 shadow-[rgba(0,0,0,0.25)_0px_4px_12.8px_6px]">
                <div class="flex object-cover justify-center pt-10 w-full h-full">
                    <img src="{{asset('general/status.svg')}}" class="object-cover w-1/2 h-full md:w-1/3" alt="status">
                </div>
                <div class="px-6 py-10 text-3xl font-extrabold text-center text-black uppercase">
                    pesanananmu diproses
                </div>
            </div>
        </div>

        <div class="container p-6 mx-auto">
            <div class="flex flex-col gap-4 justify-center items-center text-center">
                <a href="{{route('checkout')}}" class="py-2.5 w-full text-xl font-extrabold text-white rounded-full bg-primary border-primary">
                    Tampilkan Semua Pesanan
                </a>
                <div class="py-2.5 w-full text-xl font-extrabold bg-transparent rounded-full border-[3px] border-primary text-primary">
                    <a href="/">
                        Buat Pesanan Baru
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>

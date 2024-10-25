@section('back')
<a href="/" class="items-center space-x-3 rtl:space-x-reverse">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 119 123" fill="none">
        <path d="M113.05 43.05V79.95C113.05 86.7335 107.719 92.25 101.15 92.25H17.8502V73.8H95.2002V49.2H29.7502V61.5L5.9502 39.975L29.7502 18.45V30.75H101.15C104.306 30.75 107.333 32.0459 109.565 34.3526C111.796 36.6593 113.05 39.7878 113.05 43.05Z" fill="white"/>
    </svg>
</a>
@endsection
<x-app-layout>
    <section wire:poll.keep-alive class="container overflow-y-scroll mx-auto max-w-screen-sm min-h-screen max-h-screen md:max-w-screen-2xl xl:max-w-screen-sm">
        <div class="container p-6 pt-10 mx-auto">
            <div class="flex justify-center items-center">
                @if ($kantin->status == 1)
                <form action="/vendor/statuskantin/{{$kantin->id}}" method="POST" class="py-2.5 w-full font-extrabold text-center text-white uppercase rounded-full bg-primary">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="status" value="2">
                    <button type="submit" class="py-2.5 w-full font-extrabold text-center text-white uppercase rounded-full bg-primary">
                        Kantin online
                    </button>
                </form>
                @else
                <form action="/vendor/statuskantin/{{$kantin->id}}" method="POST" class="py-2.5 w-full font-extrabold text-center text-white uppercase rounded-full bg-[#F41919]">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="status" value="1">
                    <button type="submit" class="py-2.5 w-full font-extrabold text-center text-white uppercase rounded-full bg-[#F41919]">
                        Kantin offline
                    </button>
                </form>
                @endif
            </div>

            <div class="grid grid-cols-2 gap-4 mt-5">
                <div class="col-span-1 p-2 w-full h-auto rounded-xl border-2 shadow-xl">
                    <div class="mb-7 text-sm text-black uppercase">
                        Pesanan
                    </div>
                    <div class="text-lg font-extrabold text-black">
                        {{$count}} <span class="text-sm">Antrean</span>
                    </div>
                    <div class="flex justify-center mt-2">
                        <a href="{{route('antrian')}}" class="py-1.5 w-full text-xs font-extrabold text-center text-white uppercase rounded-full bg-primary">
                            Lihat Pesanan
                        </a>
                    </div>
                </div>
                <div class="col-span-1 p-2 w-full h-auto rounded-xl border-2 shadow-xl">
                    <div class="flex justify-between items-center self-center mb-7 text-sm text-black uppercase">
                            Saldo
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 104 104" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M72.4284 61.2855C80.3091 61.2855 87.867 58.1549 93.4395 52.5824C99.012 47.0099 102.143 39.4519 102.143 31.5712C102.143 23.6905 99.012 16.1326 93.4395 10.56C87.867 4.98754 80.3091 1.85693 72.4284 1.85693C64.5476 1.85693 56.9897 4.98754 51.4172 10.56C45.8447 16.1326 42.7141 23.6905 42.7141 31.5712C42.7141 39.4519 45.8447 47.0099 51.4172 52.5824C56.9897 58.1549 64.5476 61.2855 72.4284 61.2855ZM72.4284 19.4998C74.9912 19.4998 77.0712 21.5798 77.0712 24.1426V38.9998C77.0712 40.2312 76.5821 41.4121 75.7114 42.2828C74.8407 43.1535 73.6597 43.6426 72.4284 43.6426C71.197 43.6426 70.0161 43.1535 69.1454 42.2828C68.2747 41.4121 67.7855 40.2312 67.7855 38.9998V24.1426C67.7855 21.5798 69.8655 19.4998 72.4284 19.4998ZM15.5478 50.1426H1.85693V79.8569L15.4364 93.4364C18.1958 96.1967 21.4721 98.3863 25.078 99.8801C28.6839 101.374 32.5487 102.143 36.4518 102.143H79.8569C82.8122 102.143 85.6464 100.969 87.7361 98.879C89.8258 96.7893 90.9998 93.9551 90.9998 90.9998C90.9998 88.0445 89.8258 85.2103 87.7361 83.1206C85.6464 81.0309 82.8122 79.8569 79.8569 79.8569H59.2278C58.4555 82.4611 57.0197 84.8199 55.0612 86.702C53.1027 88.5842 50.6887 89.925 48.0558 90.5932C45.423 91.2613 42.6617 91.2338 40.0427 90.5133C37.4238 89.7928 35.037 88.404 33.1164 86.4832L22.3449 75.7118C21.9137 75.2806 21.5717 74.7687 21.3384 74.2053C21.105 73.642 20.9849 73.0381 20.9849 72.4284C20.9849 71.8186 21.105 71.2148 21.3384 70.6514C21.5717 70.088 21.9137 69.5761 22.3449 69.1449C22.7761 68.7137 23.288 68.3717 23.8514 68.1384C24.4148 67.905 25.0186 67.7849 25.6284 67.7849C26.2382 67.7849 26.842 67.905 27.4053 68.1384C27.9687 68.3717 28.4806 68.7137 28.9118 69.1449L39.6832 79.9164C40.8178 81.0485 42.3365 81.7127 43.938 81.7774C45.5395 81.842 47.1068 81.3023 48.329 80.2653C49.5511 79.2283 50.3388 77.7698 50.5358 76.1791C50.7328 74.5885 50.3246 72.9819 49.3924 71.6781L36.5632 58.8489C33.8037 56.0886 30.5275 53.899 26.9216 52.4052C23.3157 50.9113 19.4509 50.1425 15.5478 50.1426Z" fill="#BDBDBD"/>
                            </svg>
                        </div>
                    </div>
                    <div class="text-lg font-extrabold text-black">
                        Rp.100.000
                    </div>
                </div>
                <a href="/vendor/profile" class="col-span-2 p-4 w-full h-auto rounded-xl border-2 shadow-xl">
                    <div class="flex justify-between items-center self-center">
                        <div class="font-semibold text-black uppercase">
                            kelola profil
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 36 58" fill="none">
                                <path d="M4.00005 54L29 29L4.00005 4.00005" stroke="black" stroke-width="9"/>
                            </svg>
                        </div>
                    </div>
                </a>
                <a href="/vendor/product" class="col-span-2 p-4 w-full h-auto rounded-xl border-2 shadow-xl">
                    <div class="flex justify-between items-center self-center">
                        <div class="font-semibold text-black uppercase">
                            kelola menu
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 36 58" fill="none">
                                <path d="M4.00005 54L29 29L4.00005 4.00005" stroke="black" stroke-width="9"/>
                            </svg>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>
</x-app-layout>

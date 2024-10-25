@section('back')
<a href="/" class="items-center space-x-3 rtl:space-x-reverse">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 119 123" fill="none">
        <path d="M113.05 43.05V79.95C113.05 86.7335 107.719 92.25 101.15 92.25H17.8502V73.8H95.2002V49.2H29.7502V61.5L5.9502 39.975L29.7502 18.45V30.75H101.15C104.306 30.75 107.333 32.0459 109.565 34.3526C111.796 36.6593 113.05 39.7878 113.05 43.05Z" fill="white"/>
    </svg>
</a>
@endsection
<x-app-layout>
    <section class="container overflow-y-scroll mx-auto max-w-screen-sm max-h-screen md:max-w-screen-2xl xl:max-w-screen-sm">
        <div class="container p-6 mx-auto">
            <div class="col-span-1 p-6 w-full h-auto rounded-xl border-2 shadow-[rgba(0,0,0,0.25)_0px_4px_12.8px_6px]">
                <div class="flex justify-between py-5">
                    <div class="text-2xl font-extrabold capitalize">
                        {{$user->name}}
                    </div>
                </div>
                <div class="flex flex-col mt-2">
                    <div class="flex flex-col">
                        <div class="flex flex-col justify-between mb-3">
                            <div class="mb-2 text-xl font-extrabold">
                                Kelas
                            </div>
                            <div class="text-black">
                                {{$user->kelas}}
                            </div>
                        </div>
                        <div class="flex flex-col justify-between mb-5">
                            <div class="mb-2 text-xl font-extrabold">
                                Nomor Telepon
                            </div>
                            <div class="flex flex-col gap-2 text-black">
                                <div>
                                    {{$user->tlp1}}
                                </div>
                                <div>
                                    {{$user->tlp2}}
                                </div>
                                <div>
                                    {{$user->tlp3}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <a href="/user/profile" class="flex justify-center py-2.5 mt-5 w-full font-extrabold text-white rounded-full bg-primary">
                <div>Atur Ulang Kata Sandi</div>
            </a>
        </div>
    </section>
</x-app-layout>

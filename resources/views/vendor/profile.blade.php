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

            @if (isset($kantin))
            <form action="/vendor/profile/update/{{$kantin->id}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
            @else
                <form action="{{route('kantin.profile.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
            @endif
            @if (session('status') === 'profile-updated')
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
                    Data Kantin Berhasil Tersimpan
                    </div>
                    <button type="button" class="inline-flex justify-center items-center p-1.5 -mx-1.5 -my-1.5 ml-auto w-8 h-8 text-green-500 bg-green-50 rounded-lg focus:ring-2 focus:ring-green-400 hover:bg-green-200"  data-dismiss-target="#alert-border-3" aria-label="Close">
                    <span class="sr-only">Dismiss</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    </button>
                </div>
            @endif
                <div class="flex justify-center items-center w-full">
                    <label for="dropzone-file" class="flex relative flex-col justify-center items-center w-full h-64 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer hover:bg-gray-100">
                        @if (isset($kantin->image))
                        <img src="{{asset('storage/uploads/kantins/'.$kantin->image)}}" id="showgambar" class="object-cover w-full h-full rounded-lg brightness-50" alt="image kantin">
                        @else
                        <img src="{{asset('general/makanan.jpg')}}" id="showgambar" class="object-cover w-full h-full rounded-lg brightness-50" alt="image kantin">
                        @endif
                        {{-- <img src="{{asset('general/makanan.jpg')}}" id="showgambar" class="object-cover w-full h-full rounded-lg brightness-50" alt="image kantin"> --}}
                        <div class="flex absolute flex-col justify-center items-center pt-5 pb-6">
                            <svg class="mb-4 w-8 h-8 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                            </svg>
                            <p class="mb-2 text-sm text-white"><span class="font-semibold">Klik untuk upload</span> atau seret file</p>
                            <p class="text-xs text-white">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                        </div>
                        <input id="dropzone-file" type="file" name="image" value="{{ old('image', isset($kantin->image) ? $kantin->image : '') }}" class="hidden" />
                    </label>
                </div>
                <div class="grid grid-cols-1 gap-4 mt-5">
                    <div class="col-span-1 p-2 w-full h-auto rounded-xl border-2 shadow-xl">
                        <div>
                            <label for="kantin_name" class="block mb-2 text-sm font-extrabold text-black">Nama Kantin</label>
                            <x-text-input type="text" id="kantin_name" required :value="old('kantin_name',isset($kantin->kantin_name) ? $kantin->kantin_name : '')" name="kantin_name" placeholder="Masukkan Nama Kantin" class="block p-2 w-full text-xs text-black bg-white rounded-lg border border-[#d9d9d9] focus:ring-primary focus:border-primary "></x-text-input>
                            <x-input-error :messages="$errors->get('kantin_name')" class="mt-2" />
                        </div>
                    </div>

                    <div class="col-span-1 p-2 w-full h-auto rounded-xl border-2 shadow-2xl">
                        <label for="deskripsi_kantin" class="block mb-2 text-sm font-extrabold text-black">Deskripsi</label>
                        <textarea id="deskripsi_kantin" required name="kantin_description" rows="4" class="block p-2.5 w-full text-sm text-black bg-transparent rounded-lg border border-gray-300 focus:ring-primary focus:border-primary" placeholder="Tulis Deskripsi...">{{ old('kantin_description',isset($kantin->kantin_description) ? $kantin->kantin_description : '') }}</textarea>
                        <x-input-error :messages="$errors->get('kantin_description')" class="mt-2" />
                    </div>
                </div>

                <button type="submit" class="flex justify-center py-2.5 mt-5 w-full font-extrabold text-white uppercase rounded-full bg-primary">
                    Simpan
                </button>
            </form>
        </div>
    </section>
</x-app-layout>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript">
        function readURL(input) {
            if(input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#showgambar').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#dropzone-file").change(function() {
            readURL(this);
        });
</script>

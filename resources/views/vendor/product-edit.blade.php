@section('back')
<a href="{{route('kantin.product')}}" class="items-center space-x-3 rtl:space-x-reverse">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 119 123" fill="none">
        <path d="M113.05 43.05V79.95C113.05 86.7335 107.719 92.25 101.15 92.25H17.8502V73.8H95.2002V49.2H29.7502V61.5L5.9502 39.975L29.7502 18.45V30.75H101.15C104.306 30.75 107.333 32.0459 109.565 34.3526C111.796 36.6593 113.05 39.7878 113.05 43.05Z" fill="white"/>
    </svg>
</a>
@endsection
<x-app-layout>
    <section class="container overflow-y-scroll mx-auto max-w-screen-sm min-h-screen max-h-screen md:max-w-screen-2xl xl:max-w-screen-sm">
        <div class="container p-6 mx-auto">
            <form action="/vendor/product/update/{{$product->id}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                <div class="flex justify-center items-center w-full">
                    <label for="dropzone-file" class="flex relative flex-col justify-center items-center w-full h-64 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer hover:bg-gray-100">
                        @if (isset($product))
                        <img src="{{asset('storage/uploads/products/'.$product->image)}}" id="showgambar" class="object-cover w-full h-full rounded-lg brightness-50" alt="image kantin">
                        @else
                        <img src="{{asset('general/default.jpg')}}" id="showgambar" class="object-cover w-full h-full rounded-lg brightness-50" alt="image kantin">
                        @endif
                        <div class="flex absolute flex-col justify-center items-center pt-5 pb-6">
                            <svg class="mb-4 w-8 h-8 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                            </svg>
                            <p class="mb-2 text-sm text-white"><span class="font-semibold">Klik untuk upload</span> atau seret file</p>
                            <p class="text-xs text-white">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                        </div>
                        <input id="dropzone-file" type="file" name="image" class="hidden" />
                    </label>
                </div>

                {{-- <div class="flex justify-center items-center w-full">
                    <label for="dropzone-file" class="flex relative flex-col justify-center items-center w-full h-64 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer hover:bg-gray-100">
                        <img src="{{asset('general/default.jpg')}}" id="showgambar" class="object-cover w-full h-full rounded-lg brightness-50" alt="image kantin">
                        <div class="flex absolute flex-col justify-center items-center pt-5 pb-6">
                            <svg class="mb-4 w-8 h-8 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                            </svg>
                            <p class="mb-2 text-sm text-white"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                            <p class="text-xs text-white">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                        </div>
                        <input id="dropzone-file" type="file" class="hidden" />
                    </label>
                </div> --}}

                <div class="grid grid-cols-1 gap-4 mt-5">
                    <div class="col-span-1 p-2 w-full h-auto rounded-xl border-2 shadow-xl">
                        <div class="mb-5">
                            <label for="product_name" class="block mb-2 text-sm font-extrabold text-black">Nama Menu</label>
                            <x-text-input type="text" id="product_name" required name="product_name" :value="old('product_name',isset($product->product_name) ? $product->product_name : '')" placeholder="Masukkan Nama Menu" class="block p-2 w-full text-xs text-black bg-white rounded-lg border border-[#d9d9d9] focus:ring-primary focus:border-primary "></x-text-input>
                            <x-input-error :messages="$errors->get('product_name')" class="mt-2" />
                        </div>
                        <div class="mb-5">
                            <label for="deskripsi_product" class="block mb-2 text-sm font-extrabold text-black">Deskripsi Menu</label>
                            <textarea id="deskripsi_product" required name="product_description" rows="4" class="block p-2.5 w-full text-sm text-black bg-transparent rounded-lg border border-gray-300 focus:ring-primary focus:border-primary" placeholder="Tulis Deskripsi Menu...">{{ old('product_description',isset($product->product_description) ? $product->product_description : '') }}</textarea>
                            <x-input-error :messages="$errors->get('product_description')" class="mt-2" />
                        </div>
                        <div class="mb-5">
                            <label for="currency-field" class="block mb-2 text-sm font-extrabold text-black">Harga</label>
                            <x-text-input type="text" id="currency-field" data-type="currency" :value="old('product_price',isset($product->product_price) ? $product->product_price : '')" required name="product_price" placeholder="Rp." type-currency="IDR" class="block p-2 w-full text-xs text-black bg-white rounded-lg border border-[#d9d9d9] focus:ring-primary focus:border-primary "></x-text-input>
                        </div>
                        <div id="quantity" class="mb-5">
                            <label for="currency-field" class="block mb-2 text-sm font-extrabold text-black">Jumlah Stock Tersedia</label>
                                <div class="relative flex items-center max-w-[10rem]">
                                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" id="decrement-button" class="p-3 h-11 bg-transparent border border-[#d9d9d9] border-r-0 rounded-s-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 100 100" fill="none">
                                            <circle cx="49.9649" cy="50.1278" r="49.5177" fill="#17DF99"/>
                                            <rect x="74.9502" y="42.8592" width="14.5373" height="49.9719" transform="rotate(90 74.9502 42.8592)" fill="white"/>
                                        </svg>
                                    </button>
                                    <input type="number" value="{{$product->product_stock}}" name="product_stock" min="0" id="quantity-input" data-input-counter aria-describedby="helper-text-explanation" class="block py-2.5 w-full h-11 text-sm text-center text-gray-900 bg-transparent border-x-0 border-[#d9d9d9]" placeholder="0" required />
                                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()" id="increment-button"" class="p-3 h-11 bg-transparent border border-[#d9d9d9] border-l-0 rounded-e-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 100 100" fill="none">
                                            <circle cx="50.4034" cy="50.1278" r="49.5177" fill="#17DF99"/>
                                            <rect x="43.5889" y="25.1418" width="14.5373" height="49.9719" fill="white"/>
                                            <rect x="75.3896" y="42.8592" width="14.5373" height="49.9719" transform="rotate(90 75.3896 42.8592)" fill="white"/>
                                        </svg>
                                    </button>
                                </div>
                        </div>

                        <div class="mb-5">
                            <label for="kategori_product" class="block mb-2 text-sm font-extrabold text-black">Kategori <span class="text-[#9d9d9d] text-sm font-normal">(Pilih salah satu)</span></label>
                            <div class="flex items-center text-[#9d9d9d]">
                                <input type="radio" id="makanan" name="category_id" {{$product->category_id == 1 ? 'checked' : ''}} required value="1" class="mr-2 focus:border-primary focus:ring-primary"  >
                                <div>
                                    Makanan
                                </div>
                            </div>
                            <div class="flex items-center text-[#9d9d9d]">
                                <input type="radio" id="minuman" name="category_id" {{$product->category_id == 2 ? 'checked' : ''}} required value="2" class="mr-2 focus:border-primary focus:ring-primary"  >
                                <div>
                                    Minuman
                                </div>
                            </div>
                            <div class="flex items-center text-[#9d9d9d]">
                                <input type="radio" id="snack" name="category_id" {{$product->category_id == 3 ? 'checked' : ''}} required value="3" class="mr-2 focus:border-primary focus:ring-primary"  >
                                <div>
                                    Snack
                                </div>
                            </div>
                        </div>

                        <div class="mb-5">
                            <label for="kalori" class="block mb-2 text-sm font-extrabold text-black">Kalori</label>
                            <x-text-input type="text" id="kalori" required name="kalori" :value="old('kalori',isset($product->kalori) ? $product->kalori : '')" placeholder="Masukkan Kandungan Kalori" class="block p-2 w-full text-xs text-black bg-white rounded-lg border border-[#d9d9d9] focus:ring-primary focus:border-primary "></x-text-input>
                            <x-input-error :messages="$errors->get('kalori')" class="mt-2" />
                        </div>
                        <div class="mb-5">
                            <label for="kandungan_gizi" class="block mb-2 text-sm font-extrabold text-black">Kandungan Gizi</label>
                            <div class="flex items-center text-[#9d9d9d] mb-1">
                                <input type="checkbox" name="kandungan_gizi[]" {{ in_array('karbohidrat', $kandungan) ? 'checked' : '' }} value="karbohidrat" class="mr-2 focus:border-primary focus:ring-primary" >
                                <div class="capitalize">
                                    Karbohidrat
                                </div>
                            </div>
                            <div class="flex items-center text-[#9d9d9d] mb-1">
                                <input type="checkbox" name="kandungan_gizi[]" {{ in_array('protein', $kandungan) ? 'checked' : '' }} value="protein" class="mr-2 focus:border-primary focus:ring-primary" >
                                <div class="capitalize">
                                    Protein
                                </div>
                            </div>
                            <div class="flex items-center text-[#9d9d9d] mb-1">
                                <input type="checkbox" name="kandungan_gizi[]" {{ in_array('lemak', $kandungan) ? 'checked' : '' }} value="lemak" class="mr-2 focus:border-primary focus:ring-primary" >
                                <div class="capitalize">
                                    lemak
                                </div>
                            </div>
                            <div class="flex items-center text-[#9d9d9d] mb-1">
                                <input type="checkbox" name="kandungan_gizi[]" {{ in_array('serat', $kandungan) ? 'checked' : '' }} value="serat" class="mr-2 focus:border-primary focus:ring-primary" >
                                <div class="capitalize">
                                    serat
                                </div>
                            </div>
                            <div class="flex items-center text-[#9d9d9d] mb-1">
                                <input type="checkbox" name="kandungan_gizi[]" {{ in_array('mineral', $kandungan) ? 'checked' : '' }} value="mineral" class="mr-2 focus:border-primary focus:ring-primary" >
                                <div class="capitalize">
                                    mineral
                                </div>
                            </div>
                            <div class="flex items-center text-[#9d9d9d] mb-1">
                                <input type="checkbox" name="kandungan_gizi[]" {{ in_array('zat besi', $kandungan) ? 'checked' : '' }} value="zat besi" class="mr-2 focus:border-primary focus:ring-primary" >
                                <div class="capitalize">
                                    zat besi
                                </div>
                            </div>
                            <div class="flex items-center text-[#9d9d9d] mb-1">
                                <input type="checkbox" name="kandungan_gizi[]" {{ in_array('vitamin A', $kandungan) ? 'checked' : '' }} value="vitamin A" class="mr-2 focus:border-primary focus:ring-primary" >
                                <div class="capitalize">
                                    vitamin A
                                </div>
                            </div>
                            <div class="flex items-center text-[#9d9d9d] mb-1">
                                <input type="checkbox" name="kandungan_gizi[]" {{ in_array('vitamin B', $kandungan) ? 'checked' : '' }} value="Vitamin B" class="mr-2 focus:border-primary focus:ring-primary" >
                                <div class="capitalize">
                                    Vitamin B
                                </div>
                            </div>
                            <div class="flex items-center text-[#9d9d9d] mb-1">
                                <input type="checkbox" name="kandungan_gizi[]" {{ in_array('vitamin C', $kandungan) ? 'checked' : '' }} value="Vitamin C" class="mr-2 focus:border-primary focus:ring-primary" >
                                <div class="capitalize">
                                    Vitamin C
                                </div>
                            </div>
                            <div class="flex items-center text-[#9d9d9d] mb-1">
                                <input type="checkbox" name="kandungan_gizi[]" {{ in_array('vitamin D', $kandungan) ? 'checked' : '' }} value="Vitamin D" class="mr-2 focus:border-primary focus:ring-primary" >
                                <div class="capitalize">
                                    Vitamin D
                                </div>
                            </div>
                            <div class="flex items-center text-[#9d9d9d] mb-1">
                                <input type="checkbox" name="kandungan_gizi[]" {{ in_array('kalsium', $kandungan) ? 'checked' : '' }} value="kalsium" class="mr-2 focus:border-primary focus:ring-primary" >
                                <div class="capitalize">
                                    kalsium
                                </div>
                            </div>
                        </div>
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

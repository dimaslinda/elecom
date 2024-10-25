@section('back')
<a href="/user/dashboard" class="items-center space-x-3 rtl:space-x-reverse">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 119 123" fill="none">
        <path d="M113.05 43.05V79.95C113.05 86.7335 107.719 92.25 101.15 92.25H17.8502V73.8H95.2002V49.2H29.7502V61.5L5.9502 39.975L29.7502 18.45V30.75H101.15C104.306 30.75 107.333 32.0459 109.565 34.3526C111.796 36.6593 113.05 39.7878 113.05 43.05Z" fill="white"/>
    </svg>
</a>
@endsection
<x-app-layout>
    <section class="container overflow-y-scroll mx-auto max-w-screen-sm max-h-screen md:max-w-screen-2xl xl:max-w-screen-sm">
        <div class="container p-6 py-10 mx-auto">
            <div class="col-span-1 p-6 w-full h-auto rounded-xl border-2 shadow-[rgba(0,0,0,0.25)_0px_4px_12.8px_6px]">
                @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-base font-bold mb-5 bg-primary text-center text-white w-full rounded-xl py-2.5"
                >{{ __('Password Updated') }}</p>
                @endif
                <form method="post" action="{{ route('password.update') }}" class="mx-auto max-w-sm">
                    @csrf
                    @method('put')
                    <div class="mb-5">
                        <div class="mb-5">
                            <label for="update_password_current_password" class="block mb-2 text-sm font-medium text-black">
                                Password Lama
                            </label>
                            <x-text-input id="update_password_current_password" placeholder="Password Lama..." name="current_password" type="password" class="block p-2.5 w-full text-sm text-black bg-white rounded-lg border border-[#d9d9d9] focus:ring-primary focus:border-primary"></x-text-input>
                            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                        </div>
                        <label for="update_password_password" class="block mb-2 text-sm font-medium text-black">
                            Password Baru
                        </label>
                        <x-text-input id="update_password_password" placeholder="Password Baru..." name="password" type="password" class="block p-2.5 w-full text-sm text-black bg-white rounded-lg border border-[#d9d9d9] focus:ring-primary focus:border-primary"></x-text-input>
                        <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                    </div>
                    <div class="mb-5">
                        <label for="update_password_password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Konfirmasi Password
                        </label>
                        <x-text-input id="update_password_password_confirmation" placeholder="Konfirmasi Password..." name="password_confirmation" type="password" class="block p-2.5 w-full text-sm text-black bg-transparent rounded-lg border border-[#d9d9d9] focus:ring-primary focus:border-primary" autocomplete="new-password" />
                        <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                    </div>
            </div>
            <button type="submit" class="flex flex-col items-center justify-center py-2.5 mt-5 w-full font-extrabold text-white rounded-full bg-primary">
                <div>Simpan Perubahan</div>

            </button>
        </form>
        </div>
    </section>

</x-app-layout>

<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <section class="container overflow-y-scroll py-32 bg-[url('../../public/general/bg-login.svg')] min-h-screen mx-auto max-w-screen-sm max-h-screen md:max-w-screen-2xl xl:max-w-screen-sm">
        <div class="container p-6 mx-auto">
            <div class="col-span-1 p-6 w-full h-auto bg-white rounded-xl border-2 shadow-[rgba(0,0,0,0.25)_0px_4px_12.8px_6px]">
                <form method="POST" action="{{ route('login') }}" class="mx-auto">
                    @csrf
                    <div class="mb-5">
                        <label for="email" class="block mb-2 text-sm font-medium text-black">Email</label>
                        <x-text-input type="email" autocomplete="username" name="email" id="email" class="block p-2.5 w-full text-sm text-black bg-white rounded-lg border border-[#d9d9d9] focus:ring-primary focus:border-primary placeholder:text-gray-400" autocomplete placeholder="Your Email..." required ></x-text-input>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div class="mb-5">
                        <label for="password" class="block mb-2 text-sm font-medium text-black">
                            Password
                        </label>
                        <x-text-input type="password" id="password" name="password" class="block p-2.5 w-full text-sm text-black bg-transparent rounded-lg border border-[#d9d9d9] focus:ring-primary focus:border-primary placeholder:text-gray-400" placeholder="Your Password..." required autocomplete="current-password"></x-text-input>
                    </div>
                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="text-indigo-600 rounded border-gray-300 shadow-sm focus:ring-indigo-500" name="remember">
                            <span class="text-sm text-gray-600 ms-2">{{ __('Remember me') }}</span>
                        </label>
                    </div>
                    <div class="flex gap-2 justify-end items-center mt-4">
                        <button type="submit" class="px-5 py-2.5 w-full font-bold text-center text-white rounded-lg bg-secondary focus:ring-4 focus:outline-none focus:ring-primary sm:w-auto">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-guest-layout>

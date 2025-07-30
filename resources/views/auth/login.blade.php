<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Mật khẩu')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                    name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Ghi nhớ đăng nhập') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm text-indigo-600 hover:underline" href="{{ route('password.request') }}">
                    {{ __('Quên mật khẩu?') }}
                </a>
            @endif
        </div>

        <!-- Buttons -->
        <div class="flex items-center justify-between mt-6">
            <a href="{{ route('client.choose_register') }}"
                class="text-sm text-gray-600 dark:text-gray-400 hover:text-indigo-600 hover:underline">
                {{ __('Chưa có tài khoản? Đăng ký') }}
            </a>

            <x-primary-button>
                {{ __('Đăng nhập') }}
            </x-primary-button>
        </div>
        <!-- Login with Google -->
  <div class="flex gap-3 justify-center mb-6">
    {{-- Google Button --}}
    <a href="{{ route('client.google.redirect') }}"
       class="group relative flex items-center justify-center w-10 h-10 bg-white border border-gray-300 rounded-md shadow-sm overflow-hidden transition-all duration-300 hover:w-48 hover:justify-start hover:pl-3 hover:bg-gray-100">

        <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg"
             alt="Google" class="w-5 h-5 z-10 transition-transform duration-300" />

        <span
            class="absolute left-10 opacity-0 group-hover:opacity-100 text-sm text-gray-700 whitespace-nowrap transition-all duration-300">
            Đăng nhập Google
        </span>
    </a>

    {{-- Facebook Button --}}
    {{-- <a href=""
       class="group relative flex items-center justify-center w-10 h-10 bg-white border border-gray-300 rounded-md shadow-sm overflow-hidden transition-all duration-300 hover:w-48 hover:justify-start hover:pl-3 hover:bg-gray-100">

        <img src="https://www.facebook.com/images/fb_icon_325x325.png"
             alt="Facebook" class="w-5 h-5 z-10 transition-transform duration-300 rounded-full" />

        <span
            class="absolute left-10 opacity-0 group-hover:opacity-100 text-sm text-gray-700 whitespace-nowrap transition-all duration-300">
            Đăng nhập Facebook
        </span>
    </a> --}}
</div>


    </form>
</x-guest-layout>

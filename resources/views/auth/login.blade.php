<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <a href="{{ route('google') }}" class="btn btn-light d-flex align-items-center mt-2">
            <img src="https://www.svgrepo.com/show/355037/google.svg" alt="Google Logo" class="me-2" width="20">
            Sign in with Google
        </a>


        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}"
                   class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100
                          rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500
                          dark:focus:ring-offset-gray-800">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>

        <div class="mt-4 text-center justify-end flex">
            <p class="text-sm text-gray-600 dark:text-gray-400">
                {{ __('Dont have an account yet?') }}
                <a href="{{ route('register') }}"
                   class="underline text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100
                          rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500
                          dark:focus:ring-offset-gray-800">
                    {{ __('Register') }}
                </a>
            </p>
        </div>

    </form>
</x-guest-layout>

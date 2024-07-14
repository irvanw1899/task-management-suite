<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-10">
        <div class="flex flex-col items-center">
            <a href="/">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" />
            </a>
            <h1 class="mt-2 text-xl font-bold text-gray-900">Task Management Suite v.0.1</h1>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                        :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me and Forgot Password -->
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                            name="remember">
                        <label for="remember_me" class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</label>
                    </div>

                    @if (Route::has('password.request'))
                        <a class="text-sm text-gray-600 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>

                <div class="flex items-center justify-between">
                    <x-primary-button class="bg-indigo-500 hover:bg-indigo-600 focus:ring-indigo-500">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>

            </form>

            <div class="mt-4 text-center text-gray-600">
                <p>{{ __("Don't have an account?") }}
                    <a href="{{ route('register') }}" class="text-red-500 hover:text-red-700">
                        {{ __('Sign Up') }}
                    </a>
                </p>
            </div>

        </div>

        <footer class="mt-6 mb-4 text-center text-gray-600">
            <p>&copy; @php echo date('Y'); @endphp Jasnita Telkomindo. All rights reserved.</p>
        </footer>

    </div>
</x-guest-layout>

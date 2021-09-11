<x-app-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo/>
        </x-slot>

        <x-jet-validation-errors class="mb-4"/>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" id="loginform" action="{{ route('login') }}">
            @csrf
            @if(session()->has('message'))
                <div class="p-2 bg-yellow-100 mb-3">
                    <p class="">{{ session()->get('message') }}</p>
                </div>
            @endif
            <div>
                <x-jet-label for="email" value="{{ __('Email') }}"/>
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                             required autofocus/>
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}"/>
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                             autocomplete="current-password"/>
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                       href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <a class="underline text-sm text-gray-600 hover:text-gray-900 ml-4" href="{{ route('register') }}">
                    {{ __('Register') }}
                </a>

                <button  class="ml-4 inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 g-recaptcha" data-sitekey="{{config('app.site_key')}}" data-callback='onSubmit'>
                    {{ __('Login') }}
                </button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-app-layout>

<script>
    function onSubmit(token) {
        document.getElementById("loginform").submit();
    }
</script>
<x-app-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <h1 class="text-2xl font-bold">Create an account</h1>
        </x-slot>

        <x-jet-validation-errors class="mb-4"/>

        <form id="registerform" method="POST" action="{{ route('register') }}">
            @csrf
            <div>
                <x-jet-label for="name" value="{{ __('Nickname') }}"/>
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                             required autofocus autocomplete="name"/>
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}"/>
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                             required/>
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}"/>
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                             autocomplete="new-password"/>
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}"/>
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password"
                             name="password_confirmation" required autocomplete="new-password"/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 whitespace-no-wrap"
                   href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <a class="underline text-sm text-gray-600 hover:text-gray-900 ml-4 whitespace-no-wrap"
                   href="{{ route('writer-registration') }}">
                    {{ __('Writer Registration') }}
                </a>

                <button class="ml-4 inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 g-recaptcha" data-sitekey="{{config('app.site_key')}}" data-callback='onSubmit'>
                    {{ __('Register') }}
                </button>

            </div>
        </form>
    </x-jet-authentication-card>
</x-app-layout>
<script>
    function onSubmit(token) {
        document.getElementById("registerform").submit();
    }
</script>
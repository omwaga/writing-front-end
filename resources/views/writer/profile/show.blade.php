<x-app-layout>
    @include('writer.sidebar')
    @include('writer.top')
    <div class="w-full md:w-3/4 md:ml-1/4 absolute top-10 bg-gray-100">
    <br>
    <br>

        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('writer.profile.update-profile-information-form')
                <x-jet-section-border/>
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>

                <x-jet-section-border />
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <x-jet-section-border />
            @endif

        </div>
    </div>
</x-app-layout>

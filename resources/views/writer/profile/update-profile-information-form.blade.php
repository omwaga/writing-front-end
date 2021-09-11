<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            "/>

                <x-jet-label for="photo" value="{{ __('Photo') }}"/>

                <!-- Current Profile Photo -->
                <div class="mt-2 mb-4" x-show="!photoPreview">
                    @if(\Illuminate\Support\Facades\Auth::user() && \Illuminate\Support\Facades\Auth::user()->profile_photo_url != null)
                        <img src="{{ asset(\Illuminate\Support\Facades\Auth::user()->profile_photo_url) }}"
                             class="rounded-full relative top-2 rounded-2xl w-20 h-20">
                    @else
                        <ion-icon style="width: 80px; height: 80px;" class="mt-2" name="person-outline"></ion-icon>
                    @endif
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview">
                    <span class="block rounded-full w-20 h-20"
                          x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-jet-secondary-button>

                @if ($this->user && $this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2"/>

                
            </div>
    @endif

    <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Nickname') }}"/>
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name"
                         autocomplete="name" readonly/>
            <x-jet-input-error for="name" class="mt-2"/>
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}"/>
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email"
                         readonly/>
            <x-jet-input-error for="email" class="mt-2"/>
        </div>


        <div class="col-span-6 sm:col-span-4">
            <label for="about" class="font-bold mb-1 text-gray-700 block">About me</label>
            <div class="relative">
            <textarea id="about" name="about" wire:model="state.about"
                        class="w-full px-4 py-3 rounded-lg form-input rounded-md shadow-sm shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
            ></textarea>
            </div>
            <div class="text-gray-500 text-xs mt-1">Write a description of your skills and
                experience as
                a writer.

            </div>
            @error('about') <span class="error text-red-400">{{ $message }}</span> @enderror
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:click="updateProfileInformation">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>

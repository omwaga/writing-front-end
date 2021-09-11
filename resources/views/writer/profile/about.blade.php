
<x-jet-form-section submit="updatePassword">
    <x-slot name="title">
        {{ __('Update About') }}
    </x-slot>


    <x-slot name="form">
        

        <div class="mb-5">
            <label for="about" class="font-bold mb-1 text-gray-700 block">About me</label>
            <div class="relative">
            <textarea id="about" name="about" wire:model="about"
                        class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
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

        <x-jet-button>
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>














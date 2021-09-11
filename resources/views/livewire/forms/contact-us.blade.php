<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <form wire:click.prevent="sendMessage">
        <div class="flex flex-row">
            <div class="mt-4 mb-2 mr-4">
                <input type="text" id="name" wire:model="name" class="w-full p-2 border-b bg-gray-100"
                       placeholder="Name"
                       aria-label="Name">
                @error('name') <span class="error text-red-400">{{ $message }}</span> @endif
            </div>
            <div class="mt-4 mb-2">
                <input type="email" id="email" wire:model="email" class="w-full p-2 border-b bg-gray-100"
                       placeholder="Email"
                       aria-label="Email">
                @error('email') <span class="error text-red-400">{{ $message }}</span> @endif

            </div>
        </div>
        <div class="mt-4 mb-2">
            <textarea id="email" wire:model="message" class="w-full p-2 border-b bg-gray-100" placeholder="Message"
                      aria-label="Message"></textarea>
            @error('message') <span class="error text-red-400">{{ $message }}</span> @endif

        </div>
        <div class="flex justify-center">
            <input type="submit" value="Send"
                   class="bg-blue-400 hover:bg-blue-600 text-white px-5 py-2 rounded-2xl shadow-lg hover:shadow-xl transition duration-200 w-1/3">
        </div>

    </form>
</div>

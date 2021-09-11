<div wire:poll="showButton">
    @if($showButton == true)
        <button wire:click="confirmPlaceBid" class="bg-blue-500 hover:bg-blue-600 transition duration-200 text-white
      font-bold shadow-lg hover:shadow-xl px-5 py-2 rounded-xl mb-5"><span class="pr-2 lnr lnr-plus-circle"></span>Place
            Bid
        </button>
    @endif

    <x-jet-confirmation-modal wire:model="confirmPlaceBid">
        <x-slot name="title">
            Place bid
        </x-slot>

        <x-slot name="content">
            Are you sure you want to place a bid for order #{{ $orderNumber }}.
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmPlaceBid')" wire:loading.attr="disabled">
                Cancel
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="placeBid" wire:loading.attr="disabled">
                Place Bid
            </x-jet-button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>

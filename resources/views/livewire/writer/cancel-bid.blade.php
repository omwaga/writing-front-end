<div wire:poll="showButton">
    @if($showButton == true)
        <button wire:click="confirmCancelBid" class="bg-red-500 hover:bg-red-600 transition duration-200 text-white
      font-bold shadow-lg hover:shadow-xl px-5 py-2 rounded-xl mb-5"><span class="pr-2 lnr lnr-plus-circle"></span>Cancel
            Bid
        </button>
    @endif

    <x-jet-confirmation-modal wire:model="confirmCancelBid">
        <x-slot name="title">
            Cancel bid
        </x-slot>

        <x-slot name="content">
            Are you sure you want to cancel the bid for order #{{ $orderNumber }}.
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmCancelBid')" wire:loading.attr="disabled">
                Cancel
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="cancelBid" wire:loading.attr="disabled">
                cancel Bid
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>

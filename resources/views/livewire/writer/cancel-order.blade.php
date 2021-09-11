<div wire:poll="showButton">
    @if($showButton == true)
        <button wire:click="confirmCancelOrder" class="bg-red-500 hover:bg-red-600 transition duration-200 text-white
      font-bold shadow-lg hover:shadow-xl px-5 py-2 rounded-xl mb-5"><span class="pr-2 lnr lnr-plus-circle"></span>Cancel
            Order
        </button>
    @endif

    <x-jet-confirmation-modal wire:model="confirmCancelOrder">
        <x-slot name="title">
            Cancel Order
        </x-slot>

        <x-slot name="content">
            Are you sure you want to cancel order #{{ $orderNumber }}.
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmCancelOrder')" wire:loading.attr="disabled">
                Cancel
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="cancelOrder" wire:loading.attr="disabled">
                cancel Order
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>

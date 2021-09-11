<div wire:poll="showButton">
    @if($showButton ?? '' == true)
        <button wire:click="confirmCompleteOrder" class="bg-green-500 mx-2 hover:bg-green-600 transition duration-200 text-white
      font-bold shadow-lg hover:shadow-xl px-5 py-2 rounded-xl mb-5"><span class="pr-2 lnr lnr-checkmark-circle"></span>Complete
            Order
        </button>
    @endif

    <x-jet-confirmation-modal wire:model="confirmCompleteOrder">
        <x-slot name="title">
            Complete Order
        </x-slot>

        <x-slot name="content">
            Mark order #{{ $orderNumber }} as complete?
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmCompleteOrder')" wire:loading.attr="disabled">
                Cancel
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="CompleteOrder" wire:loading.attr="disabled">
                Proceed
            </x-jet-button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>

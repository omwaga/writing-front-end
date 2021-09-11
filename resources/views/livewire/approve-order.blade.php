<div wire:poll="showButton">
    @if($showButton == true)
        <button wire:click="confirmApproval" class="bg-green-500 mx-2 hover:bg-green-600 transition duration-200 text-white
      font-bold shadow-lg hover:shadow-xl px-5 py-2 rounded-xl mb-5"><span class="pr-2 lnr lnr-checkmark-circle"></span>
            Approve Work
        </button>
    @endif

    <x-jet-confirmation-modal wire:model="confirmApproval">
        <x-slot name="title">
            Approve Work
        </x-slot>

        <x-slot name="content">
            Mark order #{{ $orderId }} as approved?
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmApproval')" wire:loading.attr="disabled">
                Cancel
            </x-jet-secondary-button>

         
            <x-jet-button class="ml-2" wire:click="approveOrder" wire:loading.attr="disabled">
                Proceed
            </x-jet-button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>

<div class="mt-4">
    <button wire:click="sendVerificationEmail"
            class="focus:outline-none bg-blue-500 p-2 text-white rounded-2xl font-bold shadow-lg hover:shadow-xl hover:bg-blue-600 transition duration-200">{{ $message }}</button>
    <br>
    <div wire:loading class="text-green-400 text-center pt-2">
        Sending email...
    </div>
</div>

<div wire:poll.1000ms="timer">
    @if($time != "Expired")
        <span class="text-2xl text-green-400 font-bold">{{ $time }}</span>
    @else
        <span class="text-2xl text-green-400 font-bold">Expired</span>
    @endif
</div>

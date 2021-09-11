<x-app-layout>
    @include('includes.sidebar')
    @include('includes.top')
    <div class="h-full bg-gray-100">
        @livewire('return-order', ['orderId'=>$orderId])
    </div>
</x-app-layout>

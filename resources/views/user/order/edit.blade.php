<x-app-layout>
    @include('includes.sidebar')
    @include('includes.top')
    <div class="h-full bg-gray-100">
        @livewire('forms.order.edit', ['orderId'=>$orderId])
    </div>
</x-app-layout>

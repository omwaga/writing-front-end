<x-app-layout>
    @include('includes.sidebar')
    @include('includes.top')
    <div class="h-full bg-gray-100">
        @livewire('forms.order.add')
    </div>
</x-app-layout>

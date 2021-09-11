<x-app-layout>
    @include('includes.sidebar')
    @include('includes.top')
    <div class="bg-gray-100 w-2/3 ml-1/4 absolute top-20">
        @livewire('forms.order.view')
    </div>
</x-app-layout>

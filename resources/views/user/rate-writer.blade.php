<x-app-layout>
    @include('includes.sidebar')
    @include('includes.top')
    <div class="absolute top-20 w-2/3 ml-1/4 bg-gray-100">
        <div class="mt-4 mb-4 ">
            <h1 class="text-xl border-b  w-1/5">Rate Writer for Order {{ $orderNumber }}</h1>
        </div>
        @livewire('writer-rating', ['orderNumber'=>$orderNumber, 'writer'=>$writer])

    </div>
</x-app-layout>

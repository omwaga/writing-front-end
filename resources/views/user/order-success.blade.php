<x-app-layout>
    @include('includes.sidebar')
    @include('includes.top')
    <div class="absolute top-20 w-2/3 ml-1/4 bg-gray-100">
        <div class="bg-white rounded shadow-lg p-4 text-center">
            <h1 class="text-green-500 text-xl font-bold">Order processed successfully!</h1>
            <p>You can view your orders in the "My Orders" tab</p>
        </div>
    </div>
</x-app-layout>

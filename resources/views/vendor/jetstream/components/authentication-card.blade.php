<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <div>
        {{ $logo }}
    </div>


    <div class="w-full flex flex-wrap sm:max-w-md md:max-w-2xl mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg md:min-h-96 items-center">
        <div class="w-full md:w-1/2">
            <img src="{{asset('/images/image.png')}}" alt="">
        </div>
        <div class="w-full md:w-1/2">
            {{ $slot }}
        </div>
    </div>

</div>

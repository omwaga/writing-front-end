<x-app-layout>
    <div class="container p-16">
        <div id="ourwriters" class="our-writers">
            <div class="flex flex-row justify-between pt-14">
                <h1 class="font-bold text-4xl w-72 border-b border-gray-400 text-gray-600 pb-4">Our Top
                    Writers</h1>
                <h3 class="border-r border-gray-500 pr-4 text-gray-500 text-right">Check out our writers'
                    ratings, and choose<br> the most suitable writer for your order.</h3>
            </div>

            <div class="mt-5 mb-5 p-3">
                <div class="grid grid-cols-12 gap-6 mt-5">
                    @foreach ($writers as $index=>$writer)

                    <!-- BEGIN: Users Layout -->
                    <div class="intro-y col-span-12 bg-white shadow rounded-lg md:col-span-6 lg:col-span-4">
                        <div class="box">
                            <div class="flex items-start p-5">
                                <div class="w-full flex flex-col lg:flex-row items-center">
                                    <div class="image-fit overflow-hidden">
                                        <img alt="{{$writer->name}}" class="w-16 h-16 rounded-full " src="{{url('storage').'/'.@$writer->profile_photo_path}}" />
                                    </div>
                                    <div class="lg:ml-4 text-center lg:text-left mt-3 lg:mt-0">
                                        <a href="" class="font-medium">{{ $writer->name }}</a>
                                        <div class="text-gray-600 text-xs mt-0.5">
                                            Rating: {{ $writer->averageRating() }}
                                        </div>
                                        <div class="text-gray-600 text-xs mt-0.5">
                                            Completed Orders: {{ $writer->completed_orders }}
                                        </div>
                                    </div>
                                </div>
                               
                            </div>


                        </div>
                    </div>
                    <!-- END: Users Layout -->
                    @endforeach
                </div>

            </div>
            <div class="p-5">
                {{ $writers->links() }}
            </div>
        </div>
    </div>
    @include('includes.footer')
</x-app-layout>
<x-app-layout>
    @include('includes.sidebar')
    @include('includes.top')
    <div class="flex flex-wrap absolute top-20 md:w-3/4 md:ml-1/5" id="tabs-id">
        <div class="w-full bg-white">
            <div>

                <div class="grid grid-cols-12 gap-6">
                    <!-- BEGIN: Profile Menu -->
                    <div
                        class="col-span-12 flex lg:block flex-col-reverse"
                    >
                        <div class="intro-y box mt-5">

                            <div class="relative flex flex-wrap p-5 overflow-hidden">
                                <div class="image-fit">
                                    <img
                                        alt="{{$writer->name}}"
                                        class="w-12 h-12 rounded-full"
                                        src="{{$writer->profile_photo_url}}"
                                    />
                                </div>
                                <div class="p-2">
                                    <div class="font-medium text-base">
                                        <span class="text-theme-1" >{{ $writer->name}}</span>
                                    </div>


                                    <div class="flex flex-wrap justify-between">
                                        <div>
                                            <strong>Completed Orders:</strong>&nbsp;
                                            <span class="text-theme-1">{{ $writer->completed->count() }}</span>
                                        </div>

                                        <div class="ml-2">
                                            <strong>Open Bids:</strong>&nbsp;
                                            <span class="text-theme-1">{{ $writer->bids->count() }}</span>
                                        </div>
                                    </div>


                                    <div>
                                        <strong>Active</strong>
                                        <span class="text-theme-1">{{str_replace('ago','', Carbon\Carbon::parse($writer->created_at)->diffForHumans() )}}</span>
                                    </div>
                                    <div class="box-border mt-5 text-lg font-semibold text-indigo-900 uppercase">
                                        Rating: <strong>{{ $writer->averageRating() }}</strong> ⭐
                          
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- BEGIN: Display Information -->
                        <div class="intro-y box lg:mt-3"
                             >
                            <div
                                class="flex items-center px-5 border-b border-gray-200 dark:border-dark-5"
                            >
                                <h2 class="font-medium text-base mr-auto">About </h2>
                            </div>
                            <div class="p-5">
                                <div class="flex flex-col-reverse xl:flex-row flex-col">
                                    <div class="flex-1 mt-6 xl:mt-0 md:w-3/4 mx-auto text-justify">
                                       
                                        <div class="p-2 ">
                                            <span class="text-theme-1">{{  $writer->about }}</span>
                                        </div> 

                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- END: Display Information -->

                        @forelse ($writer->recentratings as $comment)
                        <div class="flex col-span-1">
                            <div class="relative flex-shrink-0 w-20 h-20 text-left">
                                <a href="{{ '@' . $comment->user->name }}">
                                </a>
                            </div>
                            <div class="relative px-4 mb-16 leading-6 text-left">
                                <div class="box-border text-lg font-medium text-gray-600">
                                    {{ $comment->comment }}
                                </div>
                                <div class="box-border mt-5 text-lg font-semibold text-indigo-900 uppercase">
                                    Rating: <strong>{{ $comment->rating }}</strong> ⭐
                                    <!-- @auth
                                    @if(auth()->user()->id == $comment->user_id || auth()->user()->role->name == 'admin' ))
                                    - <a wire:click.prevent="delete({{ $comment->id }})" class="text-sm cursor-pointer">Delete</a>
                                    @endif
                                    @endauth -->
                                </div>
                                <div class="box-border text-left text-gray-700" style="quotes: auto;">
                                    <a href="#">
                                        <strong>By</strong> {{ $comment->user->name }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="flex col-span-1">
                            <div class="relative px-4 mb-16 leading-6 text-left">
                                <div class="box-border text-lg font-medium text-gray-600">
                                    No ratings
                                </div>
                            </div>
                        </div>
                        @endforelse

        </div>
    </div>

</x-app-layout>

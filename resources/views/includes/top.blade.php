<div class="fixed z-50 top-0 right-5 md:right-20 bg-transparent p-4 pt-2 space-x-8"><a href="{{ route('home') }}">
        <ion-icon name="wallet-outline"
                  style="font-size: 20px; font-weight: bold; position: relative; top: 6px"></ion-icon>
        <span
            class="font-bold ml-2 text-gray-700">${{ number_format(\Illuminate\Support\Facades\Auth::user()->balance) }}</span></a>

    <a
        href="{{ route('chat') }}" class="hidden md:inline-block">
        <ion-icon name="chatbox-outline"
                  style="font-size: 20px; font-weight: bold; position: relative; top: 6px"></ion-icon>
        <span class="font-bold ml-2 text-gray-700">Chats</span></a>

    <style> .dropdown:hover .dropdown-menu {
            display: block;
        }
    </style>
    <div class="dropdown inline-block relative z-10">
        <div class="flex flex-row flex-wrap items-center" >
            <ion-icon name="notifications"
             ></ion-icon>
            <span class="font-bold ml-2 text-gray-700">Notifications</span>
            <span id="notification-alert-badge" class="flex h-3 w-3 relative" style="display: none;">
                    <span class="animate-ping delay-1000 absolute inline-flex h-full w-full rounded-full bg-purple-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-3 w-3 bg-purple-500"></span>
            </span>
            <svg class="fill-current h-4 w-4 relative"
                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
            </svg>
        </div>


        <div class="dropdown-menu w-full md:w-72 absolute hidden text-gray-700 shadow bg-white">

            <ul id="notification-alert-list" class="pt-1 rounded bg-transparent">

            </ul>
            <div class="">

                @if(!empty(session('notifications')))
                    @foreach(session('notifications') as $key => $value)
                        <li class='bg-white px-2 flex flex-wrap items-center  hover:bg-indigo-400 border-b border-gray-300 py-2'>
                            <a class='rounded-full max-w-1/6 h-8 w-8 bg-gray-100 border-b border-gray-300 overflow-hidden block whitespace-wrap' href=#> 
                                @if(@$value->profile_photo_path)
                                    <img alt="{{$value->username}}" class="w-8 h-8 rounded-full " src="{{url('storage').'/'.@$value->profile_photo_path}}" />

                                @else
                                    <span class="p-2 h-full w-full flex items-centre"><ion-icon name='person' style='position:relative; '></ion-icon></span>

                                @endif
                            </a>

                            <a class='w-5/6 hover:bg-indigo-400 px-4 block whitespace-wrap' href='/user/notifications'>  
                                <span class='ml-2'>{{$value->notification}}</span>
                            </a>
                        </li>
   
                    @endforeach
                @else

                @endif

                <a href="/user/notifications" class="rounded-b bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap"
                >
                    <ion-icon name="log-out-outline"
                              style="font-size: 20px; position:relative; top: 6px "></ion-icon>
                    <span class="ml-2">View More</span></a>
            </div>
        </div>
    </div>
    <div class="dropdown inline-block relative z-10" x-data="{ open: false }">
        <div class="flex flex-row">
            @if(\Illuminate\Support\Facades\Auth::user()->profile_photo_url != null)
                <img src="{{ asset(\Illuminate\Support\Facades\Auth::user()->profile_photo_url) }}" style="
                    width: 30px; height: 30px;" class="relative rounded-2xl" @click="open = ! open">
                <svg style="margin-left: 5px" class="fill-current h-4 w-4 relative top-4" @click="open = ! open"
                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                </svg>
            @else
                <ion-icon style="width: 20px; height: 20px;" class="mt-2" name="person-outline"></ion-icon>
                <svg style="margin-left: 5px" class="fill-current h-4 w-4 relative"
                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                </svg>
            @endif
        </div>

        <ul class="dropdown-menu absolute hidden text-gray-700 pt-1 right-1" x-show="open">
            <li class=""><a class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap"
                            href="{{ route('profile.show') }}">
                    <ion-icon name="cog-outline" style="font-size: 20px; position:relative; top: 6px "></ion-icon>
                    <span class="ml-2">Profile</span></a>
            </li>
            <li>
                <a
                    href="{{ route('chat') }}" class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap">
                    <ion-icon name="chatbox-outline"
                              style="font-size: 20px; font-weight: bold; position: relative; top: 6px"></ion-icon>
                    <span class="ml-2">Chats</span></a>
            </li>
            <li>
                <a href="{{ route('notification') }}"
                   class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap">
                    <ion-icon name="notifications-outline"
                              style="font-weight: bold; font-size: 20px; position: relative; top: 6px"></ion-icon>
                    <span class="ml-2">Notifications</span></a>
            </li>
            <li class="">
                <a href="/logout" class="rounded-b bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap"
                   type="submit">
                    <ion-icon name="log-out-outline"
                              style="font-size: 20px; position:relative; top: 6px "></ion-icon>
                    <span class="ml-2">Logout</span></a>
            </li>
        </ul>
    </div>
</div>

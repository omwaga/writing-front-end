<div class="fixed z-50 top-0 right-20 bg-transparent p-4 space-x-8 flex flex-wrap"><a href="{{ route('home') }}">
        <ion-icon name="wallet-outline"
                  style="font-size: 20px; font-weight: bold; position: relative; top: 6px"></ion-icon>
        <span
            class="font-bold ml-2 text-gray-700">@livewire('writer.balance')</span></a><a
        href="{{ route('writer-chat') }}">
        <ion-icon name="chatbox-outline"
                  style="font-size: 20px; font-weight: bold; position: relative; top: 6px"></ion-icon>
        <span class="font-bold ml-2 text-gray-700">Chats</span></a>
        <style> .dropdown:hover .dropdown-menu {
            display: block;
        }</style>
    <div class="dropdown inline-block relative z-10">
        <div class="flex flex-row flex-wrap item-center" >
            <div>

                <span class="font-bold ml-2 text-gray-700">Notifications</span>
                <ion-icon name="notifications"
                       ></ion-icon>
            </div>
            <span id="notification-alert-badge" class="flex h-3 w-3 relative" style="display: none;">
                    <span class="animate-ping delay-1000 absolute inline-flex h-full w-full rounded-full bg-purple-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-3 w-3 bg-purple-500"></span>
            </span>
            <svg class="fill-current h-4 w-4 relative top-2"
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
                                @if($value->profile_photo_path)
                                    <img alt="{{$value->username}}" class="w-8 h-8 rounded-full " src="{{url('storage').'/'.$value->profile_photo_path}}" />

                                @else
                                    <span><ion-icon name='person' style='position:relative; '></ion-icon></span>

                                @endif
                            </a>


                            <a class='w-5/6 hover:bg-indigo-400 px-4 block whitespace-wrap' href='/writer/notifications'>  
                                <span class='ml-2'>{{$value->notification}}</span>
                            </a>
                        </li>
   
                    @endforeach
                @else

                @endif

                <a href="/writer/notifications" class="rounded-b bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap"
                >
                <ion-icon name="log-out-outline"
                        style="font-size: 20px; position:relative; top: 6px "></ion-icon>
                <span class="ml-2">View More</span></a>
            </div>
        </div>
    </div>

    <div class="dropdown inline-block relative z-10">
        <div class="flex flex-row">
            <img src="{{ \Illuminate\Support\Facades\Auth::user()->profile_photo_url }}" alt="" style="
                    width: 30px; height: 30px;" class="rounded-2xl relative">
            <svg style="margin-top: 8px; margin-left: 5px" class="fill-current h-4 w-4 relative"
                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
            </svg>
        </div>

        <ul class="dropdown-menu absolute hidden text-gray-700 pt-1">
            <li class=""><a class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap"
                            href="{{ route('writer-profile') }}">
                    <ion-icon name="cog-outline" style="font-size: 20px; position:relative; top: 6px "></ion-icon>
                    <span class="ml-2">Profile</span></a>
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

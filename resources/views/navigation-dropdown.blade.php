<nav x-data="{ open: false }"
     class="bg-white fixed w-full z-50 @if(request()->routeIs('home')) ''  @else shadow-lg @endif">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
        <div class="flex h-16 w-full">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <x-jet-application-mark class="block h-9 w-auto"/>
                    </a>
                </div>
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px pl-72 sm:flex sm:mr-auto">
                    @if(request()->routeIs('home') or request()->routeIs('top-writers') or request()->routeIs('about')
                    or request()->routeIs('order-now') or request()->routeIs('faqs') or request()->routeIs('contact')
                    or request()->routeIs('login') or request()->routeIs('register') or request()->routeIs('writer-registration') or request()->routeIs('grammar-questions')
                    or request()->routeIs('writer-failed') or request()->routeIs('writer-review') or request()->routeIs('writer-test') or request()->routeIs('email-verified')
                    or request()->routeIs('email-unverified') or request()->routeIs('blog') or request()->routeIs('blog.read') or request()->routeIs('post.create') or request()->routeIs('posts')
                    or request()->routeIs('posts.edit'))
                        <x-jet-nav-link href="{{ route('home') }}" class="font-bold whitespace-no-wrap"
                                        :active="request()->routeIs('home')">
                            {{ __('Home') }}
                        </x-jet-nav-link>

                        <x-jet-nav-link href="{{ route('top-writers') }}" class="font-bold whitespace-no-wrap"
                                        :active="request()->routeIs('top-writers')">
                            {{ __('Top Writers') }}
                        </x-jet-nav-link>

                        <x-jet-nav-link href="{{ route('about') }}" class="font-bold whitespace-no-wrap"
                                        :active="request()->routeIs('about')">
                            {{ __('About us') }}
                        </x-jet-nav-link>

                        <x-jet-nav-link href="{{ route('blog') }}" class="font-bold whitespace-no-wrap"
                                        :active="request()->routeIs('blog')">
                            {{ __('Blog') }}
                        </x-jet-nav-link>

                        <x-jet-nav-link href="{{ route('contact') }}" class="font-bold whitespace-no-wrap"
                                        :active="request()->routeIs('contact')">
                            {{ __('Contact us') }}
                        </x-jet-nav-link>

                        <x-jet-nav-link href="{{ route('faqs') }}" class="font-bold whitespace-no-wrap"
                                        :active="request()->routeIs('faqs')">
                            {{ __('FAQs') }}
                        </x-jet-nav-link>

                        @if(\Illuminate\Support\Facades\Auth::guard('writers')->check())
                            <x-jet-nav-link href="{{ route('available-orders') }}" class="font-bold"
                                            style="color: #53B4C8"
                                            :active="request()->routeIs('available-orders')">
                                <ion-icon name="person-outline"
                                          style="font-size: 20px; padding-right: 5px;"></ion-icon> {{ __('Account') }}
                            </x-jet-nav-link>
                        @elseif(\Illuminate\Support\Facades\Auth::check())
                            <style> .dropdown:hover .dropdown-menu {
                                    display: block;
                                }</style>
                            <div class="dropdown inline-block relative z-10">
                                <div class="flex flex-row whitespace-no-wrap">
                                    <span class="mt-4" style="color: #53B4C8">
                                        <ion-icon name="person-outline"
                                                  style="font-size: 20px; padding-right: 10px; position:relative; top: 4px"></ion-icon>Account</span>
                                    <svg style="margin-top: 15px; margin-left: 5px; color: #53B4C8"
                                         class="fill-current h-4 w-4 relative top-2"
                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path
                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                    </svg>
                                </div>

                                <ul class="dropdown-menu absolute hidden text-gray-700 pt-1">
                                    @if(isset(\Illuminate\Support\Facades\Auth::guard('writers')->user()->email))
                                        <li class=""><a
                                                class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap"
                                                href="{{ route('available-orders') }}">
                                                <ion-icon name="cog-outline"
                                                          style="font-size: 20px; position:relative; top: 6px "></ion-icon>
                                                <span class="ml-2">Available Orders</span></a>
                                        </li>
                                    @else
                                        <li class=""><a
                                                class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap"
                                                href="{{ route('dashboard') }}">
                                                <ion-icon name="cog-outline"
                                                          style="font-size: 20px; position:relative; top: 6px "></ion-icon>
                                                <span class="ml-2">My Orders</span></a>
                                        </li>
                                    @endif

                                    <li class="">
                                        <a href="/logout"
                                           class="rounded-b bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap"
                                           type="submit">
                                            <ion-icon name="log-out-outline"
                                                      style="font-size: 20px; position:relative; top: 6px"></ion-icon>
                                            <span class="ml-2">Logout</span></a>
                                    </li>
                                </ul>
                            </div>
                        @else
                            <x-jet-nav-link href="{{ route('login') }}" class="font-bold" style="color: #53B4C8"
                                            :active="request()->routeIs('login')">
                                <ion-icon name="person-outline"
                                          style="font-size: 20px; padding-right: 5px;"></ion-icon> {{ __('Login') }}
                            </x-jet-nav-link>
                        @endif

                        <x-jet-nav-link
                            class="transition duration-200 hover:shadow-4xl text-blue-600 py-2 px-5 shadow-2xl h-10 mt-3 flex items-center rounded-2xl text-lg pt-2 whitespace-no-wrap"
                            style="box-shadow: 3px 9px 40px -12px rgba(0, 0, 0, 0.5)" href="{{ route('order-now') }}">
                            {{ __('Order Now') }}
                        </x-jet-nav-link>
                    @endif
                </div>
            </div>

        @if(request()->routeIs('home') or request()->routeIs('top-writers') or request()->routeIs('about')
                or request()->routeIs('order-now') or request()->routeIs('faqs') or request()->routeIs('contact')
                or request()->routeIs('email-verified'))
            <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button
                                    class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">

                                </button>
                            @else
                                <button
                                    class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                    <div>
                                        @if(isset(Auth::user()->name))
                                            {{ Auth::user()->name }}
                                        @else
                                            <a href="{{ route('login') }}">Login</a>
                                        @endif
                                    </div>

                                    @if(isset(Auth::user()->name))
                                        <div class="ml-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                      clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                    @endif
                                </button>
                            @endif
                        </x-slot>


                        <x-slot name="content">
                        @if(isset(Auth::user()->name))
                            <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Manage Account') }}
                                </div>

                                <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('Profile') }}
                                </x-jet-dropdown-link>

                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                    <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                        {{ __('API Tokens') }}
                                    </x-jet-dropdown-link>
                                @endif

                                <div class="border-t border-gray-100"></div>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-jet-dropdown-link href="{{ route('logout') }}"
                                                         onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                        {{ __('Logout') }}
                                    </x-jet-dropdown-link>
                                </form>
                            @endif

                        </x-slot>
                    </x-jet-dropdown>

                </div>
        @endif
        @if(request()->route()->getPrefix() != '/user')
            <!-- Hamburger -->
                <div class="-mr-2 flex items-center sm:hidden absolute right-10 top-4">
                    <button @click="open = ! open"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                                  stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4 6h16M4 12h16M4 18h16"/>
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden"
                                  stroke-linecap="round"
                                  stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            @endif
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link href="{{ route('home') }}" class="font-bold"
                                       :active="request()->routeIs('home')">
                {{ __('Home') }}
            </x-jet-responsive-nav-link>

            <x-jet-responsive-nav-link href="{{ route('top-writers') }}" class="font-bold"
                                       :active="request()->routeIs('top-writers')">
                {{ __('Top Writers') }}
            </x-jet-responsive-nav-link>

            <x-jet-responsive-nav-link href="{{ route('about') }}" class="font-bold"
                                       :active="request()->routeIs('about')">
                {{ __('About us') }}
            </x-jet-responsive-nav-link>

            <x-jet-responsive-nav-link href="{{ route('blog') }}" class="font-bold"
                                       :active="request()->routeIs('blog')">
                {{ __('Blog') }}
            </x-jet-responsive-nav-link>

            <x-jet-responsive-nav-link href="{{ route('contact') }}" class="font-bold"
                                       :active="request()->routeIs('contact')">
                {{ __('Contact us') }}
            </x-jet-responsive-nav-link>

            <x-jet-responsive-nav-link href="{{ route('faqs') }}" class="font-bold"
                                       :active="request()->routeIs('faqs')">
                {{ __('FAQs') }}
            </x-jet-responsive-nav-link>

        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                <div class="flex-shrink-0">
                </div>
                <div class="ml-3">
                    <div class="font-medium text-base text-gray-800">
                        @if(isset(Auth::user()->name))
                            {{ Auth::user()->name }}
                        @endif
                    </div>
                    <div class="font-medium text-sm text-gray-500">
                        @if(isset(Auth::user()->email))

                            {{ Auth::user()->email }}
                        @endif

                    </div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                @if(\Illuminate\Support\Facades\Auth::guard('writers')->check() || \Illuminate\Support\Facades\Auth::check())
                    @auth('writers')
                        <x-jet-responsive-nav-link href="{{ route('writer-profile') }}"
                                                   :active="request()->routeIs('profile.show')">
                            {{ __('Profile') }}
                        </x-jet-responsive-nav-link>
                    @endauth

                    @auth
                        <x-jet-responsive-nav-link href="{{ route('my-order') }}"
                                                   :active="request()->routeIs('profile.show')">
                            {{ __('Profile') }}
                        </x-jet-responsive-nav-link>
                    @endauth

                <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            {{ __('Logout') }}
                        </x-jet-responsive-nav-link>
                    </form>
                @else
                    <x-jet-responsive-nav-link href="{{ route('login') }}"
                                               :active="request()->routeIs('login')">
                        {{ __('Login') }}
                    </x-jet-responsive-nav-link>
                @endif

            <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-gray-200"></div>

                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Team') }}
                    </div>

                    <!-- Team Settings -->
                    <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}"
                                               :active="request()->routeIs('teams.show')">
                        {{ __('Team Settings') }}
                    </x-jet-responsive-nav-link>

                    <x-jet-responsive-nav-link href="{{ route('teams.create') }}"
                                               :active="request()->routeIs('teams.create')">
                        {{ __('Create New Team') }}
                    </x-jet-responsive-nav-link>

                    <div class="border-t border-gray-200"></div>

                    <!-- Team Switcher -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Switch Teams') }}
                    </div>

                    @foreach (Auth::user()->allTeams() as $team)
                        <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link"/>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</nav>

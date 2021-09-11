<div class="md:flex flex-col md:flex-row md:min-h-screen fixed left-0 top-6 z-40 shadow-lg ">
    <div @click.away="open = false"
         class="flex flex-col w-full md:w-64 text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800 flex-shrink-0 mt-8"
         x-data="{ open: false }">
        <div class="flex-shrink-0 px-4 py-4 flex flex-row items-center justify-between">
            <button class="rounded-lg md:hidden rounded-lg focus:outline-none focus:shadow-outline"
                    @click="open = !open">
                <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                    <path x-show="!open" fill-rule="evenodd"
                          d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                          clip-rule="evenodd"></path>
                    <path x-show="open" fill-rule="evenodd"
                          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                          clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <nav :class="{'block': open, 'hidden': !open}"
             class="flex-grow md:block px-4 pb-4 md:pb-0 md:overflow-y-auto">
            <a class="block font-bold px-4 py-2 flex flex-row content-center align-middle @if(request()->routeIs('my-order'))shadow-lg bg-blue-200 @endif  mt-2 text-sm font-semibold text-gray-900 rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
               href="/user/my-orders">
                <ion-icon name="clipboard-outline"
                          style="font-size: 20px; padding-right: 10px;"></ion-icon>
                <span class="align-middle relative">My Orders</span></a>
            <a class="block font-bold px-4 py-2 mt-2 text-sm flex flex-row align-center align-middle @if(request()->routeIs('drafts'))shadow-lg bg-blue-200 @endif font-semibold text-gray-900 bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
               href="/user/drafts">
                <ion-icon name="create-outline"
                          style="font-size: 20px; padding-right: 10px;"></ion-icon>
                Drafts</a>
            <a class="block font-bold px-4 py-2 mt-2 text-sm flex flex-row @if(request()->routeIs('bidding'))shadow-lg bg-blue-200 @endif font-semibold text-gray-900 bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
               href="/user/bidding">
                <ion-icon name="briefcase-outline"
                          style="font-size: 20px; padding-right: 10px"></ion-icon>
                Bidding</a>
            <a class="block font-bold px-4 py-2 mt-2 text-sm flex flex-row @if(request()->routeIs('progress'))shadow-lg bg-blue-200 @endif font-semibold text-gray-900 bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
               href="/user/in-progress">
                <ion-icon name="hourglass-outline"
                          style="font-size: 20px; padding-right: 10px;"></ion-icon>
                In progress</a>
            <a class="block font-bold px-4 py-2 mt-2 text-sm flex flex-row @if(request()->routeIs('completed'))shadow-lg bg-blue-200 @endif font-semibold text-gray-900 bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
               href="/user/completed">
                <ion-icon name="checkmark-done-circle-outline"
                          style="font-size: 20px; padding-right: 10px;"></ion-icon>
                Completed</a>
            <a class="block font-bold px-4 py-2 mt-2 flex flex-row text-sm @if(request()->routeIs('cancelled')) shadow-lg bg-blue-200 @endif font-semibold text-gray-900 bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
               href="/user/cancelled">
                <ion-icon name="close-circle-outline"
                          style="font-size: 20px; padding-right: 10px;"></ion-icon>
                Cancelled</a>
            <hr class="mt-4">
            <a class="block font-bold px-4 py-2 mt-2 flex flex-row text-sm @if(request()->routeIs('writers'))shadow-lg bg-blue-200 @endif  font-semibold text-gray-900 bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
               href="/user/writers">
                <ion-icon name="people-outline"
                          style="font-size: 20px; padding-right: 10px"></ion-icon>
                Writers</a>
            <a class="block font-bold px-4 py-2 mt-2 flex flex-row text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
               href="/contact">
                <ion-icon name="help-circle-outline"
                          style="font-size: 20px; padding-right: 10px; "></ion-icon>
                Help</a>
            <a class="block font-bold px-4 py-2 mt-2 flex flex-row text-sm @if(request()->routeIs('rules')) bg-blue-200 shadow-lg @endif font-semibold text-gray-900 bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
               href="/user/rules">
                <ion-icon name="color-wand-outline"
                          style="font-size: 20px; padding-right: 10px; "></ion-icon>
                Rules & Tips</a>
        </nav>
    </div>
</div>

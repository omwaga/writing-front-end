<x-app-layout>
    @include('includes.sidebar')
    @include('includes.top')
    <div class="flex flex-wrap absolute top-20 w-3/4 ml-1/5" id="tabs-id">
        <div class="w-full">
            <ul class="flex mb-0 list-none flex-wrap pt-3 pb-4 flex-row">
                <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                    <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-black  bg-blue-400"
                       onclick="changeAtiveTab(event,'tab-settings')">
                        <i class="fas fa-cog text-base mr-1"></i> All
                    </a>
                </li>
                <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                    <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-black bg-white"
                       onclick="changeAtiveTab(event,'tab-profile')">
                        <i class="fas fa-space-shuttle text-base mr-1"></i> Favourite
                    </a>
                </li>
                <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                    <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-black bg-white"
                       onclick="changeAtiveTab(event,'tab-options')">
                        <i class="fas fa-briefcase text-base mr-1"></i> Blocked
                    </a>
                </li>
            </ul>
            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                <div class="px-4 py-5 flex-auto">
                    <div class="tab-content tab-space">
                      <div class="block" id="tab-settings">
                            <table class="min-w-full">
                                <tbody class="bg-white">
                                @foreach($all as $index=>$writer)
                                    @php
                                        $email = $writer->email;
                                        $count = \Illuminate\Support\Facades\DB::table('blocked_writers')
                                    ->where('email', $email)
                                    ->count();
                                    @endphp
                                    @if($count == 0)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                {{ $index + 1 }}
                                            </td>

                                            <?php

    

                                                $writers = App\Models\Writer::where('email', $writer->email)
                                                ->get(['id', 'name', 'about', 'completed_orders', 'rating']);
                                            ?>

                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 flex flex-col">
                                                <div
                                                    class="text-sm leading-7 font-medium text-gray-900">
                                                    @foreach($writers as $w)
                                                        <span class="font-bold">{{ $w->name }}</span>
                                                    @endforeach
                                                </div>
                                                <div
                                                    class="text-sm leading-7 font-medium text-gray-400 uppercase">
                                                    @foreach($writers as $w)
                                                        {{ $w->completed_orders }} Completed Orders
                                                    @endforeach
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                <div
                                                    class="text-sm leading-7 font-medium text-gray-900">
                                                    @foreach($writers as $w)
                                                        {{ substr($w->about, 0, 70) }}...
                                                    @endforeach
                                                </div>
                                                <div
                                                    class="text-sm leading-7 font-medium text-gray-400 uppercase">
                                                    @foreach($writers as $w)
                                                        rating {{ $w->averageRating() }} / 5
                                                    @endforeach
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                <a href="{{  url( 'user/writer/view', $writer->id) }}"
                                                   class="text-blue-500 font-bold border-b">View</a>
                                            </td>
                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                <a href="{{ route('user.block.writer', ['id' => $w->id]) }}"
                                                   class="text-blue-500 border-b border-blue-400 text-bold">Block</a>
                                            </td>
                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                @foreach($writers as $w)
                                                    <a href="{{ route('favourite-writer', ['id' => $w->id]) }}">
                                                        <ion-icon name="heart-outline"
                                                                  class="hover:text-red-500 text-xl transition duration-200"></ion-icon>
                                                    </a>
                                                @endforeach
                                            </td>

                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                            <div class="mt-4 mb-4">
                                {{ $all->links() }}
                            </div>
                        </div>
                        <div class="hidden" id="tab-profile">
                            <table class="min-w-full">
                                <tbody class="bg-white">
                                @foreach($favorites as $index=>$favorite)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            {{ $index + 1 }}
                                        </td>

                                        <?php
                                        $writer = App\Models\Writer::where('email', $favorite->email)
                                            ->get(['id', 'name', 'about', 'completed_orders', 'rating']);
                                        ?>

                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 flex flex-col">
                                            <div
                                                class="text-sm leading-7 font-medium text-gray-900">
                                                @foreach($writer as $w)
                                                    {{ $w->name }}
                                                @endforeach
                                            </div>
                                            <div
                                                class="text-sm leading-7 font-medium text-gray-400 uppercase">
                                                @foreach($writer as $w)
                                                    {{ $w->completed_orders }} Completed Orders
                                                @endforeach
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">

                                            <div
                                                class="text-sm leading-7 font-medium text-gray-900">
                                                @foreach($writer as $w)
                                                    {{ substr($w->about, 0, 70) }}
                                                @endforeach
                                            </div>
                                            <div
                                                class="text-sm leading-7 font-medium text-gray-400 uppercase">
                                                @foreach($writer as $w)
                                                    rating {{ $w->averageRating() }} / 5
                                                @endforeach
                                            </div>
                                        </td>
                                        @foreach($writer as $w)
                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                <a href="{{ route('user.view.writer', ['id' => $w->id]) }}"
                                                   class="text-blue-400 border-b border-blue-400 text-bold">View</a>
                                            </td>
                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                <a href="{{ route('user.block.writer', ['id' => $w->id]) }}"
                                                   class="text-blue-400 border-b border-blue-400 text-bold">Block</a>
                                            </td>
                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                <a href="{{ route('remove-favourite', ['id' => $w->id]) }}">
                                                    <ion-icon name="heart-outline"
                                                              style="font-size: 25px; color: red"></ion-icon>
                                                </a>
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="mt-4 mb-4">
                                {{ $favorites->links() }}
                            </div>
                        </div>

                        <div class="hidden" id="tab-options">
                            <table class="min-w-full">
                                <tbody class="bg-white">
                                @foreach($blocked as $index=>$writer)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            {{ $index + 1 }}
                                        </td>

                                        <?php
                                        $writers = App\Models\Writer::where('email', $writer->email)
                                            ->get(['name', 'about', 'completed_orders', 'rating']);
                                        ?>

                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 flex flex-col">
                                            <div
                                                class="text-sm leading-7 font-medium text-gray-900">
                                                @foreach($writers as $w)
                                                    {{ $w->name }}
                                                @endforeach
                                            </div>
                                            <div
                                                class="text-sm leading-7 font-medium text-gray-400 uppercase">
                                                @foreach($writers as $w)
                                                    {{ $w->completed_orders }} Completed Orders
                                                @endforeach
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">

                                            <div
                                                class="text-sm leading-7 font-medium text-gray-900">
                                                @foreach($writers as $w)
                                                    {{ substr($w->about, 0, 70) }}...

                                                @endforeach
                                            </div>
                                            <div
                                                class="text-sm leading-7 font-medium text-gray-400 uppercase">
                                                @foreach($writers as $w)
                                                    rating {{ $w->averageRating() }} / 5
                                                @endforeach
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <a href="{{ route('user.view.writer', ['id'=>$writer->id]) }}"
                                               class="text-blue-400 border-b border-blue-400 font-bold">View</a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <a href="{{ route('user.unblock.writer', ['id'=>$writer->id]) }}"
                                               class="text-blue-400 border-b border-blue-400 font-bold">Unblock</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="mt-4 mb-4">
                                {{ $blocked->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function changeAtiveTab(event, tabID) {
            let element = event.target;
            while (element.nodeName !== "A") {
                element = element.parentNode;
            }
            ulElement = element.parentNode.parentNode;
            aElements = ulElement.querySelectorAll("li > a");
            tabContents = document.getElementById("tabs-id").querySelectorAll(".tab-content > div");
            for (let i = 0; i < aElements.length; i++) {
                aElements[i].classList.remove("bg-blue-400");
                aElements[i].classList.add("text-black");
                aElements[i].classList.add("bg-white");
                tabContents[i].classList.add("hidden");
                tabContents[i].classList.remove("block");
            }
            element.classList.remove("text-blue-600");
            element.classList.remove("bg-white");
            element.classList.add("text-white");
            element.classList.add("bg-blue-400");
            document.getElementById(tabID).classList.remove("hidden");
            document.getElementById(tabID).classList.add("block");
        }
    </script>
</x-app-layout>

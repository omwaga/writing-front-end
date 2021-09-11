<x-app-layout>
    @include('includes.sidebar')
    @include('includes.top')

    <div class="absolute top-20 w-2/3 mx-auto md:mx-0 md:ml-1/4 bg-gray-100">
        <div class="mt-4 mb-4 flex content-end items-end ml-auto text-right justify-end">
            <a href="/user/order/add"
               class="text-right bg-blue-400 shadow-lg text-white p-2 rounded-2xl px-5 font-bold flex flex-row">
                <ion-icon name="add-circle-outline" style="font-size: 20px; position: relative;"></ion-icon>
                <span class="ml-2">New Order</span></a>
        </div>
        <table class="min-w-full">
            <tbody class="bg-white">
            <?php
            function time_elapsed_string($datetime, $full = false)
            {
                $now = new DateTime;
                $ago = new DateTime($datetime);
                $diff = $now->diff($ago);

                $diff->w = floor($diff->d / 7);
                $diff->d -= $diff->w * 7;

                $string = array(
                    'y' => 'year',
                    'm' => 'month',
                    'w' => 'week',
                    'd' => 'day',
                    'h' => 'hour',
                    'i' => 'minute',
                    's' => 'second',
                );
                foreach ($string as $k => &$v) {
                    if ($diff->$k) {
                        $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
                    } else {
                        unset($string[$k]);
                    }
                }

                if (!$full) $string = array_slice($string, 0, 1);
                return $string ? implode(', ', $string) . '' : 'just now';
            }

            ?>
            @foreach($orders as $index=>$order)
                <tr>
                    <td class="px-2 md:px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                                {{ $order->id }}
                            </div>
                        </div>
                    </td>

                    <td class="px-2 md:px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        <div>
                            <div class="text-sm leading-7 font-medium text-gray-900">{{ $order->topic }}
                            </div>
                            <div class="text-sm leading-7 text-gray-500">{{ $order->service }}</div>
                        </div>
                    </td>

                    <td class="px-2 md:px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        <div class="text-sm leading-7 text-gray-900">
                            @if($order->pages > 1)
                                {{ $order->pages }} pages
                            @else
                                {{ $order->pages }} page
                            @endif
                        </div>
                        <div class="text-sm leading-7 text-gray-500">{{ $order->level }}</div>
                    </td>

                    <td class="px-2 md:px-6 py-4 whitespace-no-wrap border-b border-gray-200">

                        @if($order->completed == 1)
                            <span
                                class="px-2 inline-flex shadow-lg text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                completed
                            </span>
                        @elseif($order->bidding == 1)
                            <span
                                class="px-2 inline-flex shadow-lg text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                bidding
                            </span>
                            <br>
                            <span
                                class="px-2 inline-flex shadow-lg text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-black-800">
                                <?php
                                $bids = \Illuminate\Support\Facades\DB::table('bidding_orders')
                                    ->where('order_id', $order->id)
                                    ->count();
                                ?>
                                {{ $bids }} writer @if($bids == 1) bid @else bids @endif
                            </span>
                        @elseif($order->draft == 1)
                            <span
                                class="px-2 inline-flex text-xs shadow-lg leading-5 font-semibold rounded-full bg-yellow-100 text-yello-800">
                                draft
                            </span>
                        @elseif($order->cancelled == 1)
                            <span
                                class="px-2 inline-flex text-xs shadow-lg leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                cancelled
                            </span>
                        @elseif($order->in_progress == 1)
                            <span
                                class="px-2 inline-flex text-xs shadow-lg leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                in progress
                            </span>
                        @endif
                    </td>

                    <td
                        class="invisible md:visible px-2 md:px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                        @if(!request()->routeIs('order-completed'))
                            @if(\Carbon\Carbon::parse($order->deadline)->isPast())
                                <span
                                    class="bg-red-200 text-red-600 rounded-xl shadow-lg px-4 p-1 text-white font-bold">Overdue by {{ time_elapsed_string($order->deadline) }}</span>
                            @else

                                <span
                                    class="bg-green-200 text-green-600 rounded-xl shadow-lg px-4 p-1 text-white font-bold">{{ time_elapsed_string($order->deadline) }} remaining</span>
                            @endif
                        @endif
                    </td>

                    <td
                        class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                        <a href="/user/order/view/{{{$order->id}}}"
                           class="text-indigo-600 hover:text-indigo-900 font-bold border-b">View</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="mt-5 mb-5">
            {{ $orders->links() }}
        </div>
    </div>
</x-app-layout>

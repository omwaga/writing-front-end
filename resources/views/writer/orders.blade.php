<x-app-layout>
    @include('writer.sidebar')
    @include('writer.top')
    <div class="absolute top-20 w-2/3 ml-1/4 bg-gray-100 shadow-lg rounded-lg">
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
        @if(count($orders) == 0)
            @if(request()->routeIs('invited-order'))
                <div class="absolute top-10 bg-white rounded shadow w-2/3 ml-1/6 p-4 text-center text-xl">
                    <p class="text-gray-700">You have not been invited to any orders</p>
                </div>
            @elseif(request()->routeIs('writer-bidding'))
                <div class="absolute top-10 bg-white rounded shadow w-2/3 ml-1/6 p-4 text-center text-xl">
                    <p class="text-gray-700">You have not placed a bid on any orders</p>
                </div>
            @elseif(request()->routeIs('writer-progress'))
                <div class="absolute top-10 bg-white rounded shadow w-2/3 ml-1/6 p-4 text-center text-xl">
                    <p class="text-gray-700">You are not working on any orders</p>
                </div>
            @elseif(request()->routeIs('writer-completed'))
                <div class="absolute top-10 bg-white rounded shadow w-2/3 ml-1/6 p-4 text-center text-xl">
                    <p class="text-gray-700">You have not completed any orders</p>
                </div>
            @elseif(request()->routeIs('writer-cancelled'))
                <div class="absolute top-10 bg-white rounded shadow w-2/3 ml-1/6 p-4 text-center text-xl">
                    <p class="text-gray-700">Non of your orders have been cancelled</p>
                </div>
            @endif
        @else
            <table class="min-w-full">
                <tbody class="bg-white">
                @foreach($orders as $order)
                    @if(request()->routeIs('writer-bidding'))
                        <?php
                        $orders = \Illuminate\Support\Facades\DB::table('orders')
                            ->where('id', $order->order_id)
                            ->where('bidding', '=', 1)
                            ->paginate(6)
                        ?>
                    @elseif(request()->routeIs('writer-progress'))
                        <?php
                        $orders = \Illuminate\Support\Facades\DB::table('orders')
                            ->where('id', $order->order_number)
                            ->where('in_progress', '=', 1)
                            ->paginate(6)
                        ?>
                    @elseif(request()->routeIs('writer-completed'))
                        <?php
                        $orders = \Illuminate\Support\Facades\DB::table('orders')
                            ->where('id', $order->order_id)
                            ->where('completed', '=', 1)
                            ->paginate(6);
                        ?>
                    @endif
                    @foreach($orders as $order)

                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        {{ $order->id  }}
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div>

                                    <div class="text-sm leading-7 font-medium text-gray-900">{{ $order->topic }}
                                    </div>
                                    <div class="text-sm leading-7 text-gray-500">{{ $order->service }}</div>
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="text-sm leading-7 text-gray-900">
                                    @if($order->pages > 1)
                                        {{ $order->pages }} pages
                                    @else
                                        {{ $order->pages }} page
                                    @endif
                                </div>
                                <div class="text-sm leading-7 text-gray-500">{{ $order->level }}</div>
                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">

                                @if($order->completed == 1)
                                    <span
                                        class="px-2 inline-flex shadow-lg text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                completed
                            </span>
                                @elseif($order->bidding == 1)
                                    <div class="flex flex-col space-y-2">
                                        <span
                                            class="px-2 shadow-lg text-center w-20 text-xs font-semibold rounded-full bg-green-100 text-green-800">Bidding</span>
                                        <?php
                                        $bids = \App\Models\BiddingOrders::where('order_id', $order->id)->count();
                                        ?>

                                        <span
                                            class="px-2 shadow-lg text-center w-20 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            @if($bids == 1)
                                                {{ $bids }} open bid
                                            @else
                                                {{ $bids }} open bids
                                            @endif
                                        </span>
                                    </div>


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
                                        class="px-2 inline-flex text-xs leading-5 shadow-lg font-semibold rounded-full bg-green-100 text-green-800">
                                in progress
                            </span>
                                @endif
                            </td>

                            <td
                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                @if(!\Carbon\Carbon::parse($order->deadline)->isPast())
                                    <span
                                        class="bg-green-200 text-green-600 rounded-xl shadow-lg px-4 p-1 text-white font-bold">{{ time_elapsed_string($order->deadline) }} remaining</span>
                                @else
                                    @if(!request()->routeIs('writer-completed'))
                                        <span
                                            class="bg-red-200 text-red-600 rounded-xl shadow-lg px-4 p-1 text-white font-bold">Overdue by {{ time_elapsed_string($order->deadline) }}</span>
                                    @endif
                                @endif
                            </td>

                            <td
                                class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                                <a href="/writer/order/view/{{{$order->id}}}"
                                   class="text-indigo-600 hover:text-indigo-900 font-bold border-b">View</a>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
                </tbody>
            </table>

            <div class="mt-5 mb-5">
                {{ $orders->links() }}
            </div>
        @endif
    </div>
</x-app-layout>

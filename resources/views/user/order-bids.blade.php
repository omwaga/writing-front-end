<x-app-layout>
    @include('includes.sidebar')
    @include('includes.top')
    <div class="absolute top-20 w-2/3 ml-1/4 bg-gray-100">
        <div class="mt-4 mb-4 ">
            <h1 class="text-xl border-b  w-1/5">Order {{ $orderNumber }} Bids</h1>
        </div>
        <table class="min-w-full">
            <tbody class="bg-white">
            @foreach($bids as $index=>$bid)
                <?php
                $writer = \Illuminate\Support\Facades\DB::table('writers')
                    ->where('email', $bid->email)
                    ->get();
                ?>
                @foreach($writer as $w)
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <div>
                                <div class="text-sm leading-7 font-medium text-gray-900">{{ $w->name }}
                                </div>
                                <div class="text-sm leading-7 text-gray-500">Rating {{ $w->rating }}</div>
                            </div>
                        </td>

                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <div class="text-sm leading-7 text-gray-900">
                                @if($w->completed_orders == 0 or $w->completed_orders >1)
                                    {{ $w->completed_orders }} Completed Orders
                                @else
                                    {{ $w->completed_orders }} Completed Order
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4 border-b border-gray-200">
                            <div class="text-sm leading-7 text-gray-900">
                                {{ $string = (strlen($w->about) > 13) ? substr($w->about,0,50).'...' : $string }}
                            </div>
                        </td>


                        <td
                            class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                            @livewire('accept-bid', ['orderNumber'=>$orderNumber, 'writerEmail' => $w->email])
                        </td>
                    </tr>
                @endforeach
            @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>

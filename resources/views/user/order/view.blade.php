<x-app-layout>
    @include('includes.sidebar')
    @include('includes.top')
    <div class="h-full bg-gray-100 relative top-10 ml-1/6">
        <div class="py-12">
            <div class="min-w-full mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg w-3/4 mx-auto pb-4">
                    <div class="mb-8 flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8 ">
                                <?php
                                $count = \Illuminate\Support\Facades\DB::table('bidding_orders')
                                    ->where('order_id', $orderNumber)
                                    ->count();
                                ?>
                                <div class="bg-gray-400  @if($count>0) flex justify-between @endif">

                                    <h1 class="text-center p-4 italic text-2xl text-white font-bold">
                                        Order #{{ $orderNumber }}</h1>

                                    @if($count>0)
                                        @foreach($orderDetails as $order)
                                            <a href="/user/order/bids/{{ $order->id }}"
                                               class="bg-blue-500 text-white mr-10 font-bold px-5 py-2 rounded-lg hover:bg-blue-800 transition duration-200 shadow-lg hover:shadow-xl h-10 my-auto text-left">See
                                                bids</a>
                                        @endforeach
                                    @endif
                                </div>

                                <div class="overflow-hidden flex flex-row justify-center">
                                    <div class="w-1/3">
                                        <p class="px-2 py-2 bg-gray-50 text-left text-sm border-b    font-medium text-gray-500 uppercase tracking-wider">
                                            Order No.
                                        </p>
                                        <p class="px-2 py-2 bg-gray-50 text-left text-sm border-b   font-medium text-gray-500 uppercase tracking-wider">
                                            Topic
                                        </p>
                                        <p class="px-2 py-2 bg-gray-50 text-left text-sm border-b   font-medium text-gray-500 uppercase tracking-wider">
                                            Level
                                        </p>
                                        <p class="px-2 py-2 bg-gray-50 text-left text-sm border-b   font-medium text-gray-500 uppercase tracking-wider">
                                            Service
                                        </p>
                                        <p class="px-2 py-2 bg-gray-50 text-left text-sm border-b   font-medium text-gray-500 uppercase tracking-wider">
                                            Type
                                        </p>
                                        <p class="px-2 py-2 bg-gray-50 text-left text-sm border-b   font-medium text-gray-500 uppercase tracking-wider">
                                            Subject
                                        </p>
                                        <p class="px-2 py-2 bg-gray-50 text-left text-sm border-b   font-medium text-gray-500 uppercase tracking-wider">
                                            Sources
                                        </p>
                                        <p class="px-2 py-2 bg-gray-50 text-left text-sm border-b   font-medium text-gray-500 uppercase tracking-wider">
                                            Pages
                                        </p>
                                        <p class="px-2 py-2 bg-gray-50 text-left text-sm border-b   font-medium text-gray-500 uppercase tracking-wider">
                                            Style
                                        </p>

                                        <p class="px-2 py-2 bg-gray-50 text-left text-sm border-b   font-medium text-gray-500 uppercase tracking-wider">
                                            Language
                                        </p>
                                        <p class="px-2 py-2 bg-gray-50 text-left text-sm border-b   font-medium text-gray-500 uppercase tracking-wider">
                                            Deadline
                                        </p>
                                        <p class="px-2 py-2 bg-gray-50 text-left text-sm border-b   font-medium text-gray-500 uppercase tracking-wider">
                                            Price
                                        </p>
                                    </div>
                                    <div class="w-1/3">
                                        @foreach($orderDetails as $index=>$order)
                                            <p class="px-2 py-2 whitespace-no-wrap text-sm border-b border-r">
                                                @if($order->id)
                                                    {{ $order->id }}
                                                @else
                                                    <br>
                                                @endif
                                            </p>
                                            <p class="px-2 py-2 whitespace-no-wrap text-sm border-b border-r">
                                                @if($order->topic)
                                                    {{ $order->topic }}
                                                @else
                                                    <br>
                                                @endif
                                            </p>
                                            <p class="px-2 py-2 whitespace-no-wrap text-sm border-b border-r">
                                                @if($order->level)
                                                    {{ $order->level }}
                                                @else
                                                    <br>
                                                @endif
                                            </p>
                                            <p class="px-2 py-2 whitespace-no-wrap text-sm border-b border-r">
                                                @if($order->service)
                                                    {{ $order->service }}
                                                @else
                                                    <br>
                                                @endif
                                            </p>
                                            <p class="px-2 py-2 whitespace-no-wrap text-sm border-b border-r">
                                                @if($order->type)
                                                    {{ $order->type }}
                                                @else
                                                    <br>
                                                @endif
                                            </p>
                                            <p class="px-2 py-2 whitespace-no-wrap text-sm border-b border-r">
                                                @if($order->subject)
                                                    {{ $order->subject }}
                                                @else
                                                    <br>
                                                @endif
                                            </p>
                                            <p class="px-2 py-2 whitespace-no-wrap text-sm border-b border-r">
                                                @if($order->sources)
                                                    {{ $order->sources }}
                                                @else
                                                    <br>
                                                @endif
                                            </p>
                                            <p class="px-2 py-2 whitespace-no-wrap text-sm border-b border-r">
                                                @if($order->pages)
                                                    {{ $order->pages }}
                                                @else
                                                    <br>
                                                @endif
                                            </p>
                                            <p class="px-2 py-2 whitespace-no-wrap text-sm border-b border-r">
                                                @if($order->style)
                                                    {{ $order->style }}
                                                @else
                                                    <br>
                                                @endif
                                            </p>
                                            <p class="px-2 py-2 whitespace-no-wrap text-sm border-b border-r">
                                                @if($order->language)
                                                    {{ $order->language }}
                                                @else
                                                    <br>
                                                @endif
                                            </p>
                                            <p class="px-2 py-2 whitespace-no-wrap text-sm border-b border-r">
                                                @if($order->deadline)
                                                    {{ $order->deadline }}
                                                @else
                                                    <br>
                                                @endif
                                            </p>
                                            <p class="px-2 py-2 whitespace-no-wrap text-sm border-b border-r">
                                                @if($order->price)
                                                    ${{ $order->price }}
                                                @else
                                                    <br>
                                                @endif
                                            </p>
                                        @endforeach
                                    </div>
                                </div>
                                    <div class="instructions p-4 mx-auto">
                                        <h2 class="font-bold text-xl border-b w-1/5 text-center mx-auto mb-4">
                                            Instructions</h2>
                                        @foreach($orderDetails as $order)
                                            <p class="mx-auto text-sm px-10 whitespace-pre-wrap">
                                                {{ $order->instructions }}
                                            </p>
                                        @endforeach
                                    </div>
                                    <div class="files p-4">
                                        <h2 class="font-bold capitalize text-xl border-b border-blue-400 w-1/6 text-center mx-auto mb-4"
                                        > order
                                            files</h2>
                                        <?php
                                        $files = Illuminate\Support\Facades\DB::table('order_files')
                                            ->where('order_number', $orderNumber)
                                            ->get();
                                        ?>
                                        @if(count($files) > 0)
                                            <div class="flex flex-col">
                                                @foreach($files as $file)
                                                    <a class="font-bold border-b border-blue-400 text-sm text-center mx-auto mb-4"
                                                       href="{{ route('download-files', ['orderNumber' => $file->id]) }}"><span
                                                            class="lnr lnr-download pr-2"></span>{{ ltrim($file->file, 'public/') }}
                                                    </a>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                    <div class="files p-4 bg-green-100">
                                        <h2 class="font-bold capitalize text-xl border-b border-blue-400 w-1/2 text-center mx-auto mb-4"
                                        > Completed files</h2>
                                        <?php
                                        $completedfiles = Illuminate\Support\Facades\DB::table('writer_order_files')
                                            ->where('order_number', $orderNumber)
                                            ->get();
                                        ?>
                                        @if(count($completedfiles) > 0)
                                            <div class="flex flex-col">
                                                @foreach($files as $file)
                                                    <a class="font-bold border-b border-blue-400 text-sm text-center mx-auto mb-4"
                                                       href="{{ route('download-files', ['orderNumber' => $file->id]) }}"><span
                                                            class="lnr lnr-download pr-2"></span>{{ ltrim($file->file, 'public/') }}
                                                    </a>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                            </div>
                        </div>
                    </div>
                    @foreach($orderDetails as $order)
                        @if($order->draft == 1)
                            <div class="flex justify-center space-x-10">
                                <a href="/user/order/edit/{{{$orderId}}}"
                                   class="text-center mb-4 p-2 px-10 shadow-lg bg-blue-500 hover:bg-blue-600 transition duration-200 text-white font-bold rounded-lg">Edit</a>
                                <a href="{{ route('delete-order', ['id' => $orderId]) }}"
                                   class="text-center mb-4 p-2 px-10 bg-red-400 hover:bg-red-600 shadow-lg text-white font-bold rounded-lg">Delete</a>
                            </div>
                        @endif
                    @endforeach

                    <div class="flex justify-center space-x-10">
                                <a href="/user/order/rate-writer/{{{$orderId}}}"
                                    class="text-center mb-4 p-2 px-10 shadow-lg bg-blue-500 hover:bg-blue-600 transition duration-200 text-white font-bold rounded-lg">Rate Writer</a>
                    </div>     
                    <div class="flex flex-wrap justify-center">

                    @if($order->completed == 1)
                        <div class="flex flex-wrap justify-center">
                            @livewire('approve-order', ['orderId'=>$orderId])

                        </div>

                    @endif                    

                    @if($order->completed == 1 && !$order->user_approved)
                                            
                            <div class="flex ml-2 justify-center space-x-10">
                                <a href="/user/order/return/{{{$orderId}}}"
                                    class="text-center mb-4 p-2 px-10 shadow-lg bg-yellow-500 hover:bg-yellow-600 transition duration-200 text-white font-bold rounded-lg">Return Order</a>
                            </div>

                    @endif                    
                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>

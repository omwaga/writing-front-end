<x-app-layout>
    @include('writer.sidebar')
    @include('writer.top')
    <div class="absolute top-20 ml-1/5 bg-gray-100">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg w-3/4 mx-auto mb-10">
            <div class="mb-2 flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <h1 class="text-center p-4 bg-gray-400 italic text-2xl text-white font-bold">
                            Order #{{ $orderNumber }}</h1>
                        <div class="overflow-hidden flex flex-row justify-center pt-2">
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

                                @if(\App\Models\AssignedOrders::where('order_number', $orderNumber)->count() == 0)

                                    <p class="px-2 py-2 bg-gray-50 text-left text-sm border-b   font-medium text-gray-500 uppercase tracking-wider">
                                        Open bids
                                    </p>
                                @endif
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
                                            ${{ $order->price * 0.3 }}
                                        @else
                                            <br>
                                        @endif
                                    </p>
                                    @if(\App\Models\AssignedOrders::where('order_number', $order->id)->count() == 0)
                                        <?php
                                        $bids = \App\Models\BiddingOrders::where('order_id', $order->id)->count();
                                        ?>
                                        <p class="px-2 py-2 whitespace-no-wrap text-sm border-b border-r">
                                            @if($bids == 1)
                                                <span
                                                    class="bg-yellow-100 text-yellow-600 font-bold px-2 py-1 rounded-xl">{{ $bids }} open bid</span>
                                            @else
                                                <span
                                                    class="bg-yellow-100 text-yellow-600 font-bold px-2 py-1 rounded-xl">{{ $bids }} open bids</span>
                                            @endif
                                        </p>
                                    @endif

                                @endforeach
                            </div>
                        </div>
                        <div class="instructions p-4 mx-auto">
                            <h2 class="font-bold text-xl border-b w-1/5 text-center mx-auto mb-4">
                                Instructions</h2>
                            @foreach($orderDetails as $order)
                                <p class="mx-auto text-sm px-10">
                                    {{ $order->instructions }}
                                </p>
                            @endforeach
                        </div>
                        <div class="files p-4 mx-auto text-center">
                            <div class="files p-4">
                                <h2 class="font-bold capitalize text-xl border-b border-blue-400 w-1/6 text-center mx-auto mb-4"
                                >order
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
                                               href="{{ route('writer-download-files', ['orderNumber' => $file->id]) }}"><span
                                                    class="lnr lnr-download pr-2"></span>{{ ltrim($file->file, 'public/') }}
                                            </a>
                                        @endforeach
                                    </div>
                                @endif
                            </div>

                            <?php
                            $assigned = \Illuminate\Support\Facades\DB::table('assigned_orders')
                                ->where('order_number', $orderNumber)
                                ->where('email', \Illuminate\Support\Facades\Auth::guard('writers')->user()->email)
                                ->count();

                            ?>
                            @if($assigned > 0)
                                <div>
                                    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css"
                                          rel="stylesheet">
                                    <script
                                        src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js"></script>

                                    <script>
                                        var dropzone = new Dropzone('#file-upload', {
                                            previewTemplate: document.querySelector('#preview-template').innerHTML,
                                            parallelUploads: 3,
                                            thumbnailHeight: 150,
                                            thumbnailWidth: 150,
                                            maxFilesize: 5,
                                            filesizeBase: 1500,
                                            thumbnail: function (file, dataUrl) {
                                                if (file.previewElement) {
                                                    file.previewElement.classList.remove("dz-file-preview");
                                                    var images = file.previewElement.querySelectorAll("[data-dz-thumbnail]");
                                                    for (var i = 0; i < images.length; i++) {
                                                        var thumbnailElement = images[i];
                                                        thumbnailElement.alt = file.name;
                                                        thumbnailElement.src = dataUrl;
                                                    }
                                                    setTimeout(function () {
                                                        file.previewElement.classList.add("dz-image-preview");
                                                    }, 1);
                                                }
                                            }
                                        });

                                        var minSteps = 6,
                                            maxSteps = 60,
                                            timeBetweenSteps = 100,
                                            bytesPerStep = 100000;

                                        dropzone.uploadFiles = function (files) {
                                            var self = this;

                                            for (var i = 0; i < files.length; i++) {

                                                var file = files[i];
                                                totalSteps = Math.round(Math.min(maxSteps, Math.max(minSteps, file.size / bytesPerStep)));

                                                for (var step = 0; step < totalSteps; step++) {
                                                    var duration = timeBetweenSteps * (step + 1);
                                                    setTimeout(function (file, totalSteps, step) {
                                                        return function () {
                                                            file.upload = {
                                                                progress: 100 * (step + 1) / totalSteps,
                                                                total: file.size,
                                                                bytesSent: (step + 1) * file.size / totalSteps
                                                            };

                                                            self.emit('uploadprogress', file, file.upload.progress, file.upload
                                                                .bytesSent);
                                                            if (file.upload.progress == 100) {
                                                                file.status = Dropzone.SUCCESS;
                                                                self.emit("success", file, 'success', null);
                                                                self.emit("complete", file);
                                                                self.processQueue();
                                                            }
                                                        };
                                                    }(file, totalSteps, step), duration);
                                                }
                                            }
                                        }

                                    </script>

                                    <style>
                                        .dropzone {
                                            background: #e3e6ff;
                                            border-radius: 13px;
                                            max-width: 550px;
                                            margin-left: auto;
                                            margin-right: auto;
                                            border: 2px dotted #1833FF;
                                            margin-top: 50px;
                                        }
                                    </style>

                                    <div id="">
                                        <h1 class="text-lg font-bold border-b w-1/3 mx-auto mt-8">Upload order files
                                            below</h1>
                                        <form action="{{ route('file-upload') }}" method="POST" class="dropzone"
                                              id="file-upload"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" value="{{ $orderNumber }}" name="orderNumber">
                                            <input type="hidden"
                                                   value="{{ \Illuminate\Support\Facades\Auth::guard('writers')->user()->email }}"
                                                   name="email">
                                            <div class="dz-message">
                                                Drag and Drop Single/Multiple Files Here<br>
                                            </div>
                                        </form>
                                        @if(session()->has('success'))
                                            <span>Uploaded successfully</span>
                                        @endif

                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-center">
                <?php
                $progress = \Illuminate\Support\Facades\DB::table('orders')
                    ->where('id', $orderNumber)
                    ->value('in_progress');           
                    
                $bidding = \Illuminate\Support\Facades\DB::table('orders')
                    ->where('id', $orderNumber)
                    ->value('bidding');
                ?>
                @if($bidding)

                    @livewire('place-bid', ['orderNumber'=>$orderNumber])
                @endif
                @if(!$progress)
                    @livewire('writer.cancel-bid', ['orderNumber'=>$orderNumber])
                @else
                    @livewire('writer.cancel-order', ['orderNumber'=>$orderNumber])

                    @livewire('writer.complete-order', ['orderNumber'=>$orderNumber])

                @endif
            </div>
        </div>

    </div>

</x-app-layout>

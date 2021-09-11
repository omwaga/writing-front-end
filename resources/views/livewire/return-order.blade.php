
    <div class="h-full bg-gray-100 relative top-10 ml-1/6">
        <div class="py-12">
            <div class="min-w-full mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg w-3/4 mx-auto pb-4">
                    <div class="mb-8 flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8 ">
                       
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
                                            <p class="px-2 py-2 whitespace-no-wrap text-sm border-b border-r">
                                                @if($order)
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
                                    </div>
                                </div>
                                    <div class="instructions p-4 mx-auto">
                                        <h2 class="font-bold text-xl border-b w-1/5 text-center mx-auto mb-4">
                                            Instructions</h2>
                                            <p class="mx-auto text-sm px-10 whitespace-pre-wrap">
                                                {{ $order->instructions }}
                                            </p>
                                    </div>
                               
                            </div>
                        </div>
                    </div>
                   

                    <form class="w-full md:w-5/6 mx-auto" wire:submit.prevent="returnOrder()">
                        
                        <div class="block px-1 py-2 mx-auto bg-green-100">
                            <label class="font-bold text-lg">Return Reason</label>
                        </div>
                        <div class="block px-1 py-2 mx-auto">
                       
                            <div class="my-5">
                                @error('comment')
                                <p class="mt-1 text-red-500">{{ $message }}</p>
                                @enderror
                                <textarea wire:model.lazy="comment" name="description" rows="5" class="block w-full px-4 py-3 border border-2 rounded-lg focus:border-blue-500 focus:outline-none" placeholder="Why would you like to return your order.."></textarea>
                            </div>
                        </div>
                        <div class="block">
                                <div class="flex flex-wrap justify-center">                      
                                    <div class="flex ml-2 justify-center space-x-10">
                                        <button type="submit"
                                            class="text-center mb-4 p-2 px-10 shadow-lg bg-yellow-500 hover:bg-yellow-600 transition duration-200 text-white font-bold rounded-lg">
                                            {{$return ? 'Edit Comment':'Return Order'}}
                                        </button>
                                    </div>
                                </div>

                        </div>
                    </form>

                  

                </div>

            </div>

        </div>

    </div>

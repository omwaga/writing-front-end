<div class="h-screen pt-8 ml-1/6">
    <style>
        [x-cloak] {
            display: none;
        }

        [type="checkbox"] {
            box-sizing: border-box;
            padding: 0;
        }

        .form-checkbox,
        .form-radio {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            -webkit-print-color-adjust: exact;
            color-adjust: exact;
            display: inline-block;
            vertical-align: middle;
            background-origin: border-box;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            flex-shrink: 0;
            color: currentColor;
            background-color: #fff;
            border-color: #e2e8f0;
            border-width: 1px;
            height: 1.4em;
            width: 1.4em;
        }

        .form-checkbox {
            border-radius: 0.25rem;
        }

        .form-radio {
            border-radius: 50%;
        }

        .form-checkbox:checked {
            background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3cpath d='M5.707 7.293a1 1 0 0 0-1.414 1.414l2 2a1 1 0 0 0 1.414 0l4-4a1 1 0 0 0-1.414-1.414L7 8.586 5.707 7.293z'/%3e%3c/svg%3e");
            border-color: transparent;
            background-color: currentColor;
            background-size: 100% 100%;
            background-position: center;
            background-repeat: no-repeat;
        }

        .form-radio:checked {
            background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3ccircle cx='8' cy='8' r='3'/%3e%3c/svg%3e");
            border-color: transparent;
            background-color: currentColor;
            background-size: 100% 100%;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>

    <div x-data="{ step: @entangle('step') }" x-cloak class="bg-gray-100">
        <div class="max-w-3xl mx-auto px-4 py-10">
            <div x-show.transition="step === 'complete'">
                <div class="bg-white rounded-lg p-10 flex items-center shadow justify-between">
                    <div>
                        <svg class="mb-4 h-20 w-20 text-green-500 mx-auto" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                  clip-rule="evenodd"/>
                        </svg>

                        @if($errors->any())
                            <h2 class="text-2xl mb-4 text-gray-800 text-center font-bold">Registration Failure</h2>
                        @else
                            <h2 class="text-2xl mb-4 text-gray-800 text-center font-bold">Registration Success</h2>
                        @endif

                        <div class="text-gray-600 mb-8">
                            Thank you. We have sent you an email to demo@demo.test. Please click the link in the
                            message
                            to activate your account.
                        </div>

                        <button
                            @click="step = 1"
                            class="w-40 block mx-auto focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-gray-600 bg-white hover:bg-gray-100 font-medium border"
                        >Back to home
                        </button>
                    </div>
                </div>
            </div>
            <div x-show.transition="step != 'complete'">
                <!-- Top Navigation -->
                <div class="border-b-2 py-4">
                    <div class="uppercase tracking-wide text-xs font-bold text-gray-500 mb-1 leading-tight"
                         x-text="`Step: ${step} of 5`"></div>
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                        <div class="flex-1">
                            <div x-show="step === 1">
                                <div class="text-lg font-bold text-gray-700 leading-tight">Order Details</div>
                            </div>

                            <div x-show="step === 2">
                                <div class="text-lg font-bold text-gray-700 leading-tight">Instructions</div>
                            </div>

                            <div x-show="step === 3">
                                <div class="text-lg font-bold text-gray-700 leading-tight">Upload Files</div>
                            </div>
                            <div x-show="step === 4">
                                <div class="text-lg font-bold text-gray-700 leading-tight">Payment</div>
                            </div>
                        </div>

                        <div class="flex items-center md:w-64">
                            <div class="w-full bg-white rounded-full mr-2">
                                <div
                                    class="rounded-full bg-green-500 text-xs leading-none h-2 text-center text-white"
                                    :style="'width: '+ parseInt(step / 4 * 100) +'%'"></div>
                            </div>
                            <div class="text-xs w-10 text-gray-600" x-text="parseInt(step / 4 * 100) +'%'"></div>
                        </div>
                    </div>
                </div>
                <!-- /Top Navigation -->

                <!-- Step Content -->
                <div class="py-10">
                    <form wire:submit.prevent="Order">
                        <div x-show.transition.in="step === 1">
                            <div class="mb-5">
                                <label for="type" class="font-bold mb-1 text-gray-700 block">Type</label>
                                <select id="type" name="type" required wire:model="type"
                                        class="w-full px-4 bg-white py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium">
                                    <option value="">--select--</option>
                                    <?php
                                    $types = \Illuminate\Support\Facades\DB::table('settings_disciplines')
                                        ->orderBy('disciplines')
                                        ->get();
                                    ?>
                                    @foreach($types as $type)
                                        <option value="{{ $type->disciplines }}">{{ $type->disciplines }}</option>
                                    @endforeach
                                </select>
                                @error('type') <span class="error text-red-400">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-5">
                                <label for="service" class="font-bold mb-1 text-gray-700 block">Service</label>
                                <select id="service" name="service" wire:model="service"
                                        class="w-full px-4 py-3 bg-white rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                        required>
                                    <option value="">--select--</option>
                                    <?php
                                    $services = \Illuminate\Support\Facades\DB::table('settings_services')
                                        ->orderBy('name')
                                        ->get();
                                    ?>
                                    @foreach($services as $service)
                                        <option value="{{ $service->name }}">{{ $service->name }}</option>
                                    @endforeach
                                </select>
                                @error('service') <span class="error text-red-400">{{ $message }}</span> @enderror

                            </div>

                            <div class="mb-5">
                                <label for="deadline-date" class="font-bold mb-1 text-gray-700 block">Deadline
                                    Date</label>
                                <input type="date" wire:model="deadlineDate" id="deadline-date"
                                       class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                       placeholder="Deadline Date">
                                @error('deadlineDate') <span
                                    class="error text-red-400">{{ $message }}</span> @enderror

                            </div>

                            <div class="mb-5">
                                <label for="deadline-time" class="font-bold mb-1 text-gray-700 block">Deadline
                                    Time</label>
                                <input type="time" wire:model="time" id="deadline-time"
                                       class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                       placeholder="Deadline Time">
                                @error('time') <span
                                    class="error text-red-400">{{ $message }}</span> @enderror

                            </div>

                            <div class="mb-5">
                                <label for="pages" class="font-bold mb-1 text-gray-700 block">Pages</label>
                                <input type="number" name="pages" id="pages" wire:model="pages"
                                       class="w-full px-4 py-3 rounded-lg bg-white shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                       required placeholder="No of pages">
                                @error('pages') <span class="error text-red-400">{{ $message }}</span> @enderror

                            </div>

                            <div class="mb-5">
                                <label for="level" class="font-bold mb-1 text-gray-700 block">Level</label>
                                <select name="level" id="level" aria-label="level" wire:model="level"
                                        class="w-full px-4 py-3 rounded-lg bg-white shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                        required>
                                    <option value="" class="text-gray-600">--select--</option>
                                    <?php
                                    $levels = \Illuminate\Support\Facades\DB::table('settings_degrees')
                                        ->orderBy('name')
                                        ->get();
                                    ?>
                                    @foreach($levels as $level)
                                        <option value="{{ $level->name }}"
                                                class="text-gray-600">{{ $level->name }}</option>
                                    @endforeach

                                </select>
                                @error('level') <span class="error text-red-400">{{ $message }}</span> @enderror
                            </div>
                            <!-- Bottom Navigation -->
                            <div class="flex justify-between">
                                <div class="w-1/2">
                                    <button
                                        x-show="step > 1"
                                        class="w-32 focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-gray-600 bg-white hover:bg-gray-100 font-medium border"
                                    >Previous
                                    </button>
                                </div>

                                <div class="w-1/2 text-right">
                                    <button
                                        x-show="step < 4"
                                        wire:click.prevent="firstStepValidate"
                                        class="w-32 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium"
                                    >Next
                                    </button>

                                    <button type="submit"
                                            @click="step = 'complete'"
                                            x-show="step === 4"
                                            class="w-32 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium"
                                    >Complete
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div x-show.transition.in="step === 2">
                            <div class="mb-5">
                                <label for="topic"
                                       class="font-bold mb-1 text-gray-700 block">Assignment Topic</label>
                                <div class="relative">
                                    <input id="topic" type="text" name="topic" wire:model="topic"
                                           class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                           placeholder="Assignment Topic">
                                </div>
                                @error('topic') <span
                                    class="error text-red-400">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-5">
                                <label for="sources" class="font-bold mb-1 text-gray-700 block">No. of Sources</label>
                                <div class="relative">
                                    <input type="number" id="sources" name="sources" wire:model="sources"
                                           class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 bg-white font-medium"
                                           placeholder="No of sources">
                                </div>
                                @error('sources') <span class="error text-red-400">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-5">
                                <label for="subject" class="font-bold mb-1 text-gray-700 block">Subject</label>
                                <div class="relative">
                                    <select id="subject" name="subject"
                                            wire:model="subject"
                                            class="w-full bg-white px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                    >
                                        <option value="">--select subject--</option>
                                        <?php
                                        $subjects = \Illuminate\Support\Facades\DB::table('settings_languages')
                                            ->orderBy('language')
                                            ->get();
                                        ?>
                                        @foreach($subjects as $subject)
                                            <option value="{{ $subject->language }}">{{ $subject->language }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('subject') <span
                                    class="error text-red-400">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-5">
                                <label for="style" class="font-bold mb-1 text-gray-700 block">Style</label>
                                <div class="relative">
                                    <select id="style" name="style"
                                            wire:model="style"
                                            class="w-full px-4 bg-white py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                    >
                                        <option value="">--select style--</option>
                                        <?php
                                        $styles = \Illuminate\Support\Facades\DB::table('settings_citations')
                                            ->orderBy('style')
                                            ->get();
                                        ?>
                                        @foreach($styles as $name)
                                            <option value="{{ $name->style }}">{{ $name->style }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('style') <span
                                    class="error text-red-400">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-5">
                                <label for="language" class="font-bold mb-1 text-gray-700 block">Language</label>
                                <div class="relative">
                                    <select id="language" name="language"
                                            wire:model="language"
                                            class="w-full px-4 bg-white py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                    >
                                        <option value="">--select language--</option>
                                        <option value="US">English (US)</option>
                                        <option value="UK">English (UK)</option>
                                    </select>
                                </div>
                                @error('language') <span
                                    class="error text-red-400">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-5">
                                <label for="instructions"
                                       class="font-bold mb-1 text-gray-700 block">Instructions</label>
                                <div class="relative">
                                <textarea id="instructions" name="instructions" wire:model="instructions"
                                          class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                ></textarea>
                                </div>
                                <div class="text-gray-500 text-xs mt-1">Write all instructions that should be followed
                                    here.

                                </div>
                                @error('instructions') <span class="error text-red-400">{{ $message }}</span> @enderror
                            </div>
                            <!-- Bottom Navigation -->
                            <div class="flex justify-between">
                                <div class="w-1/2">
                                    <button
                                        x-show="step > 1"
                                        wire:click.prevent="back(2)"
                                        class="w-32 focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-gray-600 bg-white hover:bg-gray-100 font-medium border"
                                    >Previous
                                    </button>
                                </div>

                                <div class="w-1/2 text-right">
                                    <button
                                        x-show="step < 4"
                                        wire:click.prevent="secondStepValidate"
                                        class="w-32 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium"
                                    >Next
                                    </button>

                                    <button type="submit" wire.click
                                            @click="step = 'complete'"
                                            x-show="step === 4"
                                            class="w-32 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium"
                                    >Complete
                                    </button>
                                </div>
                            </div>

                        </div>
                        <div x-show.transition.in="step === 3">
                            <div class="mb-5">
                                <label for="files" class="font-bold mb-1 block">Upload files</label>
                                <div class="mt-2 mb-4">
                                    Upload all necessary files below
                                </div>
                                @if (session()->has('message'))
                                    <div
                                        class="flex items-center bg-green-500 text-white text-sm font-bold px-4 py-3 mb-6 rounded"
                                        role="alert">
                                        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 20 20">
                                            <path
                                                d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/>
                                        </svg>
                                        <p>{{ session('message') }}</p>
                                    </div>
                                @endif
                                <div
                                    x-data="{ isUploading: false, progress: 0 }"
                                    x-on:livewire-upload-start="isUploading = true"
                                    x-on:livewire-upload-finish="isUploading = false"
                                    x-on:livewire-upload-error="isUploading = false"
                                    x-on:livewire-upload-progress="progress = $event.detail.progress"
                                >
                                    <!-- File Input -->
                                    <input type="file" wire:model="files.*" multiple
                                           class="border bg-white text-black rounded">

                                    <!-- Progress Bar -->
                                    <div x-show="isUploading">
                                        <progress max="100" x-bind:value="progress"
                                                  class="mt-4 border rounded bg-white"></progress>
                                    </div>
                                </div>
                                {{--                                @foreach($files as $file)--}}
                                {{--                                    @if ($file)--}}
                                {{--                                        Photo Preview:--}}
                                {{--                                        <img src="{{ $file->temporaryUrl() }}">--}}
                                {{--                                    @endif--}}
                                {{--                                @endforeach--}}

                                <div class="relative">
                                    @error('files.*') <span
                                        class="error text-red-400">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <!-- Bottom Navigation -->
                            <div class="flex justify-between">
                                <div class="w-1/2">
                                    <button
                                        x-show="step > 1"
                                        wire:click.prevent="back(3)"
                                        class="w-32 focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-gray-600 bg-white hover:bg-gray-100 font-medium border"
                                    >Previous
                                    </button>
                                </div>

                                <div class="w-1/2 text-right">
                                    <button
                                        x-show="step < 4"
                                        wire:click.prevent="thirdStepValidate"
                                        class="w-32 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium"
                                    >Next
                                    </button>

                                    <button type="submit"
                                            @click="step = 'complete'"
                                            x-show="step === 4"
                                            class="w-32 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium"
                                    >Complete
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div x-show.transition.in="step === 4">
                            <div class="mb-5">

                                <label for="paypal" class="font-bold mb-1 text-gray-700 block">Paypal
                                    Payment</label>
                            </div>
                            <!-- Bottom Navigation -->
                            <div class="flex justify-between">
                                <div class="w-1/2">
                                    <button
                                        x-show="step > 1"
                                        wire:click.prevent="back(4)"
                                        class="w-32 focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-gray-600 bg-white hover:bg-gray-100 font-medium border"
                                    >Previous
                                    </button>
                                </div>

                                <div class="w-1/2 text-right">
                                    <button
                                        x-show="step < 4"
                                        wire:click.prevent="fourthStepValidate"
                                        class="w-32 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium"
                                    >Next
                                    </button>

                                    <button type="submit" wire.click
                                            @click="step = 'complete'"
                                            x-show="step === 4"
                                            class="w-32 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium"
                                    >Complete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- / Step Content -->
            </div>
        </div>
    </div>
    <script>
        function app() {
            return {
                step: 1,
            }
        }
    </script>
    <script>

    </script>
</div>

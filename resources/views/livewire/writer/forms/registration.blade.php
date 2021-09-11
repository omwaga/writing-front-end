<div class="h-screen pt-8">
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
    </style>

    <div x-data="{ step: @entangle('step') }" x-cloak class="bg-gray-100">
        <div class="max-w-3xl mx-auto px-4 py-10">


            <div x-show.transition="step === 4">
                <div class="bg-white rounded-lg p-10 flex items-center shadow justify-between">
                    <div>
                        <svg class="mb-4 h-20 w-20 text-green-500 mx-auto" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                  clip-rule="evenodd"/>
                        </svg>

                        <h2 class="text-2xl mb-4 text-gray-800 text-center font-bold">Registration Success</h2>

                        <div class="text-gray-600 mb-8">
                            Thank you. We have sent you an email to {{ $email }}. Please click the link in the message
                            to activate your account.
                        </div>

                        <a href="{{ route('available-orders') }}"
                           class="w-40 block mx-auto focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-gray-600 bg-white hover:bg-gray-100 font-medium border"
                        >Back to home
                        </a>
                    </div>
                </div>
            </div>

            <div x-show.transition="step != 'complete'">
                <!-- Top Navigation -->
                <div class="border-b-2 py-4">
                    <div class="uppercase tracking-wide text-xs font-bold text-gray-500 mb-1 leading-tight"
                         x-text="`Step: ${step} of 3`"></div>
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                        <div class="flex-1">
                            <div x-show="step === 1">
                                <div class="text-lg font-bold text-gray-700 leading-tight">Your Profile</div>
                            </div>

                            <div x-show="step === 2">
                                <div class="text-lg font-bold text-gray-700 leading-tight">Your Education</div>
                            </div>

                            <div x-show="step === 3">
                                <div class="text-lg font-bold text-gray-700 leading-tight">Your Password</div>
                            </div>
                        </div>

                        <div class="flex items-center md:w-64">
                            <div class="w-full bg-white rounded-full mr-2">
                                <div class="rounded-full bg-green-500 text-xs leading-none h-2 text-center text-white"
                                     :style="'width: '+ parseInt(step / 3 * 100) +'%'"></div>
                            </div>
                            <div class="text-xs w-10 text-gray-600" x-text="parseInt(step / 3 * 100) +'%'"></div>
                        </div>
                    </div>
                </div>
                <!-- /Top Navigation -->

                <!-- Step Content -->
                <div class="py-10">
                    <form wire:submit.prevent="Register">
                        <div x-show.transition.in="step === 1">
                            <div class="mb-5 text-center">
                                <div
                                    class="mx-auto w-32 h-32 mb-2 border rounded-full relative bg-gray-100 mb-4 shadow-inset">
                                    @if ($profilePhoto)
                                        <img id="image" src="{{ $profilePhoto->temporaryUrl() }}"
                                             class="object-cover w-full h-32 rounded-full">
                                    @endif
                                </div>

                                <label
                                    for="fileInput"
                                    type="button"
                                    class="cursor-pointer inine-flex justify-between items-center focus:outline-none border py-2 px-4 rounded-lg shadow-sm text-left text-gray-600 bg-white hover:bg-gray-100 font-medium"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="inline-flex flex-shrink-0 w-6 h-6 -mt-1 mr-1" viewBox="0 0 24 24"
                                         stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                         stroke-linejoin="round">
                                        <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                                        <path
                                            d="M5 7h1a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2"/>
                                        <circle cx="12" cy="13" r="3"/>
                                    </svg>
                                    Browse Photo
                                </label>

                                <div class="mx-auto w-48 text-gray-500 text-xs text-center mt-1">Click to add profile
                                    picture
                                </div>

                                <div
                                    x-data="{ isUploading: false, progress: 0 }"
                                    x-on:livewire-upload-start="isUploading = true"
                                    x-on:livewire-upload-finish="isUploading = false"
                                    x-on:livewire-upload-error="isUploading = false"
                                    x-on:livewire-upload-progress="progress = $event.detail.progress"
                                >
                                    <input name="photo" id="fileInput" accept="image/*" class="hidden" type="file"
                                           wire:model="profilePhoto">

                                    <!-- Progress Bar -->
                                    <div x-show="isUploading">
                                        <progress max="100" x-bind:value="progress" class="bg-white"></progress>
                                    </div>
                                </div>
                                @error('profilePhoto') <span
                                    class="error text-red-400"> {{ $message }} </span> @enderror
                            </div>

                            <div class="mb-5">
                                <label for="name" class="font-bold mb-1 text-gray-700 block">Nickname</label>
                                <input type="text" wire:model="name" id="name"
                                       class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                       placeholder="Enter your name..." autofocus required>
                                @error('name') <span class="error text-red-400">{{ $message }}</span> @enderror

                            </div>

                            <div class="mb-5">
                                <label for="firstname" class="font-bold mb-1 text-gray-700 block">First name</label>
                                <input type="text" wire:model="firstName" id="firstname"
                                       class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                       placeholder="Enter your first name..." required>
                                @error('firstName') <span class="error text-red-400">{{ $message }}</span> @enderror

                            </div>

                            <div class="mb-5">
                                <label for="secondname" class="font-bold mb-1 text-gray-700 block">Second name</label>
                                <input type="text" wire:model="secondName" id="secondname"
                                       class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                       placeholder="Enter your second name..." required`>
                                @error('secondName') <span class="error text-red-400">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-5">
                                <label for="gender" class="font-bold mb-1 text-gray-700 block">Gender</label>

                                <div class="flex">
                                    <label
                                        class="flex justify-start items-center text-truncate rounded-lg bg-white pl-4 pr-6 py-3 shadow-sm mr-4">
                                        <div class="text-teal-600 mr-3">
                                            <input type="radio" wire:model="gender" value="Male"
                                                   class="form-radio focus:outline-none focus:shadow-outline"/>
                                        </div>
                                        <div class="select-none text-gray-700">Male</div>
                                    </label>

                                    <label
                                        class="flex justify-start items-center text-truncate rounded-lg bg-white pl-4 pr-6 py-3 shadow-sm">
                                        <div class="text-teal-600 mr-3">
                                            <input type="radio" wire:model="gender" value="Female"
                                                   class="form-radio focus:outline-none focus:shadow-outline"/>
                                        </div>
                                        <div class="select-none text-gray-700">Female</div>
                                    </label>
                                    <br>
                                    <br>
                                    @error('gender') <span class="error text-red-400">{{ $message }}</span> @enderror

                                </div>
                            </div>


                            <div class="mb-5">
                                <label for="country" class="font-bold mb-1 text-gray-700 block">Country</label>
                                <select name="country" id="country" aria-label="country" wire:model="country"
                                        class="w-full px-4 py-3 rounded-lg bg-white shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                        required>
                                    <option value="">--select--</option>
                                    @foreach($countries as $country)
                                        <option value="{{ $country }}"> {{ $country }}</option>
                                    @endforeach
                                </select>
                                @error('country') <span class="error text-red-400">{{ $message }}</span> @enderror

                            </div>

                            <div class="mb-5">
                                <label for="city" class="font-bold mb-1 text-gray-700 block">City</label>
                                <input name="city" id="city" aria-label="city" wire:model="city"
                                       class="w-full px-4 py-3 rounded-lg bg-white shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                       required>
                                @error('city') <span class="error text-red-400">{{ $message }}</span> @enderror

                            </div>

                            <div class="mb-5">
                                <label for="email" class="font-bold mb-1 text-gray-700 block">Email</label>
                                <input type="email" wire:model="email" id="email"
                                       class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                       placeholder="Enter your email address...">
                                @error('email') <span class="error text-red-400">{{ $message }}</span> @enderror

                            </div>

                            <label for="government-id" class="font-bold mb-1 text-gray-700 block">Government Issued
                                ID</label>
                            <!-- Progress Bar -->

                            <div
                                x-data="{ isUploading: false, progress: 0 }"
                                x-on:livewire-upload-start="isUploading = true"
                                x-on:livewire-upload-finish="isUploading = false"
                                x-on:livewire-upload-error="isUploading = false"
                                x-on:livewire-upload-progress="progress = $event.detail.progress"
                            >
                                <input name="photo" type="file" wire:model="governmentId">
                                <div x-show="isUploading">
                                    <progress max="100" x-bind:value="progress"></progress>
                                </div>
                            </div>
                            <div class="text-gray-500 text-xs mb-4">Only jpeg, jpg, png and pdf allowed
                            </div>
                            @error('governmentId') <span class="error text-red-400">{{ $message }}</span> @enderror
                            <div class="max-w-3xl mx-auto px-4">
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
                                            data-sitekey="{{config('app.site_key')}}"
                                            class="w-32 focus:outline-none border g-recaptcha border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium"
                                        >Next
                                        </button>



                                    </div>
                                </div>
                            </div>
                        </div>
                        <div x-show.transition.in="step === 2">

                            <div class="mb-5">
                                <label for="university" class="font-bold mb-1 text-gray-700 block">University</label>
                                <div class="relative">
                                    <input id="university" type="text" name="university" wire:model="university"
                                           class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                           placeholder="Name of university" required>
                                </div>
                                @error('university') <span class="error text-red-400">{{ $message }}</span> @enderror

                            </div>

                            <div class="mb-5">
                                <label for="degree" class="font-bold mb-1 text-gray-700 block">Degree</label>
                                <div class="relative">
                                    <select id="degree" name="degree" wire:model="degree"
                                            class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 bg-white font-medium"
                                    >
                                        <option value="">--select--</option>
                                        <option value="associate">Associate</option>
                                        <option value="bachelor">Bachelor</option>
                                        <option value="Masters">Masters</option>
                                        <option value="Ph.D">Ph.D</option>
                                    </select>
                                </div>
                                @error('degree') <span class="error text-red-400">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-5">
                                <label for="graduation-date" class="font-bold mb-1 text-gray-700 block">Graduation
                                    Date</label>
                                <div class="relative">
                                    <input id="graduation-date" type="date" name="graduation-year"
                                           wire:model="graduationDate"
                                           class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                           placeholder="Graduation year">
                                </div>
                                @error('graduationDate') <span
                                    class="error text-red-400">{{ $message }}</span> @enderror
                            </div>

                            <label for="certificate" class="font-bold mb-1 text-gray-700 block">Certificate</label>
                            <input type="file" name="certificate" wire:model="certificate"
                                   class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium">
                            <div class="text-gray-500 text-xs mt-1 mb-4">Only jpeg, jpg, png and pdf allowed
                            </div>
                            @error('certificate') <span class="error text-red-400">{{ $message }}</span> @enderror


                            <div class="mb-5">
                                <label for="about" class="font-bold mb-1 text-gray-700 block">About me</label>
                                <div class="relative">
                                <textarea id="about" name="about" wire:model="about"
                                          class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                ></textarea>
                                </div>
                                <div class="text-gray-500 text-xs mt-1">Write a description of your skills and
                                    experience as
                                    a writer.

                                </div>
                                @error('about') <span class="error text-red-400">{{ $message }}</span> @enderror
                            </div>
                            <div class="max-w-3xl mx-auto px-4">
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



                                    </div>
                                </div>
                            </div>
                        </div>
                        <div x-show.transition.in="step === 3">
                            <div class="mb-5">
                                <label for="password" class="font-bold mb-1 text-gray-700 block">Set up password</label>
                                <div class="text-gray-600 mt-2 mb-4">
                                    Please create a secure password including the following criteria below.

                                    <ul class="list-disc text-sm ml-4 mt-2">
                                        <li>lowercase letters</li>
                                        <li>numbers</li>
                                        <li>capital letters</li>
                                        <li>special characters</li>
                                    </ul>
                                </div>

                                <div class="relative">
                                    <div class="mb-4">
                                        <input wire:model="password" type="password"
                                               class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                               placeholder="Your strong password...">
                                        <br>
                                        @error('password') <span
                                            class="error text-red-400">{{ $message }}</span> @enderror
                                    </div>

                                    <input wire:model="confirmPassword" type="password"
                                           class="w-full px-4 mb-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                           placeholder="Confirm your strong password...">
                                    @error('confirmPassword') <span
                                        class="error text-red-400">{{ $message }}</span> @enderror

                                    <br>
                                </div>
                                <div class="max-w-3xl mx-auto px-4">
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
                                                x-show="step < 3"
                                                wire:click.prevent="thirdStepValidate"
                                                class="w-32 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium"
                                            >Next
                                            </button>

                                            <button
                                                id="register-writer"
                                                type="submit"
                                                wire:click="Register"
                                                class="w-32 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium"
                                            >
                                                Register
                                            </button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- / Step Content -->
            </div>
        </div>
    </div>
</div>

<script>
    function onSubmit(token) {
        console.log(token);
        document.getElementById("register-writer").click();
    }

    function submitCaptcha(token) {
        console.log(token);
        document.getElementById("captcha-form").submit();
    }
</script>

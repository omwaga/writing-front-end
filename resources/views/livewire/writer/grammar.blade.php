<div class="mt-24">
    <h1 class="text-2xl border-b w-1/2 border-black mb-4">Grammar Test</h1>
    <form wire:submit.prevent="save">
        <div class="mb-5">
            <label for="password" class="font-bold mb-1 text-gray-700 block">Answer the questions
                below</label>
            <div class="text-gray-600 mt-2 mb-4">
                Answer the questions below to test your grammar proficiency.
                <ul class="list-disc text-sm ml-4 mt-2">
                    <li>This test is timed</li>
                    <li>You will automatically fail this test if timer EXPIRES.
                        <span
                            class="font-bold">
                                                    <div wire:model="time"
                                                         class="countdown text-2xl text-green-500 mb-4 mt-4">
                                                        @livewire('timer')
                                                    </div>
                                                </span>
                    </li>
                </ul>
            </div>
            <?php
            use Illuminate\Support\Facades\DB;$questions = DB::table('grammar_tests')
                ->limit(1)
                ->get();
            ?>
            @foreach($questions as $index=>$question)
                <label for="{{ $question->id  }}"
                       class="font-bold mb-1 text-gray-700 block mt-4">{{ $index + 1 }}
                    . {{ $question->question }}</label>

                <div class="flex flex-col">
                    <label
                        class="flex justify-start items-center text-truncate pl-4 pr-6 py-3 mr-4">
                        <div class="text-teal-600 mr-3">
                            <input type="radio" name="choice.{{ $question->question }}"
                                   value="{{ $question->choice_one }}" wire:model="choice.{{ $question->question }}"
                                   class="form-radio focus:outline-none focus:shadow-outline"/>
                        </div>
                        <div class="select-none text-gray-700">{{ $question->choice_one }}</div>
                    </label>

                    <label
                        class="flex justify-start items-center text-truncate pl-4 pr-6 py-3">
                        <div class="text-teal-600 mr-3">
                            <input type="radio" name="choice.{{ $question->question }}"
                                   value="{{ $question->choice_two }}" wire:model="choice.{{ $question->question }}"
                                   class="form-radio focus:outline-none focus:shadow-outline"/>
                        </div>
                        <div class="select-none text-gray-700">{{ $question->choice_two }}</div>
                    </label>
                    <label
                        class="flex justify-start items-center text-truncate pl-4 pr-6 py-3">
                        <div class="text-teal-600 mr-3">
                            <input type="radio" name="choice.{{ $question->question }}"
                                   value="{{ $question->choice_three }}" wire:model="choice.{{ $question->question }}"
                                   class="form-radio focus:outline-none focus:shadow-outline"/>
                        </div>
                        <div class="select-none text-gray-700">{{ $question->choice_three }}</div>
                    </label>
                    <label
                        class="flex justify-start items-center text-truncate pl-4 pr-6 py-3">
                        <div class="text-teal-600 mr-3">
                            <input type="radio" value="{{ $question->choice_four }}"
                                   name="choice.{{ $question->question }}" wire:model="choice.{{ $question->question }}"
                                   class="form-radio focus:outline-none focus:shadow-outline"/>
                        </div>
                        <div class="select-none text-gray-700">{{ $question->choice_four }}</div>
                    </label>
                </div>

                @error("choice.$question->question") <span
                    class="small text-red-400 font-bold">{{ $message }}</span> @enderror
            @endforeach

            <div class="flex justify-center mt-4 mb-10">
                <button type="submit"
                        class="focus:outline-none font-bold bg-blue-400 hover:bg-blue-600 rounded-2xl shadow-lg hover:shadow-2xl transition duration-200 text-white w-full p-2">
                    Submit
                </button>
            </div>
        </div>
    </form>
</div>

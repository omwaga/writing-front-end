<x-app-layout>
    <div class="h-full bg-gray-100 flex justify-center pt-32 ml-1/7 flex justify-center">
        <div class="form w-2/3">
            <h1 class="text-2xl border-b border-black mb-4 w-1/5">Grammar Test</h1>
            <ul class="list-disc ml-8">
                <li class="mt-4 text-lg text-gray-700">This test is timed.</li>
                <li class="text-lg text-gray-700">You will automatically fail the test if your time Expires!</li>
            </ul>
            <div class="mt-4 mb-4">@livewire('timer')</div>
            <style>
                label {
                    font-size: 1.3em !important;
                }

                .tf-radio-label {
                    font-size: 1em !important;
                    color: #414141 !important;
                }
            </style>
            <div class="mb-8">
                <livewire:forms.grammar-questions-form/>
            </div>
        </div>
    </div>
</x-app-layout>

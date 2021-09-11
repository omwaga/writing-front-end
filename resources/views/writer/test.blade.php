<x-app-layout>
    <div class="h-full bg-gray-100 flex justify-center pt-32">
        <div class="form bg-white rounded-lg shadow-lg p-2 w-1/3">
            <h1 class="text-2xl text-green-400 mt-4 text-center uppercase font-bold">Grammar Proficiency</h1>
            <p class="text-center font-bold">To complete your account creation, click the button below to take the
                grammar test.</p>
            <p class="text-center text-green-400 mb-4 mt-2">Note: The test is timed.</p>

            <div class="flex justify-center">
                <a href="{{ route('grammar-questions') }}"
                   class="bg-green-400 hover:bg-green-600 p-2 transition duration-200 px-6 text-white rounded-2xl shadow-lg hover:shadow-xl font-bold">Grammar
                    test</a>

            </div>
        </div>
    </div>
</x-app-layout>

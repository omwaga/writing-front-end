<x-app-layout>
    <div class="h-full bg-gray-100 flex justify-center pt-32">
        <div class="form bg-white rounded-lg shadow-lg p-2 h-32 w-1/3">
            <h1 class="text-2xl text-red-400 mt-4 text-center uppercase font-bold">You failed the grammar test</h1>
            <?php
            $email = Illuminate\Support\Facades\Auth::guard('writers')->user()->email;
            $score = Illuminate\Support\Facades\DB::table('grammar_test_scores')
                ->where('email', $email)
                ->value('score');
            ?>
            <p class="text-center font-bold mb-2 mt-2">Your score was {{ $score }}/20</p>
        </div>
    </div>
</x-app-layout>

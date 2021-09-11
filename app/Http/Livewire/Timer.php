<?php

namespace App\Http\Livewire;

use App\Models\GrammarTest;
use App\Models\Writer;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Timer extends Component
{
    public $leftMinutes, $leftSeconds, $expired, $time;

    public function timer()
    {
        $end = session()->get('end');
        if ($end != null) {
            if ($end->isPast()) {
                session()->forget('end');
                $this->time = "Expired";
                $email = Auth::guard('writers')->user()->email;

                $passed = DB::table('grammar_test_scores')
                    ->where('email', $email)
                    ->count();

                if ($passed == 0) {
                    $score = new GrammarTest();
                    $score->email = $email;
                    $score->score = 0;
                    $score->save();

                    $writerID = DB::table('writers')
                        ->where('email', $email)
                        ->value('id');

                    $writer = Writer::find($writerID);
                    $writer->failed_test = 1;
                    $writer->update();
                }
            } else {
                $this->leftSeconds = $end->diffInSeconds(Carbon::now());
                $this->time = gmdate('i:s', $this->leftSeconds);
            }
        } else {
            $end = Carbon::now()->addMinutes(20);
            session(['end' => $end]);
        }
    }

    public function render()
    {
        return view('livewire.timer');
    }
}

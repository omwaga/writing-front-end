<?php

namespace App\Http\Livewire\Forms;

use App\Models\GrammarTest;
use App\Models\GrammarTestScore;
use App\Models\Writer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Tanthammar\TallForms\Radio;
use Tanthammar\TallForms\TallForm;

class GrammarQuestionsForm extends Component
{
    use TallForm;

    public function mount(?GrammarTest $grammartest)
    {
        //Gate::authorize()
        $this->fill([
            'formTitle' => '',
            'wrapWithView' => false, //see https://github.com/tanthammar/tall-forms/wiki/Wrapper-Layout
            'showGoBack' => false,
            'inline' => false
        ]);
        $this->mount_form($grammartest); // $grammartest from hereon, called $this->model
    }


    // Mandatory method
    public function onCreateModel($validated_data)
    {
        // Set the $model property in order to conditionally display fields when the model instance exists, on saveAndStayResponse()
//        $this->model = GrammarTest::create($validated_data);
    }

    // OPTIONAL method used for the "Save and stay" button, this method already exists in the TallForm trait
    public function onUpdateModel($validated_data)
    {
        $this->model->update($validated_data);
    }

    public function fields()
    {
        $fields = array();
        $questions = DB::table('grammar_tests')
            ->limit(20)
            ->get()
            ->pluck('question');
        foreach ($questions as $index => $question) {
            $choice_one = DB::table('grammar_tests')
                ->where('question', $question)
                ->value('choice_one');
            $choice_two = DB::table('grammar_tests')
                ->where('question', $question)
                ->value('choice_two');
            $choice_three = DB::table('grammar_tests')
                ->where('question', $question)
                ->value('choice_three');
            $choice_four = DB::table('grammar_tests')
                ->where('question', $question)
                ->value('choice_four');

            $options = [$choice_one, $choice_two, $choice_three, $choice_four];

            $fields[] = Radio::make($index + 1 . '. ' . $question, $index)
                ->options($options)->rules('required');
        }

        return $fields;
    }

    public function saveAndStayResponse()
    {
        $score = 0;
        $answers = $this->form_data;
        foreach ($answers as $ans) {
            $count = DB::table('grammar_tests')->where('answer', $ans)
                ->count();

            if ($count == 1) {
                $score++;
            }
        }

        $email = Auth::guard('writers')->user()->email;

        $rows = DB::table('grammar_test_scores')
            ->where('email', $email)
            ->count();

        if ($rows == 0) {
            $TestScore = new GrammarTestScore();
            $TestScore->email = $email;
            $TestScore->score = $score;
            $TestScore->save();

            if ($score == 20) {
                $id = DB::table('writers')
                    ->where('email', $email)
                    ->value('id');

                $writer = Writer::find($id);
                $writer->failed_test = 0;

                $writer->update();

                return redirect(route('writer-review'));
            } else {
                $id = DB::table('writers')
                    ->where('email', $email)
                    ->value('id');

                $writer = Writer::find($id);
                $writer->failed_test = 1;

                $writer->update();

                return redirect(route('writer-failed'));
            }
        }
    }
}

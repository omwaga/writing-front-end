<?php

namespace App\Http\Livewire;

use App\Models\WriterRating as ModelsWriterRating;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WriterRating extends Component
{

    public $rating;
    public $comment;
    public $currentId;
    public $writer;
    public $hideForm;

    protected $rules = [
        'rating' => ['required', 'in:1,2,3,4,5'],
        'comment' => 'required',

    ];

    public function render()
    {
        $comments = ModelsWriterRating::where('writer_id', $this->writer->id)->where('status', 1)->with('user')->get();
        return view('livewire.writer-rating', compact('comments'));
    }

    public function mount()
    {
        if(auth()->user()){
            $rating = ModelsWriterRating::where('user_id', Auth::user()->id)->where('writer_id', $this->writer->id)->first();
            if (!empty($rating)) {
                $this->rating  = $rating->rating;
                $this->comment = $rating->comment;
                $this->currentId = $rating->id;
            }
        }
        return view('livewire.writer-rating');
    }

    public function delete($id)
    {
        $rating = ModelsWriterRating::where('id', $id)->first();
        if ($rating && ($rating->user_id == auth()->user()->id)) {
            $rating->delete();
        }
        if ($this->currentId) {
            $this->currentId = '';
            $this->rating  = '';
            $this->comment = '';
        }
    }

    public function rate()
    {
        $rating = ModelsWriterRating::where('user_id', auth()->user()->id)->where('writer_id', $this->writer->id)->first();
        $this->validate();
        if (!empty($rating)) {
            $rating->user_id = auth()->user()->id;
            $rating->writer_id = $this->writer->id;
            $rating->rating = $this->rating;
            $rating->comment = $this->comment;
            $rating->status = 1;
            try {
                $rating->update();
            } catch (\Throwable $th) {
                throw $th;
            }
            session()->flash('message', 'Success!');
        } else {
            $rating = new ModelsWriterRating;
            $rating->user_id = auth()->user()->id;
            $rating->writer_id = $this->writer->id;
            $rating->rating = $this->rating;
            $rating->comment = $this->comment;
            $rating->status = 1;
            try {
                $rating->save();
            } catch (\Throwable $th) {
                throw $th;
            }
            $this->hideForm = true;
        }
    }

}

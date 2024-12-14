<?php

namespace App\Livewire;

use App\Models\AnswerOption;
use App\Models\Poll;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class VoteToPoll extends Component
{
    public Collection $aos;
    public int $answerOption;
    public $poll;
    public bool $isVoted;
    public bool $isVotingOver;
    public $yourvote;

    public function render()
    {
        if(Auth::check()){
            $this->isVoted = AnswerOption::where('poll_id', $this->poll->id)
                ->whereExists(function ($query) {
                    $query->select(DB::raw(1))
                        ->from('user_option')
                        ->whereColumn('user_option.answer_option_id', 'answer_options.id')
                        ->where('user_option.user_id', Auth::id());
                })
                ->exists();
        }else{
            $this->isVoted = false;
            $this->yourvote = Auth::user()->answerOptions()->where("poll_id", $this->poll->id)->first()->response;
        }
        $this->isVotingOver = !($this->poll->deleted_at == null);
        return view('livewire.vote-to-poll');
    }

    public function mount(Poll $poll)
    {
        $this->poll = $poll;
        $this->aos = $poll->answerOptions()->get();
    }

    public function vote(){
        Auth::getUser()->answerOptions()->attach($this->answerOption, ["created_at" => now()]);
        $this->render();
    }
}

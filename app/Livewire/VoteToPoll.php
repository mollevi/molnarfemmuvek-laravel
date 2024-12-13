<?php

namespace App\Livewire;

use App\Models\AnswerOption;
use App\Models\Poll;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class VoteToPoll extends Component
{
    public Collection $aos;
    public bool $isVoted = false;
    public bool $isVotingOver = false;

    public function render()
    {
        return view('livewire.vote-to-poll');
    }

    public function mount(Poll $poll)
    {
        $this->aos = $poll->answerOptions()->get();
        $this->isVoted = $poll->answerOptions()->get();
        $this->isVotingOver = $poll->answerOptions()->get();
    }

    public function vote(AnswerOption $answerOption){
        Auth::getUser()->answerOptions()->attach($answerOption);
    }
}

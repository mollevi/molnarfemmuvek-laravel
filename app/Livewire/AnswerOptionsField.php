<?php

namespace App\Livewire;

use App\Models\AnswerOption;
use App\Models\Poll;
use Livewire\Component;
use function PHPUnit\Framework\isEmpty;

class AnswerOptionsField extends Component
{
    public Poll $poll;
    public $response = '';

    protected $rules = [
        'response' => 'required|min:1'
    ];

    public function mount(Poll $poll)
    {
        if(!isEmpty($poll->getDirty())){
            $poll->save();
        }
        $this->poll = $poll;
    }

    public function addAnswerOption()
    {
        $this->validate();
        $this->poll->answerOptions()->create(['response' => $this->response]);
        $this->response = ''; // Reset the input field
        $this->dispatch('answerOptionAdded');
    }
    public function removeAnswerOption($key)
    {
        if($key>0){
            AnswerOption::find($key)->delete();
            $this->dispatch('answerOptionRemoved');
        }
    }

    public function render()
    {
        return view('livewire.answer-options-field', [
            'answerOptions' => $this->poll?->answerOptions()->get()
        ]);
    }
}

<div>
    <h2>Answer options:</h2>
    <div class="container" style="backdrop-filter: blur(5px); border: #2a4c7d 2px solid; border-radius: 5px;width: fit-content">
        @foreach ($answerOptions as $option)
            <div class="row" style="padding:0; margin: 1ex 1ex 0 0">
                <div class="col" style="display: inline-block; line-height: 1.2em; padding:0; margin: 1ex 1ex 0 0">
                    <p style="border-bottom: #1a0f2a 2px solid;width: fit-content;padding-right: 8ex;padding-left: 1ex;font-size: large">{{ $option->response }}</p>
                </div>
                <div class="col" style="display: inline-flex;width: fit-content;font-size: large; justify-content: center; align-content: center">
                    <button wire:click="removeAnswerOption({{$option->id}})" type="button" class="btn btn-danger">Remove Option</button>
                </div>
            </div>
        @endforeach
            <div class="row" style="padding:0; margin: 1ex 1ex 0 0">
                <div class="col" style="display: inline-block; padding:0 0 3px 0 ; margin:0">
                    <input  placeholder="New answer option"
                            class="form-control" style="font-size: medium; padding-right: 0; margin-bottom: 5px" type="text"
                            wire:model.debounce="response" wire:keydown.enter.prevent="addAnswerOption">
                </div>
                <div class="col" style="display: inline-flex;width: fit-content;font-size: large; justify-content: center; align-content: center">
                    <button wire:click="addAnswerOption" type="button" class="btn btn-primary">Add Option</button>
                </div>
            </div>
    </div>
</div>

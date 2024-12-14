<div>
    <form wire:submit="sendMessage" action="javascript:document.querySelector('#msgbox').value = ''">
        <input id="msgbox" type="text" wire:model.live="newMessage" placeholder="{{__("New message")}}" class="max-w-64 inline-block">
        <button type="submit"
                class="py-3 px-4 inline-block max-w-16 items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
            Send
        </button>
    </form>
</div>

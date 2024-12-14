<div wire:poll.5000>
    @foreach ($messages as $message)
        <div class="message p-4 border-b">
            <p class="text-white">Sent by: {{ $message->user->name }}</p>
            <p class="text-gray-200">{{ $message->content }}</p>
            <p class="text-sm text-gray-500">Posted on {{ $message->timestamp }}</p>
        </div>
    @endforeach
    <button type="button"
        wire:click="loadMore"
        class="load-more-btn mt-4 px-4 py-2 bg-blue-500 text-white rounded">
        {{__("Load More")}}
    </button>
</div>

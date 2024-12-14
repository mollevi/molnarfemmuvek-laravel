<?php

namespace App\Livewire;

use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use App\Models\Message;
use Livewire\WithPagination;

class LazyMessages extends Component
{
    use WithPagination;

    public $orderId;
    public int $currentPage = 1;
    public $messages;

    public function mount($orderId)
    {
        $this->orderId = $orderId;
        $this->messages = Message::where('order_id', $this->orderId)->latest('created_at')
        ->paginate(1)->items();
    }

    protected $listeners = ['messageSent' => 'messageSent'];

    public function render()
    {
        return view('livewire.lazy-messages');
    }

    public function messageSent()
    {
        $latestMessage = Message::where('order_id', $this->orderId)->latest('created_at')
            ->paginate(1)->items();

        $this->messages = array_merge($latestMessage, $this->messages);
    }

    public function loadMore(): void
    {
        $this->currentPage++;
        $this->messages = array_merge($this->messages, Message::where('order_id', $this->orderId)
            ->latest('created_at')
            ->paginate(1, page:$this->currentPage)->items());
    }

}

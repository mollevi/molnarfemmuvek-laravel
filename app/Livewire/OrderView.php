<?php

namespace App\Livewire;

use App\Models\Message;
use App\Models\Order;
use Auth;
use Livewire\Component;
use function Termwind\render;

class OrderView extends Component
{
    public $orderId;
    public $newMessage;

    public function mount($orderId)
    {
        $this->orderId = $orderId;
    }

    public function render()
    {
        return view('livewire.order-view', [
            'order' => $this->orderId,
        ]);
    }

    public function sendMessage(): void
    {
        Message::create(["order_id" => $this->orderId, "user_id"=>Auth::user()->id, "content"=>$this->newMessage]);
        $this->newMessage = "";
    }
}

<?php

namespace App\Livewire;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class OrderList extends Component
{
    public $orders;

    public function render()
    {
        return view('livewire.order-list');
    }

    public function mount()
    {
        $this->orders = Order::where('user_id', Auth::id())->orderBy("updated_at", "desc")->get();
    }
}

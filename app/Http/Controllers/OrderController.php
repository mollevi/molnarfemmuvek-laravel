<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        return view('page.order-list');
    }
    /**
     * Display a listing of the resource.
     */
    public function view(Order $order)
    {
        if(auth()->user()->id !== $order->user_id) {
            abort(403);
        }
        return view('page.order-view', ['order' => $order]);
    }
}

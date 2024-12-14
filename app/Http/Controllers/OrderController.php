<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        return view('page.list-orders');
    }
    /**
     * Display a listing of the resource.
     */
    public function view(Order $order)
    {
        return view('page.view-order', ['order' => $order]);
    }
}

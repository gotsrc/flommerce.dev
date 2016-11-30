<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('orders.index');
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);

        return view('orders.show', compact('order'));
    }

    public function create()
    {
        $this->middleware('auth');
        return view('orders.create');
    }

    public function store(OrderRequest $request)
    {
        Order::create($request->all());

        return redirect('orders');
    }

    public function update($id, OrderRequest $request)
    {
        $order = Order::findOrFail($id);

        $order->update($request->all());
    }
}

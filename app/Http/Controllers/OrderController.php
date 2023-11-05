<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::orderBy('order_date', 'desc')->paginate(20);

        return view('orders.index', [
            'orders' => $orders 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->title)

        // validation rules

        $rules = [
            'order_date' => 'required|date',
            'customer_id' => 'required|integer'
        ];

        $messages = [
          'order_date' => 'The order date is required',
          'customer_id' => 'The customer id is required',
        ];

        $request->validate($rules, $messages);

        $order = new Order;
        $order->order_date = $request->order_date;
        $order->customer_id = $request->customer_id;
        $order->save();

        return redirect()->route('orders.index')->with('status', 'Created a new order');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $order = Order::findOrFail($id);
        return view('orders.show', [
            'order' => $order
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order = Order::findOrFail($id);
        return view('orders.edit', [
            'order' => $order
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        {
        $rules = [
          'order_date' => "required|date_format:Y-m-d",
          'customer_id' => "required|integer"
        ];

        $messages = [
          'order_date' => 'The order date is required',
          'customer_id' => 'The customer id is required',
        ];

        $request->validate($rules, $messages);

        $order = Order::findOrFail($id);
        $order->order_date = $request->order_date;
        $order->customer_id = $request->customer_id;
        $order->save();

        return redirect()->route('orders.index')->with('status', 'Updated order');

    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('orders.index')->with('status', 'Order deleted successfully');
    }
}
<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{

  // Users will be redirected to register page if they try to access any page associated with this controller while not logged in
  public function __construct() {
    $this->middleware('auth', ['except' => []]);
  }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::paginate(10);
        return view('user.orders.index')->with('orders', $orders);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        // Find a order by their ID, and then display the 'orders.show' view
        $order = Orders::findOrFail($id);
        return view('user.orders.show')->with('order', $order);
    }
}
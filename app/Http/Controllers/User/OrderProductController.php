<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderProduct;

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
        $order_products = Order_product::paginate(10);
        return view('user.order_products.index')->with('order_products', $order_products);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        // Find a order by their ID, and then display the 'orders.show' view
        $order_product = Order_product::findOrFail($id);
        return view('user.order_products.show')->with('order_product', $order_product);
    }
}
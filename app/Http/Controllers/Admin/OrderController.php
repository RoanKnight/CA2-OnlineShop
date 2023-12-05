<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderProduct;
use Auth;

class OrderController extends Controller
{
    // Users will be redirected to the register page if they try to access any page associated with this controller while not logged in
    public function __construct()
    {
        $this->middleware('auth', ['except' => []]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Gets all orders
        $orders = Order::all();

        return view('admin.orders.index', [
            'orders' => $orders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Auth::user()->authorizeRoles('admin');

        $products = Product::all();

        return view('admin.orders.create', [
            'products' => $products
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      // Validation rules
      $rules = [
          'order_date' => 'required|date',
          'customer_id' => 'required|integer',
          'products' => ['required', 'exists:products,id'],
          'discount_prices' => ['array']
      ];

      // Custom error messages for validation
      $messages = [
          'order_date' => 'The order date is required',
          'customer_id' => 'The customer id is required'
      ];

      $request->validate($rules, $messages);

      // Create a new order with the validated data
      $order = new Order;
      $order->order_date = $request->order_date;
      $order->customer_id = $request->customer_id;
      $order->save();

      // Associate products with the order and save discount prices
      $products = $request->input('products');
      $discount_prices = $request->input('discount_prices', []);

      foreach ($products as $product_id) {
          $discount_price = $discount_prices[$product_id] ?? 0.00;

          $order->products()->attach($product_id, [
              'discount_price' => $discount_price,
          ]);
      }

      return redirect()->route('admin.orders.index')->with('status', 'Created a new order');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Retrieve and display the details of a specific order
        $order = Order::findOrFail($id);
        return view('admin.orders.show', [
            'order' => $order
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Retrieve and display the edit form for a specific order
        $order = Order::findOrFail($id);
        $products = Product::all();

        return view('admin.orders.edit', [
            'order' => $order,
            'products' => $products
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Define validation rules for updating an order
        $rules = [
            'order_date' => 'required|date',
            'customer_id' => 'required|integer'
        ];

        // Custom error messages for validation
        $messages = [
            'order_date' => 'The order date is required',
            'customer_id' => 'The customer id is required'
        ];

        $request->validate($rules, $messages);

        // Update the order with the validated data
        $order = Order::findOrFail($id);
        $order->order_date = $request->order_date;
        $order->customer_id = $request->customer_id;
        $order->save();

        // Sync products to the order
        $order->products()->sync($request->input('products'));

        return redirect()->route('admin.orders.index')->with('status', 'Updated order');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Delete a specific order
        Order::findOrFail($id)->products()->detach();
        Order::destroy($id);

        // Redirect to the 'admin.orders.index' route with a success message
        return redirect()->route('admin.orders.index')->with('status', 'Orders deleted successfully');
    }
}

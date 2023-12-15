<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
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
        // Gets all orders and customers from the database
        $orders = Order::all();
        $customers = Customer::all();

        // Return the 'admin.orders.index' view and pass the orders and customers data to it
        return view('admin.orders.index', [
            'orders' => $orders,
            'customers' => $customers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Auth::user()->authorizeRoles('admin');

        // Get all customer IDs
        $customers = Customer::pluck('id')->sort();

        // Get all products
        $products = Product::all();

        // Put the customer IDs and products to the view
        return view('admin.orders.create', compact('customers', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation rules for the incoming request data
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

        // Validate the incoming request data using the defined rules and messages
        $request->validate($rules, $messages);

        // Create a new order with the validated data
        $order = new Order;
        $order->order_date = $request->order_date;
        $order->customer_id = $request->customer_id;
        $order->save();

        // Associate products with the order and save discount prices
        $products = $request->input('products');
        $discount_prices = $request->input('discount_prices', []);

        // Check if a specific discount price is provided for the current product, otherwise use the product's original price, or default to 0.00 if the product is not found
        foreach ($products as $product_id) {
            $product = Product::find($product_id);
            $discount_price = isset($discount_prices[$product_id])
                ? $discount_prices[$product_id]
                : ($product ? $product->price : 0.00);

            // Attach the current product with the order and save the discount price
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
        // Get all customer IDs
        $customers = Customer::pluck('id')->sort();

        return view('admin.orders.edit', [
            'order' => $order,
            'products' => $products,
            'customers' => $customers
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

        // Validate the incoming request data using the defined rules and messages
        $request->validate($rules, $messages);

        // Update the order with the validated data
        $order = Order::findOrFail($id);
        $order->order_date = $request->order_date;
        $order->customer_id = $request->customer_id;
        $order->save();

        // Associate products with the order and save discount prices
        $products = $request->input('products');
        $discount_prices = $request->input('discount_prices', []);

        foreach ($products as $product_id) {
            $product = Product::find($product_id);
            $discount_price = isset($discount_prices[$product_id])
                ? $discount_prices[$product_id]
                : ($product ? $product->price : 0.00);

            $order->products()->attach($product_id, [
                'discount_price' => $discount_price,
            ]);
        }

        // Sync products to the order
        $order->products()->sync($request->input('products'));

        return redirect()->route('admin.orders.index')->with('status', 'Updated order');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Retrieve the order by its ID and delete it
        $order = Order::findOrFail($id);

        // Update the deleted attribute to true
        $order->update(['deleted' => true]);

        // Redirect to the order index page with a success message
        return redirect()->route('admin.orders.index')->with('status', 'Order deleted successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function restore(string $id)
    {
        // Retrieve the order by its ID and restore it
        $order = Order::findOrFail($id);

        // Update the deleted attribute to false
        $order->update(['deleted' => false]);

        // Redirect to the order index page with a success message
        return redirect()->route('admin.orders.index')->with('status', 'Order restored successfully');
    }
}
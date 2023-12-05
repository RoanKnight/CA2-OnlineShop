<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\Order;
use Auth;

class OrderProductController extends Controller
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
      // Gets all order_products
      $order_products = OrderProduct::all();

      return view('admin.order_products.index', [
          'order_products' => $order_products 
      ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      Auth::user()->authorizeRoles('admin');

      $orders = Order::all();
      $products = Product::all();

      return view('admin.order_products.create')->with('orders', $orders)
          ->with('products', $products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->title)

        // validation rules

        $rules = [
            'order_id' => 'required|integer',
            'product_id' => 'required|integer',
            'discount_price' => 'numeric|regex:/^\d+(\.\d{1,2})?$/'
        ];

        // Custom error messages for validation
        $messages = [
          'order_id' => 'The order id is required',
          'product_id' => 'The product id is required',
          'discount_price.regex' => 'The discount price must in the correct format',
        ];

        $request->validate($rules, $messages);

        // Create a new order product with the validated data
        $order_product = new OrderProduct;
        $order_product->order_id = $request->order_id;
        $order_product->product_id = $request->product_id;
        $order_product->discount_price = $request->discount_price;
        $order_product->save();

        return redirect()->route('admin.order_products.index')->with('status', 'Created a new order_product');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Retrieve and display the details of a specific order product
        $order_product = OrderProduct::findOrFail($id);
        return view('admin.order_products.show', [
            'order_product' => $order_product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Retrieve and display the edit form for a specific order product
        $order_product = OrderProduct::findOrFail($id);
        return view('admin.order_products.edit', [
            'order_product' => $order_product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        {
          // Validation rules for updating an order product
          $rules = [
            'order_id' => 'required|integer',
            'product_id' => 'required|integer',
            'discount_price' => 'numeric|regex:/^\d+(\.\d{1,2})?$/'
        ];

        // Custom error messages for validation
        $messages = [
          'order_id' => 'The order id is required',
          'product_id' => 'The product id is required',
          'discount_price.regex' => 'The discount price must in the correct format',
        ];

        $request->validate($rules, $messages);

        // Update the order product with the validated data
        $order_product = OrderProduct::findOrFail($id);
        $order_product->order_id = $request->order_id;
        $order_product->product_id = $request->product_id;
        $order_product->discount_price = $request->discount_price;
        $order_product->save();

        return redirect()->route('admin.order_products.index')->with('status', 'Updated order_product');

    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Delete a specific order product
        $order_product = OrderProduct::findOrFail($id);
        $order_product->delete();

        return redirect()->route('admin.order_products.index')->with('status', 'Order_product deleted successfully');
    }
}
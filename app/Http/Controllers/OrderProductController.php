<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderProduct;

class OrderProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $order_products = OrderProduct::orderBy('order_id', 'asc')->paginate(30);

        return view('order_products.index', [
            'order_products' => $order_products 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('order_products.create');
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

        $messages = [
          'order_id' => 'The order id is required',
          'product_id' => 'The product id is required',
          'discount_price.regex' => 'The discount price must in the correct format',
        ];

        $request->validate($rules, $messages);

        $order_product = new OrderProduct;
        $order_product->order_id = $request->order_id;
        $order_product->product_id = $request->product_id;
        $order_product->discount_price = $request->discount_price;
        $order_product->save();

        return redirect()->route('order_products.index')->with('status', 'Created a new order_product');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $order_product = OrderProduct::findOrFail($id);
        return view('order_products.show', [
            'order_product' => $order_product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order_product = OrderProduct::findOrFail($id);
        return view('order_products.edit', [
            'order_product' => $order_product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        {
          $rules = [
            'order_id' => 'required|integer',
            'product_id' => 'required|integer',
            'discount_price' => 'numeric|regex:/^\d+(\.\d{1,2})?$/'
        ];

        $messages = [
          'order_id' => 'The order id is required',
          'product_id' => 'The product id is required',
          'discount_price.regex' => 'The discount price must in the correct format',
        ];

        $request->validate($rules, $messages);

        $order_product = OrderProduct::findOrFail($id);
        $order_product->order_id = $request->order_id;
        $order_product->product_id = $request->product_id;
        $order_product->discount_price = $request->discount_price;
        $order_product->save();

        return redirect()->route('order_products.index')->with('status', 'Updated order_product');

    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order_product = OrderProduct::findOrFail($id);
        $order_product->delete();

        return redirect()->route('order_products.index')->with('status', 'Order_product deleted successfully');
    }
}
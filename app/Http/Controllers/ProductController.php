<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('name', 'desc')->paginate(10);

        return view('products.index', [
            'products' => $products 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->title)

        // validation rules

        $rules = [
            'name' => 'required|date',
            'price' => 'required|string,',
            'brand' => 'required|string',
            'stock' => 'required|BigInteger'
        ];

        $messages = [
          'name' => 'The name is required',
          'price' => 'The price is required',
          'brand' => 'The brand is required',
          'stock' => 'The stock is required',
        ];

        $request->validate($rules, $messages);

        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->name;
        $product->brand = $request->name;
        $product->stock = $request->stock;
        $product->save();

        return redirect()->route('products.index')->with('status', 'Created a new product');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $product = Product::findOrFail($id);
        return view('products.show', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', [
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        {
        $rules = [
          'name' => "required|date,{$id}",
          'price' => "required|string",
          'brand' => "required|string",
          'stock' => "required|BigInteger"
        ];

        $messages = [
          'name' => 'The name is required',
          'price' => 'The price is required',
          'brand' => 'The brand is required',
          'stock' => 'The stock is required',
        ];

        $request->validate($rules, $messages);

        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->brand = $request->brand;
        $product->stock = $request->stock;
        $product->save();

        return redirect()->route('products.index')->with('status', 'Updated product');

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
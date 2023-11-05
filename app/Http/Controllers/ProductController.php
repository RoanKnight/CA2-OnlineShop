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
          'name' => 'required|unique:products,name|string|min:5',
          'price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
          'brand' => "required|string",
          'stock' => "required|integer"
        ];

        $messages = [
          'name' => 'The name is required',
          'name.min' => 'The name must be at least 5 characters',
          'price' => 'The price is required',
          'price.regex' => 'The price is not in the correct format',
          'price.numeric' => 'The price must be numeric',
          'brand' => 'The brand is required',
          'stock' => 'The stock is required',
        ];

        $request->validate($rules, $messages);

        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->brand = $request->brand;
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
          'name' => "required|unique:products,name,{$id}|string|min:5",
          'price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
          'brand' => "required|string",
          'stock' => "required|integer"
        ];

        $messages = [
          'name.unique' => 'The name should be unique',
          'name.min' => 'The name must be at least 5 characters',
          'price' => 'The price is required',
          'price.regex' => 'The price is not in the correct format',
          'price.numeric' => 'The price must be numeric',
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
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('status', 'Product deleted successfully');
    }
}
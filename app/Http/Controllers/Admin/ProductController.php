<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use Auth;

class ProductController extends Controller
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
      // Get all products
      $products = Product::all();

      // Return the view for listing products along with the data
      return view('admin.products.index', [
          'products' => $products 
      ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      Auth::user()->authorizeRoles('admin');

      $orders = Order::all();

        return view('admin.products.create', [
            'orders' => $orders
        ]);
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
          'stock' => "required|integer",
          'product_image' => 'required|file|image'
        ];

        // Custom error messages for validation
        $messages = [
          'name' => 'The name is required',
          'name.min' => 'The name must be at least 5 characters',
          'price' => 'The price is required',
          'price.regex' => 'The price is not in the correct format',
          'price.numeric' => 'The price must be numeric',
          'brand' => 'The brand is required',
          'stock.integer' => 'The stock must be a number'
        ];

        $request->validate($rules, $messages);

        $product_image = $request->file('product_image');
        $extension = $product_image->getClientOriginalExtension();
        // $filename = date('Y-m-d-His') . '_' .  str_replace(' ', '_', $request->name) . '.' . $extension;
        $filename = date('Y-m-d-His') . '.' . $extension;

        $product_image->storeAs('public/images', $filename);

        // Create a new product instance and save it to the table
        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->brand = $request->brand;
        $product->stock = $request->stock;
        $product->product_image = $filename;
        $product->save();

        // Redirect to the product index page with a success message
        return redirect()->route('admin.products.index')->with('status', 'Created a new product');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Retrieve the details of a specific product by its ID
        $product = Product::findOrFail($id);
        return view('admin.products.show', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Display the form for editing the product along with its data
        $product = Product::findOrFail($id);
        return view('admin.products.edit', [
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        {
        // Validation rules for the updting a product
        $rules = [
          'name' => "required|unique:products,name,{$id}|string|min:5",
          'price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
          'brand' => "required|string",
          'stock' => "required|integer",
          'product_image' => 'file|image'
        ];

        // Custom error messages for validation
        $messages = [
          'name.unique' => 'The name should be unique',
          'name.min' => 'The name must be at least 5 characters',
          'price' => 'The price is required',
          'price.regex' => 'The price is not in the correct format',
          'price.numeric' => 'The price must be numeric',
          'brand' => 'The brand is required',
          'stock.integer' => 'The stock must be a number',
        ];

        $request->validate($rules, $messages);

        $product = Product::findOrFail($id);


        if($request->hasFile('product_image')){
          $product_image = $request->file('product_image');
        $extension = $product_image->getClientOriginalExtension();
        // $filename = date('Y-m-d-His') . '_' .  str_replace(' ', '_', $request->name) . '.' . $extension;
        $filename = date('Y-m-d-His') . '.' . $extension;

        $product_image->storeAs('public/images', $filename);

        $product->product_image = $filename;

        }

        


        // Retrieve the product by its ID and update its information
        $product->name = $request->name;
        $product->price = $request->price;
        $product->brand = $request->brand;
        $product->stock = $request->stock;
        $product->save();

        $product->orders()->sync($request->input('orders'));

        // Redirect to the product index page with a success message
        return redirect()->route('admin.products.index')->with('status', 'Updated product');

    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Retrieve the product by its ID and delete it
        $product = Product::findOrFail($id);
        // $product->orders->detach();
        $product->delete();

        // $product->deleted = true;
        // $product->save();

        // Redirect to the product index page with a success message
        return redirect()->route('admin.products.index')->with('status', 'Product deleted successfully');
    }
}
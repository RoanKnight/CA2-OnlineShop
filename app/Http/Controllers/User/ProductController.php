<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

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
        $products = Product::paginate(10);
        return view('user.products.index')->with('products', $products);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        // Find a order by their ID, and then display the 'orders.show' view
        $product = Product::findOrFail($id);
        return view('user.products.show')->with('product', $product);
    }
}
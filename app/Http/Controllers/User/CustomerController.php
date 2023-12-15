<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
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
      $customers = Customer::paginate(10);
      return view('user.customers.index')->with('customers', $customers);
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {

      // Find a customer by their ID, and then display the 'customers.show' view
      $customer = Customer::findOrFail($id);
      return view('user.customers.show')->with('customer', $customer);
  }
}
<?php

namespace App\Http\Controllers;

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
        // Retrieve a paginated list of customers, ordered by first name in descending order
        $customers = Customer::orderBy('first_name', 'desc')->paginate(20);

        // Return the 'customers.index' view and pass the customers data to it
        return view('customers.index', [
            'customers' => $customers 
        ]);
    }

    /**
     * Show the form for creating a new resource
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage
     */
    public function store(Request $request)
    {
        // dd($request->title)

        // validation rules

        // Validation rules for the incoming request data
        $rules = [
            'first_name' => 'required|string|min:2|max:150',
            'last_name' => 'required|string|min:2|max:150',
            'phone_number' => "required|unique:customers,phone_number|regex:/^08[35679]\d{7}$/",
            'email' => 'required|email|unique:customers,email|min:5|max:1000',
        ];

        // Custom error messages for validation rules
        $messages = [
            'email.unique' => 'customer email should be unique',
            'email.email' => 'The :attribute must be a valid email address.',
            'phone_number.unique' => 'customer email should be unique',
            'phone_number.regex' => 'The phone number must be a valid Irish mobile phone number',
        ];

        // Validate the incoming request data using the defined rules and messages
        $request->validate($rules, $messages);

        // Create a new customer and fill in the fields
        $customer = new Customer;
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->phone_number = $request->phone_number;
        $customer->email = $request->email;
        $customer->save();

        // Redirect to the 'customers.index' route with a success message when having created a new entry
        return redirect()->route('customers.index')->with('status', 'Created a new customer');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        // Find a customer by their ID, and then display the 'customers.show' view
        $customer = Customer::findOrFail($id);
        return view('customers.show', [
            'customer' => $customer
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.edit', [
            'customer' => $customer
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      // Validation rules for updating a customer
        {
          $rules = [
            'first_name' => 'required|string|min:2|max:150',
            'last_name' => 'required|string|min:2|max:150',
            'phone_number' => "required|unique:customers,phone_number,{$id}|regex:/^08[35679]\d{7}$/",
            'email' => "required|email|unique:customers,email,{$id}|min:5|max:1000",
        ];

        // Custom error messages for validation rules
        $messages = [
            'email.unique' => 'customer email should be unique',
            'email.email' => 'The :attribute must be a valid email address.',
            'phone_number.unique' => 'customer email should be unique',
            'phone_number.regex' => 'The phone number must be a valid Irish mobile phone number',
        ];

        $request->validate($rules, $messages);

        // Find the customer to update by their unique ID
        $customer = Customer::findOrFail($id);
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->phone_number = $request->phone_number;
        $customer->email = $request->email;
        $customer->save();

        // Redirect to the 'customers.index' route with a success message
        return redirect()->route('customers.index')->with('status', 'Updated customer');

    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find a customer by their unique ID and delete it
        $customer = Customer::findOrFail($id);
        $customer->delete();

        // Redirect to the 'customers.index' route with a success message
        return redirect()->route('customers.index')->with('status', 'Customer deleted successfully');
    }
}
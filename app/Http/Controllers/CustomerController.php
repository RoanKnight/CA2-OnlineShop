<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::orderBy('first_name', 'desc')->paginate(10);

        return view('customers.index', [
            'customers' => $customers 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->title)

        // validation rules

        $rules = [
            'first_name' => 'required|string|min:2|max:150',
            'last_name' => 'required|string|min:2|max:150',
            'phone_number' => 'required|string|unique:customers,phone_number|min:2|max:150',
            'email' => 'required|string|min:5|max:1000|unique:customers,email'
        ];

        $messages = [
            'email.unique' => 'customer email should be unique',
            'phone_number.unique' => 'customer email should be unique'
        ];

        $request->validate($rules, $messages);

        $customer = new Customer;
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->phone_number = $request->phone_number;
        $customer->email = $request->email;
        $customer->save();

        return redirect()->route('customers.index')->with('status', 'Created a new customer');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

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
        {
        $rules = [
          'first_name' => "required|string|min:2|max:150",
          'last_name' => "required|string|min:2|max:150",
          'phone_number' => "required|string|unique:customers,phone_number,{$id}",
          'email' => "required|string|min:5|max:1000|unique:customers,email,{$id}"
        ];

        $messages = [
            'email.unique' => 'Customer email should be unique',
            'phone_number.unique' => 'Customer phone number should be unique'
        ];

        $request->validate($rules, $messages);

        $customer = Customer::findOrFail($id);
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->phone_number = $request->phone_number;
        $customer->email = $request->email;
        $customer->save();

        return redirect()->route('customers.index')->with('status', 'Updated customer');

    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect()->route('customers.index')->with('status', 'Customer deleted successfully');
    }
}
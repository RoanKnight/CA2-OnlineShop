@extends('layouts.myApp')

@section('header')
<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
    Show Customer
</h2>
@endsection

@section('content')

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
  <div>
    <label class="heading">First name</label>
    <input class="inputField" value="{{ $customer->first_name }}" readonly/>
  </div>

  <div>
    <label class="heading">Last name</label>
    <input class="inputField" value="{{ $customer->last_name }}" readonly/>
  </div>

  <div>
    <label class="heading">Phone number</label>
    <input class="inputField" value="{{ $customer->phone_number }}" readonly/>
  </div>

  <div>
    <label class="heading">Email</label>
    <input class="inputField" value="{{ $customer->email }}" readonly/>
  </div>

  <div>
    <label class="heading">Orders</label>
  </div>

  <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">
                Order id
            </th>
            <th scope="col" class="px-6 py-3">
                Order date
            </th>
        </tr>
    </thead>

    @forelse($customer->orders as $order)
    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            {{ $order->id }}
        </td>
        <td class="px-6 py-4">
            {{ $order->order_date }}
        </td>
    </tr>

@empty
    <h4>No Orders found!</h4>
@endforelse
</table>

  <a class="editButton" href="{{ route('admin.customers.edit', $customer->id) }}">Edit</a>

    <form method="POST" action="{{ route('admin.customers.destroy', $customer->id) }}">
        @csrf
        @method('DELETE')
        <button class="deleteButton" type="submit">Delete</button>
    </form>

  </div>

@endsection
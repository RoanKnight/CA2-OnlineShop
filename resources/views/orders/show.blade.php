@extends('layouts.myApp')

@section('header')
<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
    Show Order
</h2>
@endsection

@section('content')

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
  <div>
    <label class="heading">Order date</label>
    <input class="inputField" value="{{ $order->order_date }}" readonly/>
  </div>

  <div>
    <label class="heading">Customer id</label>
    <input class="inputField" value="{{ $order->customer_id }}" readonly/>
  </div>

  <a class="editButton" href="{{ route('orders.edit', $order->id) }}">Edit</a>

    <form method="POST" action="{{ route('orders.destroy', $order->id) }}">
        @csrf
        @method('DELETE')
        <button class="deleteButton" type="submit">Delete</button>
    </form>

  </div>

@endsection
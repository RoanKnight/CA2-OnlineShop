@extends('layouts.myApp')

@section('content')
<h1>Show Order</h1>

<p>{{ $order->order_date }}</p>
<p>{{ $order->customer_id }}</p>

<div>
    <a href="{{ route('orders.edit', $order->id) }}">Edit</a>

    <form method="POST" action="{{ route('orders.destroy', $order->id) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
</div>

@endsection
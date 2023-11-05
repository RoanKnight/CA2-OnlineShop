@extends('layouts.myApp')

@section('header')
<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
    Show Order
</h2>
@endsection

@section('content')

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
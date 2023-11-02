@extends('layouts.myApp')

@section('content')
<h1>Show Order_product</h1>

<p>{{ $order_product->order_id }}</p>
<p>{{ $order_product->product_id }}</p>
<p>{{ $order_product->discount_price }}</p>

<div>
    <a href="{{ route('order_products.edit', $order_product->id) }}">Edit</a>

    <form method="POST" action="{{ route('order_products.destroy', $order_product->id) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
</div>

@endsection
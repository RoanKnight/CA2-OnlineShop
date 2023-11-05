@extends('layouts.myApp')

@section('header')
<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
    Show Order_product
</h2>
@endsection

@section('content')

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
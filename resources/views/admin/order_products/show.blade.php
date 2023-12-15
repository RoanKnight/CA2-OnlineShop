@extends('layouts.myApp')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Show Order_product
    </h2>
@endsection

@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Display Order_product details -->
        <div>
            <label class="heading">Order id</label>
            <input class="inputField" value="{{ $order_product->order_id }}" readonly/>
        </div>

        <div>
            <label class="heading">Product id</label>
            <input class="inputField" value="{{ $order_product->product_id }}" readonly/>
        </div>

        <div>
            <label class="heading">Discount price</label>
            <input class="inputField" value="{{ $order_product->discount_price }}" readonly/>
        </div>

        <!-- Link to edit the Order_product entry -->
        {{-- <a class="editButton" href="{{ route('admin.order_products.edit', $order_product->id) }}">Edit</a> --}}

        <!-- Form to delete the Order_product entry -->
        {{-- <form method="POST" action="{{ route('admin.order_products.destroy', $order_product->id) }}">
            @csrf
            @method('DELETE')
            <button class="deleteButton" type="submit">Delete</button>
        </form> --}}
    </div>
@endsection
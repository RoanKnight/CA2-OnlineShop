@extends('layouts.myApp')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Edit Order_product
    </h2>
@endsection

@section('content')
    {{-- Commented out error display, assuming it is not needed for now --}}
    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}

    <!-- Form for editing order_product -->
    <form action="{{ route('admin.order_products.update', $order_product->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Input for Order id -->
            <div>
                <div class="headings">
                    <label class="heading">Order id</label>
                    @if($errors->has('order_id'))
                        <span class="errors"> {{ $errors->first('order_id') }} </span>
                    @endif
                </div>
                <input class="inputField" type="text" name="order_id" id="order_id" value="{{ old('order_id') ? : $order_product->order_id }}" />
            </div>

            <!-- Input for Product id -->
            <div>
                <div class="headings">
                    <label class="heading">Product id</label>
                    @if($errors->has('product_id'))
                        <span class="errors"> {{ $errors->first('product_id') }} </span>
                    @endif
                </div>
                <input class="inputField" type="text" name="product_id" id="product_id" value="{{ old('product_id') ? : $order_product->product_id }}" />
            </div>

            <!-- Input for Discount price -->
            <div>
                <div class="headings">
                    <label class="heading">Discount price</label>
                    @if($errors->has('discount_price'))
                        <span class="errors"> {{ $errors->first('discount_price') }} </span>
                    @endif
                </div>
                <input class="inputField" type="text" name="discount_price" id="discount_price" value="{{ old('discount_price') ? : $order_product->discount_price }}" />
            </div>

            <!-- Button to submit the form -->
            <button class="editButton" type="submit">Edit order_product</button>
        </div>
    </form>
@endsection
@extends('layouts.myApp')

@section('header')
<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
    Edit Order_product
</h2>
@endsection

@section('content')

{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

<form action="{{ route('order_products.update', $order_product->id) }}" method="post">
    @csrf
    @method('PUT')
    <div>
        <label>Order id</label>

        <input type="text" name="order_id" id="order_id" value="{{ old('order_id') ? : $order_product->order_id }}" />

        @if($errors->has('order_id'))
            <span> {{ $errors->first('order_id') }} </span>
        @endif
    </div>
    <div>
        <label>Product_id</label>

        <input type="text" name="product_id" id="product_id" value="{{ old('product_id') ? : $order_product->product_id }}"/>

        @if($errors->has('product_id'))
            <span> {{ $errors->first('product_id') }} </span>
        @endif
    </div>
    <div>
      <label>Discount price (In €)</label>

      <input type="text" name="discount_price" id="discount_price" value="{{ old('discount_price') ? : $order_product->discount_price }}" />

      @if($errors->has('discount_price'))
          <span> {{ $errors->first('discount_price') }} </span>
      @endif
    </div>
    <button type="submit">Edit</button>
</form>
@endsection
@extends('layouts.myApp')

@section('header')
<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
    Show Order_product
</h2>
@endsection

@section('content')

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
  <div>
    <label class="heading">Order id</label>
    <input class="inputField" value="{{ $order_product->order_id }}" readonly/>
  </div>

  <div>
    <label class="heading">Last name</label>
    <input class="inputField" value="{{ $order_product->product_id }}" readonly/>
  </div>

  <div>
    <label class="heading">Discount price</label>
    <input class="inputField" value="{{ $order_product->discount_price }}" readonly/>
  </div>
  </div>

@endsection
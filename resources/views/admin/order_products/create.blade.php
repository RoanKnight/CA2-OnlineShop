@extends('layouts.myApp')

@section('header')
<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
    Create Order_product
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

<form action="{{ route('admin.order_products.store') }}" method="post">
  @csrf
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div>
      <div class="headings">
        <label class="heading">Order id</label>
        @if($errors->has('order_id'))
            <span class ="errors"> {{ $errors->first('order_id') }} </span>
        @endif
      </div>
        <input class="inputField" placeholder="Order id...." type="text" name="order_id" id="order_id" value="{{ old('order_id') }}"/>
    </div>

    <div>
      <div class="headings">
        <label class="heading">Product_id</label>
          @if($errors->has('product_id'))
            <span class="errors"> {{ $errors->first('product_id') }} </span>
          @endif
      </div>
        <input class="inputField" placeholder="Product id...." type="text" name="product_id" id="product_id" value="{{ old('product_id') }}"/>
    </div>

    <div>
        <div class="headings">
          <label class="heading">Discount price</label>
            @if($errors->has('discount_price'))
              <span class="errors"> {{ $errors->first('discount_price') }} </span>
            @endif
        </div>
      <input class="inputField" placeholder="Discount price...." type="text" name="discount_price" id="discount_price" value="{{ old('discount_price') }}"/>
    </div>

    <button class="createButton" type="submit">Create order_product</button>
  </div>
</form>
@endsection
@extends('layouts.myApp')

@section('header')
<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
    Create Order
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

<form action="{{ route('admin.orders.store') }}" method="post">
  @csrf
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div>
      <div class="headings">
        <label class="heading">Order date</label>
          @if($errors->has('order_date'))
            <span class ="errors"> {{ $errors->first('order_date') }} </span>
         @endif
      </div>
        <input class="inputField" placeholder="Order date...." type="date" name="order_date" id="order_date" value="{{ old('order_date') }}"/>
    </div>

    <div>
      <div class="headings">
          <label class="heading">Customer_id</label>
          @if($errors->has('customer_id'))
              <span class="errors">{{ $errors->first('customer_id') }}</span>
          @endif
      </div>
      <select class="inputField" name="customer_id" id="customer_id">
          @foreach($customers as $customer)
              <option value="{{ $customer }}" {{ old('customer_id') == $customer ? 'selected' : '' }}>
                  {{ $customer }}
              </option>
          @endforeach
      </select>
  </div>

    <div>
      <div class="headings">
          <label class="heading">Products</label>
          @if($errors->has('products'))
              <span class="errors">{{ $errors->first('products') }}</span>
          @endif
      </div>

      <div class="productList">
      @foreach($products as $product)
        @if($product->deleted)
        @else
          <div class="productItem">
              <input type="checkbox" name="products[]" value="{{ $product->id }}"
                     id="product_{{ $product->id }}">
              <label for="product_{{ $product->id }}">{{ $product->name }}</label>
              <input type="text" name="discount_prices[{{ $product->id }}]" placeholder="Discount Price (Optional)" value="{{ old('discount_prices.' . $product->id) }}">
          </div>
          @endif
      @endforeach
      </div>
    </div>

    <button class="createButton" type="submit">Create order</button>
  </div>
</form>
@endsection
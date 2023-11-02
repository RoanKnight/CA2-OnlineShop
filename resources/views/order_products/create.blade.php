@extends('layouts.myApp')

@section('content')
<h3>Create Order_product</h3>

{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

<form action="{{ route('order_products.store') }}" method="post">
    @csrf
    <div>
        <label>Order id</label>
        <input type="text" name="order_id" id="order_id" value="{{ old('order_id') }}"/>
        @if($errors->has('order_id'))
            <span> {{ $errors->first('order_id') }} </span>
        @endif
    </div>
    <div>
        <label>Product id</label>
        <input type="text" name="product_id" id="product_id" value="{{ old('product_id') }}"/>
        @if($errors->has('product_id'))
            <span> {{ $errors->first('product_id') }} </span>
        @endif
    </div>
    <div>
      <label>Discount Price</label>
      <input type="text" name="discount_price" id="discount_price" value="{{ old('discount_price') }}"/>
      @if($errors->has('discount_price'))
          <span> {{ $errors->first('discount_price') }} </span>
      @endif
    </div>
    <button type="submit">Create</button>
</form>
@endsection
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

<form action="{{ route('orders.store') }}" method="post">
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
            <span class="errors"> {{ $errors->first('customer_id') }} </span>
          @endif
      </div>
        <input class="inputField" placeholder="Customer id...." type="text" name="customer_id" id="customer_id" value="{{ old('customer_id') }}"/>
    </div>
    <button class="createButton" type="submit">Create order</button>
  </div>
</form>
@endsection
@extends('layouts.myApp')

@section('header')
<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
    Edit Order
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

<form action="{{ route('orders.update', $order->id) }}" method="post">
  @csrf
  @method('PUT')
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div>
      <div class="headings">
        <label class="heading">Order date</label>
          @if($errors->has('order_date'))
            <span class="errors"> {{ $errors->first('order_date') }} </span>
          @endif
      </div>

        <input class="inputField" type="date" name="order_date" id="order_date" value="{{ old('order_date') ? : $order->order_date }}" />
    </div>

    <div>
      <div class="headings">
        <label class="heading">Customer id</label>
          @if($errors->has('customer_id'))
            <span class="errors"> {{ $errors->first('customer_id') }} </span>
          @endif
      </div>

        <input class="inputField" type="text" name="customer_id" id="customer_id" value="{{ old('customer_id') ? : $order->customer_id }}" />
    </div>
    <button class="editButton" type="submit">Edit order</button>
  </div>
</form>
@endsection
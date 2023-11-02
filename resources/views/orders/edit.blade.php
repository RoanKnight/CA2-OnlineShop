@extends('layouts.myApp')

@section('content')
<h3>Edit Customer</h3>

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
    <div>
        <label>Order date</label>

        <input type="text" name="order_date" id="order_date" value="{{ old('order_date') ? : $order->order_date }}" />

        @if($errors->has('order_date'))
            <span> {{ $errors->first('order_date') }} </span>
        @endif
    </div>
    <div>
        <label>Customer</label>

        <input type="text" name="customer_id" id="customer_id" value="{{ old('customer_id') ? : $order->customer_id }}"/>

        @if($errors->has('customer_id'))
            <span> {{ $errors->first('customer_id') }} </span>
        @endif
    </div>
    <button type="submit">Edit</button>
</form>
@endsection
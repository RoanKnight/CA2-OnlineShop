@extends('layouts.myApp')

@section('content')
<h1>Show Customer</h1>

<p>{{ $customer->first_name }}</p>
<p>{{ $customer->last_name }}</p>
<p>{{ $customer->phone_number }}</p>
<p>{{ $customer->email }}</p>

<div>
    <a href="{{ route('customers.edit', $customer->id) }}">Edit</a>

    <form method="POST" action="{{ route('customers.destroy', $customer->id) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
</div>

@endsection
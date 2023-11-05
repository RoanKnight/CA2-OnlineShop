@extends('layouts.myApp')

@section('header')
<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
    Show Customer
</h2>
@endsection

@section('content')

<p class="row">First Name: {{ $customer->first_name }}</p>
<p class="row">{{ $customer->last_name }}</p>
<p class="row">{{ $customer->phone_number }}</p>
<p class="row">{{ $customer->email }}</p>

<div>
    <a href="{{ route('customers.edit', $customer->id) }}">Edit</a>

    <form method="POST" action="{{ route('customers.destroy', $customer->id) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
</div>

@endsection
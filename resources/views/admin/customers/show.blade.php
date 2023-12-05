@extends('layouts.myApp')

@section('header')
<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
    Show Customer
</h2>
@endsection

@section('content')

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
  <div>
    <label class="heading">First name</label>
    <input class="inputField" value="{{ $customer->first_name }}" readonly/>
  </div>

  <div>
    <label class="heading">Last name</label>
    <input class="inputField" value="{{ $customer->last_name }}" readonly/>
  </div>

  <div>
    <label class="heading">Phone number</label>
    <input class="inputField" value="{{ $customer->phone_number }}" readonly/>
  </div>

  <div>
    <label class="heading">Email</label>
    <input class="inputField" value="{{ $customer->email }}" readonly/>
  </div>

  <a class="editButton" href="{{ route('admin.customers.edit', $customer->id) }}">Edit</a>

    <form method="POST" action="{{ route('admin.customers.destroy', $customer->id) }}">
        @csrf
        @method('DELETE')
        <button class="deleteButton" type="submit">Delete</button>
    </form>

  </div>

@endsection
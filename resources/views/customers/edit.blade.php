@extends('layouts.myApp')

@section('header')
<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
    Edit Customer
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

<form action="{{ route('customers.update', $customer->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div>
      <div class="headings">
        <label class="heading">First Name</label>
        @if($errors->has('first_name'))
            <span class="errors"> {{ $errors->first('first_name') }} </span>
        @endif
      </div>

        <input class="inputField" type="text" name="first_name" id="first_name" value="{{ old('first_name') ? : $customer->first_name }}" />
    </div>

    <div>
      <div class="headings">
        <label class="heading">Last Name</label>
        @if($errors->has('last_name'))
            <span class="errors"> {{ $errors->first('last_name') }} </span>
        @endif
      </div>

        <input class="inputField" type="text" name="last_name" id="last_name" value="{{ old('last_name') ? : $customer->last_name }}" />
    </div>

    <div>
      <div class="headings">
        <label class="heading">Phone number</label>
        @if($errors->has('phone_number'))
            <span class="errors"> {{ $errors->first('phone_number') }} </span>
        @endif
      </div>

        <input class="inputField" type="text" name="phone_number" id="phone_number" value="{{ old('phone_number') ? : $customer->phone_number }}" />
    </div>

    <div>
      <div class="headings">
        <label class="heading">Email</label>
        @if($errors->has('email'))
            <span class="errors"> {{ $errors->first('email') }} </span>
        @endif
      </div>

        <input class="inputField" type="email" name="email" id="email" value="{{ old('email') ? : $customer->email }}" />
    </div>
    <button class="editButton" type="submit">Edit customer</button>
  </div>
</form>
@endsection
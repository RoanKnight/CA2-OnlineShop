@extends('layouts.myApp')

@section('header')
<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
    Create Customer
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

<form action="{{ route('customers.store') }}" method="post">
    @csrf
    <div>
        <label>First Name</label>
        <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}"/>
        @if($errors->has('first_name'))
            <span> {{ $errors->first('first_name') }} </span>
        @endif
    </div>
    <div>
        <label>Last Name</label>
        <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}"/>
        @if($errors->has('last_name'))
            <span> {{ $errors->first('last_name') }} </span>
        @endif
    </div>
    <div>
      <label>Phone Number</label>
      <input type="text" name="phone_number" id="phone_number" value="{{ old('phone_number') }}"/>
      @if($errors->has('phone_number'))
          <span> {{ $errors->first('phone_number') }} </span>
      @endif
    </div>
    <div>
      <label>Email</label>
      <input type="email" name="email" id="email" value="{{ old('email') }}"/>
      @if($errors->has('email'))
          <span> {{ $errors->first('email') }} </span>
      @endif
    </div>
    <button type="submit">Create</button>
</form>
@endsection
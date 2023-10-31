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

<form action="{{ route('customers.update', $customer->id) }}" method="post">
    @csrf
    @method('PUT')
    <div>
        <label>First Name</label>

        <input type="text" name="first_name" id="first_name" value="{{ old('first_name') ? : $customer->first_name }}" />

        @if($errors->has('first_name'))
            <span> {{ $errors->first('first_name') }} </span>
        @endif
    </div>
    <div>
        <label>Last Name</label>

        <input type="text" name="last_name" id="last_name" value="{{ old('last_name') ? : $customer->last_name }}"/>

        @if($errors->has('last_name'))
            <span> {{ $errors->first('last_name') }} </span>
        @endif
    </div>
    <div>
      <label>Phone Number</label>

      <input type="text" name="phone_number" id="phone_number" value="{{ old('phone_number') ? : $customer->phone_number }}" />

      @if($errors->has('phone_number'))
          <span> {{ $errors->first('phone_number') }} </span>
      @endif
    </div>
    <div>
      <label>Email</label>

      <input type="text" name="email" id="email" value="{{ old('email') ? : $customer->email }}" />

      @if($errors->has('email'))
          <span> {{ $errors->first('email') }} </span>
      @endif
      </div>
    <button type="submit">Edit</button>
</form>
@endsection
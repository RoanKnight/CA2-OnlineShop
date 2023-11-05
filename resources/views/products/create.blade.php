@extends('layouts.myApp')

@section('content')
<h3>Create Product</h3>

{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

<form action="{{ route('products.store') }}" method="post">
    @csrf
    <div>
        <label>Name</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}"/>
        @if($errors->has('name'))
            <span> {{ $errors->first('name') }} </span>
        @endif
    </div>
    <div>
        <label>Price</label>
        <input type="text" name="price" id="price" value="{{ old('price') }}"/>
        @if($errors->has('price'))
            <span> {{ $errors->first('price') }} </span>
        @endif
    </div>
    <div>
      <label>Brand</label>
      <input type="text" name="brand" id="brand" value="{{ old('brand') }}"/>
      @if($errors->has('brand'))
          <span> {{ $errors->first('brand') }} </span>
      @endif
    </div>
    <div>
      <label>Stock</label>
      <input type="integer" name="stock" id="stock" value="{{ old('stock') }}"/>
      @if($errors->has('stock'))
          <span> {{ $errors->first('stock') }} </span>
      @endif
    </div>
    <button type="submit">Create</button>
</form>
@endsection
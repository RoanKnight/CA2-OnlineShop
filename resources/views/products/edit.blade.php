@extends('layouts.myApp')

@section('content')
<h3>Edit Product</h3>

{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

<form action="{{ route('products.update', $product->id) }}" method="post">
    @csrf
    @method('PUT')
    <div>
        <label>Name</label>

        <input type="text" name="name" id="name" value="{{ old('name') ? : $product->name }}" />

        @if($errors->has('name'))
            <span> {{ $errors->first('name') }} </span>
        @endif
    </div>
    <div>
        <label>Price</label>

        <input type="text" name="price" id="price" value="{{ old('price') ? : $product->price }}"/>

        @if($errors->has('price'))
            <span> {{ $errors->first('price') }} </span>
        @endif
    </div>
    <div>
      <label>Brand</label>

      <input type="text" name="brand" id="brand" value="{{ old('brand') ? : $product->brand }}" />

      @if($errors->has('brand'))
          <span> {{ $errors->first('brand') }} </span>
      @endif
    </div>
    <div>
      <label>Stock</label>

      <input type="text" name="stock" id="stock" value="{{ old('stock') ? : $product->stock }}" />

      @if($errors->has('stock'))
          <span> {{ $errors->first('stock') }} </span>
      @endif
      </div>
    <button type="submit">Edit</button>
</form>
@endsection
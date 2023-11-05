@extends('layouts.myApp')

@section('header')
<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
    Create Product
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

<form action="{{ route('products.store') }}" method="post">
  @csrf
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div>
      <div class="headings">
        <label class="heading">Name</label>
        @if($errors->has('name'))
            <span class ="errors"> {{ $errors->first('name') }} </span>
        @endif
      </div>
        <input class="inputField" placeholder="Product name...." type="text" name="name" id="name" value="{{ old('name') }}"/>
    </div>

    <div>
      <div class="headings">
        <label class="heading">Price</label>
          @if($errors->has('price'))
            <span class="errors"> {{ $errors->first('price') }} </span>
          @endif
      </div>
        <input class="inputField" placeholder="Price...." type="text" name="price" id="price" value="{{ old('price') }}"/>
    </div>

    <div>
        <div class="headings">
          <label class="heading">Brand</label>
            @if($errors->has('brand'))
              <span class="errors"> {{ $errors->first('brand') }} </span>
            @endif
        </div>
      <input class="inputField" placeholder="Brand...." type="text" name="brand" id="brand" value="{{ old('brand') }}"/>
    </div>

    <div>
      <div class="headings">
        <label class="heading">Stock</label>
        @if($errors->has('stock'))
          <span class="errors"> {{ $errors->first('stock') }} </span>
      @endif
      </div>
      <input class="inputField" placeholder="Stock...." type="text" name="stock" id="stock" value="{{ old('stock') }}"/>
    </div>

    <button class="createButton" type="submit">Create product</button>
  </div>
</form>
@endsection
@extends('layouts.myApp')

@section('header')
<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
    Show Product
</h2>
@endsection

@section('content')

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
  <div>
    <label class="heading">Name</label>
    <input class="inputField" value="{{ $product->name }}" readonly/>
  </div>

  <div>
    <label class="heading">Price</label>
    <input class="inputField" value="{{ $product->price }}" readonly/>
  </div>

  <div>
    <label class="heading">Brand</label>
    <input class="inputField" value="{{ $product->brand }}" readonly/>
  </div>

  <div>
    <label class="heading">Stock</label>
    <input class="inputField" value="{{ $product->stock }}" readonly/>
  </div>

  <div>
    <label class="heading">Product image</label>
    <div class="productImage">
      <img class="showImage" width="300" src={{ asset("storage/images/" . $product->product_image) }} />
    </div>
  </div>

  </div>

@endsection
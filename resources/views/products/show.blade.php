@extends('layouts.myApp')

@section('content')
<h1>Show Product</h1>

<p>{{ $product->name }}</p>
<p>{{ $product->price }}</p>
<p>{{ $product->brand }}</p>
<p>{{ $product->stock }}</p>

<div>
    <a href="{{ route('products.edit', $product->id) }}">Edit</a>

    <form method="POST" action="{{ route('products.destroy', $product->id) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
</div>

@endsection
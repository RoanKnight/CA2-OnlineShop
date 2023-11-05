@extends('layouts.myApp')

@section('header')
<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
    Show Product
</h2>
@endsection

@section('content')

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
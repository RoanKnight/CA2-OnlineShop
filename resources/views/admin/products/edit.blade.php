@extends('layouts.myApp')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Edit Product
    </h2>
@endsection

@section('content')

{{-- Displaying validation errors if any --}}
{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

{{-- Product update form --}}
<form enctype="multipart/form-data" action="{{ route('admin.products.update', $product->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        {{-- Product Name --}}
        <div>
            <div class="headings">
                <label class="heading">Name</label>
                {{-- Displaying validation error for the 'name' field --}}
                @if($errors->has('name'))
                    <span class="errors"> {{ $errors->first('name') }} </span>
                @endif
            </div>
            <input class="inputField" type="text" name="name" id="name" value="{{ old('name') ? : $product->name }}" />
        </div>

        {{-- Product Price --}}
        <div>
            <div class="headings">
                <label class="heading">Price</label>
                {{-- Displaying validation error for the 'price' field --}}
                @if($errors->has('price'))
                    <span class="errors"> {{ $errors->first('price') }} </span>
                @endif
            </div>
            <input class="inputField" type="text" name="price" id="price" value="{{ old('price') ? : $product->price }}" />
        </div>

        {{-- Product Brand --}}
        <div>
            <div class="headings">
                <label class="heading">Brand</label>
                {{-- Displaying validation error for the 'brand' field --}}
                @if($errors->has('brand'))
                    <span class="errors"> {{ $errors->first('brand') }} </span>
                @endif
            </div>
            <input class="inputField" type="text" name="brand" id="brand" value="{{ old('brand') ? : $product->brand }}" />
        </div>

        {{-- Product Stock --}}
        <div>
            <div class="headings">
                <label class="heading">Stock</label>
                {{-- Displaying validation error for the 'stock' field --}}
                @if($errors->has('stock'))
                    <span class="errors"> {{ $errors->first('stock') }} </span>
                @endif
            </div>
            <input class="inputField" type="text" name="stock" id="stock" value="{{ old('stock') ? : $product->stock }}" />
        </div>

        {{-- Product Image --}}
        <div>
            <div class="headings">
                <label class="heading">Product image</label>
                {{-- Displaying validation error for the 'product_image' field --}}
                @if($errors->has('product_image'))
                    <span class="errors">{{ $errors->first('product_image') }}</span>
                @endif
            </div>

            {{-- Display existing product image --}}
            <div class="productImage">
                <img class="showImage" width="300" src="{{ asset("storage/images/" . $product->product_image) }}" />
            </div>

            {{-- Input field for uploading a new product image --}}
            <input
                id="product_image"
                type="file"
                name="product_image"
                placeholder="Product image"
                class="mt-3 image_field"
                field="product_image"
                value="{{ old('product_image') ? : $product->product_image }}"
            />
        </div>

        {{-- Submit button --}}
        <button class="editButton" type="submit">Edit product</button>
    </div>
</form>
@endsection
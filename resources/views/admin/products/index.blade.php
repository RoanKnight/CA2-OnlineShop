@extends('layouts.myApp')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Products
    </h2>
@endsection

@section('content')
    {{-- Link to create a new product entry --}}
    <a class="createButton" href="{{ route('admin.products.create') }}">Create new entry</a>

    {{-- Displaying a table of products --}}
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price (in €)
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Brand
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Stock
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Deleted
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>

            {{-- Loop through each product and display its details --}}
            @forelse($products as $product)
                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $product->name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $product->price }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $product->brand }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $product->stock }}
                    </td>
                    <td class="px-6 py-4">
                        {{-- Display 'True' if product is deleted, 'False' otherwise --}}
                        @if($product->deleted)
                            <span class="text-red-500">True</span>
                        @else
                            <span class="text-green-500">False</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        {{-- Link to edit a product --}}
                        <a class="edit" href="{{ route('admin.products.show', $product->id) }}">Edit</a>
                    </td>
                </tr>
            @empty
                {{-- Displayed when there are no products --}}
                <h4>No Products found!</h4>
            @endforelse
        </table>
    </div>
@endsection
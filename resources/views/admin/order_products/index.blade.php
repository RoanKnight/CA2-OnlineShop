@extends('layouts.myApp')

<link href="{{ asset('css/app.css') }}" rel="stylesheet">

@section('header')
<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
    Order_products
</h2>
@endsection

@section('content')
 <a class="CreateButton" href="{{route('admin.order_products.create')}}">Create new entry</a>

 
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Order_id
                </th>
                <th scope="col" class="px-6 py-3">
                    Product_id
                </th>
                <th scope="col" class="px-6 py-3">
                    Discount price
                </th>
                <th scope="col" class="px-6 py-3">
                  Action
                </th>
            </tr>
        </thead>

        @forelse($order_products as $order_product)
        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $order_product->order_id }}
            </td>
            <td class="px-6 py-4">
                {{ $order_product->product_id }}
            </td>
            <td class="px-6 py-4">
                {{ $order_product->discount_price }}
            </td>
            <td class="px-6 py-4">
              <a class="Edit" href="{{route('admin.order_products.show', $order_product->id)}}" >Edit</a>
          </td>
        </tr>

    @empty
        <h4>No Order_products found!</h4>
    @endforelse
    </table>
</div>
@endsection
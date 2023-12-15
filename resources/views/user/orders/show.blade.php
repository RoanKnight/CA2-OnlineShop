@extends('layouts.myApp')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Show Order
    </h2>
@endsection

@section('content')

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div>
            <label class="heading">Order date</label>
            <input class="inputField" value="{{ $order->order_date }}" readonly/>
        </div>

        <div>
            <label class="heading">Customer id</label>
            <input class="inputField" value="{{ $order->customer_id }}" readonly/>
        </div>

        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Product name
                </th>
                <th scope="col" class="px-6 py-3">
                    Product price
                </th>
                <th scope="col" class="px-6 py-3">
                    Discount
                </th>
            </tr>
            </thead>

            @forelse($order->products as $product)
                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $product->name }}
                        @if($product->deleted)
                            <strong class="text-red-500">(This product is no longer available)</strong>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        {{ $product->price }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $product->pivot->discount_price }}
                    </td>
                </tr>

            @empty
                <h4>No Orders found!</h4>
            @endforelse
        </table>
    </div>

@endsection

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

  <div>
    <label class="heading">Products</label>

    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
              <th scope="col" class="px-6 py-3">
                  Product name
              </th>
              <th scope="col" class="px-6 py-3">
                  Product price (in €)
              </th>
              <th scope="col" class="px-6 py-3">
                Discount price (in €)
            </th>
          </tr>
      </thead>

      @forelse($order->products as $product)
      <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
            @if($product->deleted)
              <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap      dark:text-white">
                {{ $product->name }} <strong class="text-red-500">(Product is no longer available)</strong>
              </td>
            @else
              <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $product->name }}
              </td>
            @endif
          <td class="px-6 py-4">
              {{ $product->price }}
          </td>
          <td class="px-6 py-4">
            {{ $product->pivot->discount_price }}
          </td>
      </tr>

  @empty
      <h4>No Products found!</h4>
  @endforelse
  </table>
  </div>

  <a class="editButton" href="{{ route('admin.orders.edit', $order->id) }}">Edit</a>

    <form method="POST" action="{{ route('admin.orders.destroy', $order->id) }}">
        @csrf
        @method('DELETE')
        <button class="deleteButton" type="submit">Delete</button>
    </form>

  </div>

@endsection
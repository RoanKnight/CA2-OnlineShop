@extends('layouts.myApp')

<link href="{{ asset('css/app.css') }}" rel="stylesheet">

@section('header')
<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
    Orders
</h2>
@endsection

@section('content')
 <a class="CreateButton" href="{{route('orders.create')}}">Create new entry</a>

 
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Order date
                </th>
                <th scope="col" class="px-6 py-3">
                    Customer id
                </th>
                <th scope="col" class="px-6 py-3">
                  Action
                </th>
            </tr>
        </thead>

        @forelse($orders as $order)
        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $order->order_date }}
            </td>
            <td class="px-6 py-4">
                {{ $order->customer_id }}
            </td>
            <td class="px-6 py-4">
                <a class="Edit" href="{{route('orders.show', $order->id)}}" >Edit</a>
            </td>
        </tr>

    @empty
        <h4>No Orders found!</h4>
    @endforelse
    </table>
</div>
@endsection
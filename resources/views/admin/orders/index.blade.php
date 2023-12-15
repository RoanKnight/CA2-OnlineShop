@extends('layouts.myApp')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Orders
    </h2>
@endsection

@section('content')
    <!-- Create new entry link -->
    <a class="createButton" href="{{ route('admin.orders.create') }}">Create new entry</a>

    <!-- Table to display orders -->
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Customer name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Order date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Deleted
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>

            @forelse($orders as $order)
                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                    <!-- Customer name column with deletion status -->
                    <td class="px-6 py-4">
                        @if($order->customer->deleted)
                            {{ $order->customer->first_name }} {{ $order->customer->last_name }}
                            <strong class="text-red-500">(This customer has been deleted)</strong>
                        @else
                            {{ $order->customer->first_name }} {{ $order->customer->last_name }}
                        @endif
                    </td>

                    <!-- Order date column -->
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $order->order_date }}
                    </td>

                    <!-- Deleted column indicating customer or order deletion -->
                    <td class="px-6 py-4">
                        @if($order->customer->deleted || $order->deleted)
                            <span class="text-red-500">True</span>
                        @else
                            <span class="text-green-500">False</span>
                        @endif
                    </td>

                    <!-- Action column with an Edit link -->
                    <td class="px-6 py-4">
                        <a class="edit" href="{{ route('admin.orders.show', $order->id) }}">Edit</a>
                    </td>
                </tr>
            @empty
                <!-- Displayed if there are no orders -->
                <h4>No Orders found!</h4>
            @endforelse
        </table>
    </div>
@endsection
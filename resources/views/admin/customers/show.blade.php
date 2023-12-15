@extends('layouts.myApp')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Show Customer
    </h2>
@endsection

@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Display customer information -->
        <div>
            <!-- ... (customer details) ... -->
        </div>

        <!-- Orders Section -->
        <div>
            <label class="heading">Orders</label>
        </div>

        <!-- Display customer orders -->
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Order id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Order date
                    </th>
                    @if($customer->orders->contains('deleted', 1))
                        <th scope="col" class="px-6 py-3">
                            Message
                        </th>
                    @endif
                </tr>
            </thead>
            @forelse($customer->orders as $order)
                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $order->id }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $order->order_date }}
                    </td>
                    @if($customer->orders->contains('deleted', 1))
                        <td class="px-6 py-4">
                            @if($order->deleted)
                                <strong class="text-red-500">This order has been deleted</strong>
                            @else
                                <!-- Additional order details go here -->
                            @endif
                        </td>
                    @endif
                </tr>
            @empty
                <!-- Displayed when no orders are found -->
                <tr>
                    <td colspan="{{ $customer->orders->contains('deleted', 1) ? '3' : '2' }}">
                        <h4>No Orders found!</h4>
                    </td>
                </tr>
            @endforelse
        </table>

        <!-- Edit, Restore, or Delete customer buttons -->
        <a class="editButton" href="{{ route('admin.customers.edit', $customer->id) }}">Edit</a>

        <!-- Check if the customer is deleted -->
        @if($customer->deleted)
            <form method="POST" action="{{ route('admin.customers.restore', $customer->id) }}">
                @csrf
                @method('PATCH')
                <button class="restoreButton" type="submit">Restore</button>
            </form>
        @else
            <form method="POST" action="{{ route('admin.customers.destroy', $customer->id) }}">
                @csrf
                @method('DELETE')
                <button class="deleteButton" type="submit">Delete</button>
            </form>
        @endif
    </div>
@endsection
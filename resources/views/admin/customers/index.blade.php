@extends('layouts.myApp')

<!-- Include the CSS file -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Customers
    </h2>
@endsection

@section('content')
    <!-- Link to create a new customer entry -->
    <a class="createButton" href="{{route('admin.customers.create')}}">Create new entry</a>

    <!-- Table for displaying customer information -->
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <!-- Table Header -->
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        First Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Last Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Phone number
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Deleted
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>

            <!-- Table Body -->
            @forelse($customers as $customer)
                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $customer->first_name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $customer->last_name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $customer->phone_number }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $customer->email }}
                    </td>
                    <td class="px-6 py-4">
                        <!-- Display 'True' if deleted, 'False' otherwise -->
                        @if($customer->deleted)
                            <span class="text-red-500">True</span>
                        @else
                            <span class="text-green-500">False</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <!-- Link to edit customer -->
                        <a class="edit" href="{{route('admin.customers.show', $customer->id)}}" >Edit</a>
                    </td>
                </tr>
            @empty
                <!-- Displayed when no customers are found -->
                <h4>No Customers found!</h4>
            @endforelse
        </table>
    </div>
@endsection
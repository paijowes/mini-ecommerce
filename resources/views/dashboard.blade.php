@extends('layouts.app')

@section('content')
<div class="space-y-8">

    <!-- Title -->
    <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Dashboard</h1>

    <!-- Stat Boxes -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
        <div class="p-4 bg-white dark:bg-gray-800 rounded shadow text-center">
            <h2 class="text-sm text-gray-500 dark:text-gray-300">Total Sales</h2>
            <p class="text-xl font-bold text-purple-600 dark:text-purple-400">
                Rp {{ number_format($totalSales ?? 0) }}
            </p>
        </div>
        <div class="p-4 bg-white dark:bg-gray-800 rounded shadow text-center">
            <h2 class="text-sm text-gray-500 dark:text-gray-300">Orders</h2>
            <p class="text-xl font-bold text-blue-600 dark:text-blue-400">
                {{ $ordersCount ?? 0 }}
            </p>
        </div>
        <div class="p-4 bg-white dark:bg-gray-800 rounded shadow text-center">
            <h2 class="text-sm text-gray-500 dark:text-gray-300">Products</h2>
            <p class="text-xl font-bold text-indigo-600 dark:text-indigo-400">
                {{ $productsCount ?? 0 }}
            </p>
        </div>
        <div class="p-4 bg-white dark:bg-gray-800 rounded shadow text-center">
            <h2 class="text-sm text-gray-500 dark:text-gray-300">New Customers</h2>
            <p class="text-xl font-bold text-green-600 dark:text-green-400">
                {{ $userCount ?? 0 }}
            </p>
        </div>
    </div>

    <!-- Recent Orders Table -->
    <div class="bg-white dark:bg-gray-800 rounded shadow">
        <h3 class="text-lg font-semibold px-4 py-3 border-b dark:border-gray-700 text-gray-800 dark:text-white">
            Recent Orders
        </h3>
        <table class="w-full text-sm text-left">
            <thead class="bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300">
                <tr>
                    <th class="px-4 py-2">ORDER ID</th>
                    <th class="px-4 py-2">CUSTOMER</th>
                    <th class="px-4 py-2">TOTAL</th>
                    <th class="px-4 py-2">STATUS</th>
                    <th class="px-4 py-2">DATE</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 dark:text-gray-200">
                @forelse ($recentOrders ?? [] as $order)
                    <tr class="border-t border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                        <td class="px-4 py-2">{{ $order->id }}</td>
                        <td class="px-4 py-2">{{ $order->user->name ?? '-' }}</td>
                        <td class="px-4 py-2">Rp {{ number_format($order->total) }}</td>
                        <td class="px-4 py-2 capitalize">{{ $order->status }}</td>
                        <td class="px-4 py-2">{{ $order->created_at->format('d M Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-4 text-center text-gray-400 dark:text-gray-500">
                            No recent orders.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection

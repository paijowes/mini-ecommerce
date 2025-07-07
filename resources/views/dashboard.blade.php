@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold mb-6">Dashboard</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-sm font-medium text-gray-500">Total Sales</h2>
            <p class="mt-2 text-2xl font-bold text-indigo-600">
                Rp {{ number_format($totalSales, 0, ',', '.') }}
            </p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-sm font-medium text-gray-500">Orders</h2>
            <p class="mt-2 text-2xl font-bold text-indigo-600">
                {{ $orderCount }}
            </p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-sm font-medium text-gray-500">Products</h2>
            <p class="mt-2 text-2xl font-bold text-indigo-600">
                {{ $productCount }}
            </p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-sm font-medium text-gray-500">New Customers</h2>
            <p class="mt-2 text-2xl font-bold text-indigo-600">
                {{ $newCustomers }}
            </p>
        </div>
    </div>

    <div class="mt-8 bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b">
            <h2 class="text-lg font-semibold text-gray-800">Recent Orders</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Order ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Customer</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($recentOrders as $order)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $order->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $order->user->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ ucfirst($order->status) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $order->created_at->format('d/m/Y') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center">No recent orders.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

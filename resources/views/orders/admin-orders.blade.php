@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto mt-10">
    <h2 class="text-2xl font-bold mb-4">Semua Pesanan</h2>

    @foreach($orders as $order)
        <div class="border rounded p-4 mb-4">
            <div class="flex justify-between items-center">
                <div>
                    <p class="font-semibold">#{{ $order->id }} - {{ $order->user->name }}</p>
                    <p class="text-sm text-gray-600">{{ $order->created_at->format('d M Y H:i') }}</p>
                    <p>Status: <span class="font-medium">{{ $order->status }}</span></p>
                </div>
                <form action="{{ route('orders.update-status', $order->id) }}" method="POST">
                    @csrf
                    <select name="status" class="border rounded px-2 py-1 mr-2">
                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                        <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                    <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded">Update</button>
                </form>
            </div>

            <ul class="mt-3 pl-4 list-disc">
                @foreach($order->items as $item)
                    <li>{{ $item->product->name }} x {{ $item->quantity }} (Rp {{ number_format($item->price) }})</li>
                @endforeach
            </ul>
        </div>
    @endforeach
</div>
@endsection

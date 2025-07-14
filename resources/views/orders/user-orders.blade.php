@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-10">
    <h2 class="text-2xl font-bold mb-4">Riwayat Pesanan Anda</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('success') }}</div>
    @endif

    @forelse($orders as $order)
        <div class="border rounded p-4 mb-4">
            <p class="font-semibold">Pesanan #{{ $order->id }}</p>
            <p class="text-sm text-gray-600">{{ $order->created_at->format('d M Y H:i') }}</p>
            <p>Status: <span class="font-medium">{{ $order->status }}</span></p>

            <ul class="mt-2 pl-4 list-disc">
                @foreach($order->items as $item)
                    <li>{{ $item->product->name }} x {{ $item->quantity }} (Rp {{ number_format($item->price) }})</li>
                @endforeach
            </ul>
        </div>
    @empty
        <p>Belum ada pesanan.</p>
    @endforelse
</div>
@endsection

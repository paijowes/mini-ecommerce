@extends('layouts.app')
@section('content')
  <div class="bg-white p-6 rounded shadow text-center">
    <h2 class="text-2xl mb-4">Pesanan Berhasil!</h2>
    <p>Order ID: <span class="font-mono">{{ $order->id }}</span></p>
    <p>Total: Rp {{ number_format($order->total,0,',','.') }}</p>
    <a href="{{ route('products.index') }}" class="mt-4 inline-block bg-indigo-600 text-white px-4 py-2 rounded">Lanjut Belanja</a>
  </div>
@endsection

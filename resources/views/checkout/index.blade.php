@extends('layouts.app')
@section('content')
<h1 class="text-3xl mb-6">Checkout</h1>
@if(!$cart)
  <p>Keranjang kosong.</p>
@else
  <div class="bg-white p-6 rounded shadow">
    <table class="mb-4 w-full">
      <thead><tr><th>Produk</th><th>Qty</th><th>Subtotal</th></tr></thead>
      <tbody>
        @php $total=0; @endphp
        @foreach($cart as $item)
          @php $subtotal = $item['price']*$item['quantity']; $total += $subtotal; @endphp
          <tr><td>{{ $item['name'] }}</td><td>{{ $item['quantity'] }}</td><td>Rp {{ number_format($subtotal,0,',','.') }}</td></tr>
        @endforeach
      </tbody>
    </table>
    <p class="font-bold">Total: Rp {{ number_format($total,0,',','.') }}</p>
    <form action="{{ route('checkout.process') }}" method="POST" class="mt-4">
      @csrf
      <button class="bg-indigo-600 text-white px-4 py-2 rounded">Bayar</button>
    </form>
  </div>
@endif
@endsection

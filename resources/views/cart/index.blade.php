@extends('layouts.app')
@section('content')
<h1 class="text-3xl mb-6">Keranjang Belanja</h1>
@if(!$cart)
  <p>Keranjang kosong.</p>
@else
  <table class="w-full bg-white rounded shadow mb-6">
    <thead><tr class="bg-gray-100"><th class="p-2">Produk</th><th>Qty</th><th>Harga</th><th>Aksi</th></tr></thead>
    <tbody>
      @foreach($cart as $id => $item)
        <tr>
          <td class="p-2">{{ $item['name'] }}</td>
          <td class="p-2">{{ $item['quantity'] }}</td>
          <td class="p-2">Rp {{ number_format($item['price'],0,',','.') }}</td>
          <td class="p-2">
            <form action="{{ route('cart.remove', $id) }}" method="POST">
              @csrf
              <button>Hapus</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <a href="{{ route('checkout.index') }}" class="bg-indigo-600 text-white px-4 py-2 rounded">Checkout</a>
@endif
@endsection

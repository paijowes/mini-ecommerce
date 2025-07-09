@extends('layouts.app')
@section('content')
<div class="container mx-auto py-8">
  <h1 class="text-2xl font-bold mb-4">Riwayat Pesanan</h1>
  <table class="w-full bg-white rounded shadow">
    <thead>
      <tr class="bg-gray-100"><th>ID</th><th>Status</th><th>Total</th><th>Tanggal</th></tr>
    </thead>
    <tbody>
      @foreach($orders as $o)
        <tr>
          <td class="p-2">{{ $o->id }}</td>
          <td class="p-2">{{ ucfirst($o->status) }}</td>
          <td class="p-2">Rp {{ number_format($o->total,0,',','.') }}</td>
          <td class="p-2">{{ $o->created_at->format('d/m/Y H:i') }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <div class="mt-4">{{ $orders->links() }}</div>
</div>
@endsection

@extends('layouts.app')
@section('content')
<h1 class="text-3xl mb-6">Daftar Pesanan</h1>
<table class="w-full bg-white rounded shadow">
  <thead>
    <tr class="bg-gray-100"><th>ID</th><th>User</th><th>Total</th><th>Status</th><th>Tanggal</th></tr>
  </thead>
  <tbody>
    @foreach($orders as $o)
      <tr>
        <td class="p-2">{{ $o->id }}</td>
        <td class="p-2">{{ $o->user->name }}</td>
        <td class="p-2">Rp {{ number_format($o->total,0,',','.') }}</td>
        <td class="p-2">{{ ucfirst($o->status) }}</td>
        <td class="p-2">{{ $o->created_at->format('d/m/Y H:i') }}</td>
      </tr>
    @endforeach
  </tbody>
</table>
<div class="mt-4">{{ $orders->links() }}</div>
@endsection

@extends('layouts.app')
@section('content')
<h1 class="text-3xl mb-6">Kelola Produk</h1>
<a href="{{ route('admin.products.create') }}" class="bg-green-600 text-white px-4 py-2 rounded mb-4 inline-block">Tambah Produk</a>
<table class="w-full bg-white rounded shadow">
  <thead><tr class="bg-gray-100"><th>ID</th><th>Nama</th><th>Kategori</th><th>Stok</th><th>Harga</th><th>Aksi</th></tr></thead>
  <tbody>
    @foreach($products as $p)
      <tr>
        <td class="p-2">{{ $p->id }}</td>
        <td class="p-2">{{ $p->name }}</td>
        <td class="p-2">{{ $p->category?->name ?? '-' }}</td>
        <td class="p-2">{{ $p->stock }}</td>
        <td class="p-2">Rp {{ number_format($p->price,0,',','.') }}</td>
        <td class="p-2">
          <a href="{{ route('admin.products.edit', $p) }}">Edit</a>
          <form action="{{ route('admin.products.destroy', $p) }}" method="POST" class="inline">@csrf @method('DELETE')
            <button>Hapus</button>
          </form>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
<div class="mt-4">{{ $products->links() }}</div>
@endsection

@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Daftar Produk</h1>
<a href="{{ route('admin.products.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">+ Tambah Produk</a>

@if(session('success'))
    <div class="bg-green-100 text-green-700 p-2 rounded mb-4">{{ session('success') }}</div>
@endif

<table class="min-w-full bg-white dark:bg-gray-800 rounded shadow">
    <thead>
        <tr class="bg-gray-100 dark:bg-gray-700 text-left text-sm font-semibold text-gray-600 dark:text-gray-300">
            <th class="p-3">Nama</th>
            <th class="p-3">Harga</th>
            <th class="p-3">Stok</th>
            <th class="p-3">Kategori</th>
            <th class="p-3">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($products as $product)
            <tr class="border-b border-gray-200 dark:border-gray-700 text-sm">
                <td class="p-3">{{ $product->name }}</td>
                <td class="p-3">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                <td class="p-3">{{ $product->stock }}</td>
                <td class="p-3">{{ $product->category?->name ?? '-' }}</td>
                <td class="p-3 space-x-2">
                    <a href="{{ route('admin.products.edit', $product) }}" class="text-blue-500 hover:underline">Edit</a>
                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline" onsubmit="return confirm('Hapus produk ini?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="5" class="p-3 text-center text-gray-500">Tidak ada produk.</td></tr>
        @endforelse
    </tbody>
</table>

<div class="mt-4">{{ $products->links() }}</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 shadow-md rounded px-8 pt-6 pb-8 mb-4">
    <h2 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white">Add New Product</h2>

    <form method="POST" action="{{ route('products.store') }}">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-gray-700 dark:text-gray-200 mb-2">Product Name</label>
            <input type="text" name="name" id="name" class="w-full p-2 border rounded bg-white text-gray-900 border-gray-300 dark:bg-gray-700 dark:text-white dark:border-gray-600" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700 dark:text-gray-200 mb-2">Description</label>
            <textarea name="description" id="description" rows="3" class="w-full p-2 border rounded bg-white text-gray-900 border-gray-300 dark:bg-gray-700 dark:text-white dark:border-gray-600"></textarea>
        </div>

        <div class="mb-4">
            <label for="price" class="block text-gray-700 dark:text-gray-200 mb-2">Price</label>
            <input type="number" name="price" id="price" step="0.01" class="w-full p-2 border rounded bg-white text-gray-900 border-gray-300 dark:bg-gray-700 dark:text-white dark:border-gray-600" required>
        </div>

        <div class="mb-4">
            <label for="stock" class="block text-gray-700 dark:text-gray-200 mb-2">Stock</label>
            <input type="number" name="stock" id="stock" class="w-full p-2 border rounded bg-white text-gray-900 border-gray-300 dark:bg-gray-700 dark:text-white dark:border-gray-600" required>
        </div>

        <div class="mb-6">
            <label for="category_id" class="block text-gray-700 dark:text-gray-200 mb-2">Category</label>
            <select name="category_id" id="category_id" class="w-full p-2 border rounded bg-white text-gray-900 border-gray-300 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                <option value="">-- Select Category --</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="text-right">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                Save
            </button>
        </div>
    </form>
</div>

<h1 class="text-3xl mb-6">Tambah Produk</h1>
<form action="{{ route('admin.products.store') }}" method="POST">
  @csrf
  <div><label>Nama</label><input type="text" name="name"></div>
  <div><label>Deskripsi</label><textarea name="description"></textarea></div>
  <div><label>Harga</label><input type="number" name="price" step="0.01"></div>
  <div><label>Image URL</label><input type="text" name="image"></div>
  <div><label>Stok</label><input type="number" name="stock" min="0" value="0"></div>
  <div>
    <label>Kategori</label>
    <select name="category_id">
      <option value="">-</option>
      @foreach($categories as $c)
        <option value="{{ $c->id }}">{{ $c->name }}</option>
      @endforeach
    </select>
  </div>
  <button class="bg-green-600 text-white px-4 py-2 rounded">Simpan</button>
</form>

@endsection

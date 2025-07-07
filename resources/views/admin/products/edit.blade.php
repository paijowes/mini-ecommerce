@extends('layouts.app')
@section('content')
<h1 class="text-3xl mb-6">Edit Produk</h1>
<form action="{{ route('admin.products.update', $product) }}" method="POST">
  @csrf @method('PUT')
  <div><label>Nama</label><input type="text" name="name" value="{{ $product->name }}"></div>
  <div><label>Deskripsi</label><textarea name="description">{{ $product->description }}</textarea></div>
  <div><label>Harga</label><input type="number" name="price" step="0.01" value="{{ $product->price }}"></div>
  <div><label>Image URL</label><input type="text" name="image" value="{{ $product->image }}"></div>
  <button class="bg-green-600 text-white px-4 py-2 rounded">Update</button>
</form>
@endsection

@extends('layouts.app')
@section('content')
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

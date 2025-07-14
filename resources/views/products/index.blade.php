@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
  <div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold">Product Catalog</h1>
    @auth
      <a href="{{ route('products.create') }}"
         class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-500">
         Add Product
      </a>
    @endauth
  </div>

  <form method="GET" class="mb-6 flex space-x-2">
    <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Search" class="border rounded px-2 py-1">
    <select name="category" class="border rounded px-2 py-1">
      <option value="">All Categories</option>
      @foreach($categories as $c)
        <option value="{{ $c->id }}" @selected(($category ?? '')==$c->id)>{{ $c->name }}</option>
      @endforeach
    </select>
    <button class="bg-indigo-600 text-white px-4 rounded">Filter</button>
  </form>

  <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
    @foreach($products as $product)
      <div class="bg-white p-4 rounded-lg shadow hover:shadow-lg transition">
        <img src="{{ $product->image ?? 'https://via.placeholder.com/400x300' }}"
             alt="{{ $product->name }}"
             class="w-full h-48 object-cover rounded">
        <h2 class="mt-4 text-lg font-semibold">{{ $product->name }}</h2>
        <p class="mt-2 text-indigo-600 font-bold">
          Rp {{ number_format($product->price,0,',','.') }}
        </p>
        <a href="{{ route('products.show', $product) }}"
           class="mt-3 inline-block bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-500">
           View Details
        </a>
      </div>
    @endforeach
  </div>

  <div class="mt-6">
    {{ $products->links() }}
  </div>
</div>
@endsection

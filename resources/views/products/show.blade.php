@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
  <div class="bg-white p-6 rounded-lg shadow">
    <div class="flex flex-col md:flex-row">
      <img src="{{ $product->image ?? 'https://via.placeholder.com/600x400' }}" alt="{{ $product->name }}" class="w-full md:w-1/2 h-auto object-cover rounded">
      <div class="mt-6 md:mt-0 md:ml-6 flex-1">
        <h1 class="text-3xl font-bold">{{ $product->name }}</h1>
        <p class="mt-4 text-gray-700">{{ $product->description }}</p>
        <p class="mt-6 text-2xl font-bold text-indigo-600">Rp {{ number_format($product->price,0,',','.') }}</p>
        <form action="#" method="POST" class="mt-6">
          @csrf
          <button type="button" disabled class="bg-green-600 text-white px-6 py-3 rounded cursor-not-allowed">
            Add to Cart
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

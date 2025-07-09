@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
  <div class="bg-white p-6 rounded-lg shadow">
    <div class="flex justify-between items-center mb-6">
      <h1 class="text-2xl font-bold">Add New Product</h1>
      <a href="{{ route('products.index') }}" class="text-indigo-600 hover:underline">Back to Products</a>
    </div>

    <x-validation-errors class="mb-4" />

    <form action="{{ route('products.store') }}" method="POST" class="space-y-4">
      @csrf
      <div>
        <label class="block text-gray-700">Name</label>
        <input type="text" name="name" value="{{ old('name') }}" required
               class="w-full border rounded px-3 py-2" />
      </div>
      <div>
        <label class="block text-gray-700">Description</label>
        <textarea name="description" rows="4"
                  class="w-full border rounded px-3 py-2">{{ old('description') }}</textarea>
      </div>
      <div>
        <label class="block text-gray-700">Price</label>
        <input type="number" name="price" value="{{ old('price') }}" required step="0.01"
               class="w-full border rounded px-3 py-2" />
      </div>
      <div>
        <label class="block text-gray-700">Image URL</label>
        <input type="text" name="image" value="{{ old('image') }}"
               class="w-full border rounded px-3 py-2" />
      </div>
      <div>
        <label class="block text-gray-700">Stock</label>
        <input type="number" name="stock" value="{{ old('stock',0) }}" min="0" class="w-full border rounded px-3 py-2" />
      </div>
      <div>
        <label class="block text-gray-700">Category</label>
        <select name="category_id" class="w-full border rounded px-3 py-2">
          <option value="">-</option>
          @foreach($categories as $c)
            <option value="{{ $c->id }}" @selected(old('category_id')==$c->id)>{{ $c->name }}</option>
          @endforeach
        </select>
      </div>
      <button type="submit"
              class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-500">
        Add Product
      </button>
    </form>
  </div>
</div>
@endsection

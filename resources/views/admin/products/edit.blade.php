@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-white">Edit Product</h2>

        <form method="POST" action="{{ route('products.update', $product->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-200 mb-2" for="name">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}"
                    class="w-full px-3 py-2 border rounded-md bg-gray-50 text-gray-900 border-gray-300
                           dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-200 mb-2" for="description">Description</label>
                <textarea name="description" id="description" rows="4"
                    class="w-full px-3 py-2 border rounded-md bg-gray-50 text-gray-900 border-gray-300
                           dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-200 mb-2" for="price">Price</label>
                <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}"
                    class="w-full px-3 py-2 border rounded-md bg-gray-50 text-gray-900 border-gray-300
                           dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    step="0.01" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-200 mb-2" for="image_url">Image URL</label>
                <input type="url" name="image_url" id="image_url" value="{{ old('image_url', $product->image_url) }}"
                    class="w-full px-3 py-2 border rounded-md bg-gray-50 text-gray-900 border-gray-300
                           dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-200 mb-2" for="stock">Stock</label>
                <input type="number" name="stock" id="stock" value="{{ old('stock', $product->stock) }}"
                    class="w-full px-3 py-2 border rounded-md bg-gray-50 text-gray-900 border-gray-300
                           dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-200 mb-2" for="category_id">Category</label>
                <select name="category_id" id="category_id"
                    class="w-full px-3 py-2 border rounded-md bg-gray-50 text-gray-900 border-gray-300
                           dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">-- Select Category --</option>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}" {{ $product->category_id == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="text-right">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded">
                    Update Product
                </button>
            </div>
        </form>
    </div>
@endsection

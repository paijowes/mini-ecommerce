@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Produk Terbaru</h1>

    @if ($products->count())
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($products as $product)
                <div class="bg-white dark:bg-gray-800 rounded shadow p-4">
                    <h2 class="font-semibold text-lg">{{ $product->name }}</h2>
                    <p class="text-sm text-gray-500 dark:text-gray-300 mb-2">Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                    <a href="{{ route('products.show', $product->id) }}"
                       class="inline-block mt-2 px-4 py-1 text-sm text-white bg-blue-600 rounded hover:bg-blue-700">
                        Lihat Detail
                    </a>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-500">Belum ada produk tersedia.</p>
    @endif
@endsection

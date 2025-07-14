@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-10">
    <h2 class="text-2xl font-bold mb-4">Kirim Pesan ke Admin</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('success') }}</div>
    @endif

    <form action="{{ route('messages.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block font-medium">Subjek</label>
            <input type="text" name="subject" class="w-full border rounded px-3 py-2" value="{{ old('subject') }}" required>
            @error('subject') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>
        <div>
            <label class="block font-medium">Pesan</label>
            <textarea name="message" class="w-full border rounded px-3 py-2" rows="5" required>{{ old('message') }}</textarea>
            @error('message') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>
        <div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Kirim</button>
        </div>
    </form>
</div>
@endsection

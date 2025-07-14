@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-10">
    <h2 class="text-2xl font-bold mb-4">Pesan Masuk dari Pengguna</h2>

    @forelse($messages as $message)
        <div class="border rounded p-4 mb-4">
            <h3 class="font-semibold text-lg">{{ $message->subject }}</h3>
            <p class="text-gray-600 text-sm">Dari: {{ $message->user->name }} | {{ $message->created_at->format('d M Y H:i') }}</p>
            <p class="mt-2">{{ $message->message }}</p>
        </div>
    @empty
        <p>Tidak ada pesan.</p>
    @endforelse
</div>
@endsection

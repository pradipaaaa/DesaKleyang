@extends('layouts.admin')

@section('title', 'Detail Pesan')
@section('page_title', 'Detail Pesan')

@section('content')
<div class="max-w-3xl space-y-6">
    <a href="{{ route('admin.messages.index') }}" class="text-sm text-gray-600 hover:text-green-700">Kembali ke pesan masuk</a>
    <div class="rounded-2xl border border-gray-100 bg-white p-6 shadow-sm">
        <div class="border-b border-gray-100 pb-5">
            <p class="text-lg font-semibold text-gray-900">{{ $message->name }}</p>
            <p class="text-sm text-gray-500">{{ $message->email }}</p>
            <p class="mt-1 text-xs text-gray-400">{{ $message->created_at->format('d M Y H:i') }}</p>
        </div>
        <p class="mt-5 whitespace-pre-line leading-7 text-gray-700">{{ $message->message }}</p>
        <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" class="mt-6">
            @csrf @method('DELETE')
            <button onclick="return confirm('Hapus pesan ini?')" class="rounded-xl bg-red-50 px-5 py-2.5 text-sm font-semibold text-red-700 hover:bg-red-100">Hapus Pesan</button>
        </form>
    </div>
</div>
@endsection

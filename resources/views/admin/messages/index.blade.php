@extends('layouts.admin')

@section('title', 'Pesan Masuk')
@section('page_title', 'Pesan Masuk')

@section('content')
<div class="overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-sm">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 text-left text-xs uppercase text-gray-500">
            <tr><th class="px-5 py-3">Pengirim</th><th class="px-5 py-3">Pesan</th><th class="px-5 py-3">Tanggal</th><th class="px-5 py-3 text-right">Aksi</th></tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @forelse($messages as $message)
                <tr class="{{ $message->is_read ? '' : 'bg-green-50/50' }}">
                    <td class="px-5 py-4">
                        <p class="font-semibold text-gray-900">{{ $message->name }}</p>
                        <p class="text-xs text-gray-500">{{ $message->email }}</p>
                    </td>
                    <td class="px-5 py-4 text-gray-600">{{ Str::limit($message->message, 90) }}</td>
                    <td class="px-5 py-4 text-xs text-gray-500">{{ $message->created_at->format('d M Y H:i') }}</td>
                    <td class="px-5 py-4">
                        <div class="flex justify-end gap-3">
                            <a href="{{ route('admin.messages.show', $message) }}" class="font-medium text-green-700">Baca</a>
                            <form action="{{ route('admin.messages.destroy', $message) }}" method="POST">
                                @csrf @method('DELETE')
                                <button onclick="return confirm('Hapus pesan ini?')" class="font-medium text-red-600">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="px-5 py-10 text-center text-gray-400">Belum ada pesan masuk.</td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="border-t border-gray-100 px-5 py-4">{{ $messages->links() }}</div>
</div>
@endsection

@extends('layouts.admin')

@section('title', 'Galeri')
@section('page_title', 'Galeri')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <p class="text-sm text-gray-500">Total {{ $galleries->total() }} foto</p>
        <a href="{{ route('admin.gallery.create') }}" class="rounded-xl bg-green-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-green-700">Upload Foto</a>
    </div>
    <div class="grid gap-5 sm:grid-cols-2 xl:grid-cols-3">
        @forelse($galleries as $gallery)
            <div class="overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-sm">
                <img src="{{ Storage::url($gallery->image) }}" alt="{{ $gallery->title }}" class="h-44 w-full object-cover">
                <div class="space-y-3 p-5">
                    <div>
                        <p class="font-semibold text-gray-900">{{ $gallery->title }}</p>
                        <p class="text-xs text-gray-500">{{ $gallery->category->name ?? 'Tanpa kategori' }}</p>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="rounded-full px-2.5 py-1 text-xs {{ $gallery->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-500' }}">{{ $gallery->is_active ? 'Aktif' : 'Nonaktif' }}</span>
                        <div class="flex gap-2">
                            <a href="{{ route('admin.gallery.edit', $gallery) }}" class="text-sm font-medium text-blue-600">Edit</a>
                            <form action="{{ route('admin.gallery.destroy', $gallery) }}" method="POST">
                                @csrf @method('DELETE')
                                <button onclick="return confirm('Hapus foto ini?')" class="text-sm font-medium text-red-600">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="rounded-2xl border border-dashed border-gray-200 bg-white p-10 text-center text-gray-400 sm:col-span-2 xl:col-span-3">Belum ada foto galeri.</div>
        @endforelse
    </div>
    {{ $galleries->links() }}
</div>
@endsection

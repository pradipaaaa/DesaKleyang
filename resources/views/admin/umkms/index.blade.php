@extends('layouts.admin')

@section('title', 'UMKM')
@section('page_title', 'UMKM')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col justify-between gap-3 sm:flex-row sm:items-center">
        <form action="{{ route('admin.umkms.index') }}" method="GET" class="flex gap-2">
            <input name="search" value="{{ $search }}" placeholder="Cari UMKM..." class="rounded-xl border border-gray-300 px-4 py-2.5 text-sm">
            <button class="rounded-xl bg-gray-100 px-4 py-2.5 text-sm font-medium text-gray-700">Cari</button>
        </form>
        <a href="{{ route('admin.umkms.create') }}" class="rounded-xl bg-green-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-green-700">Tambah UMKM</a>
    </div>
    <div class="grid gap-5 md:grid-cols-2 xl:grid-cols-3">
        @forelse($umkms as $umkm)
            <div class="rounded-2xl border border-gray-100 bg-white p-5 shadow-sm">
                <div class="flex gap-4">
                    @if($umkm->photo)
                        <img src="{{ Storage::url($umkm->photo) }}" alt="{{ $umkm->name }}" class="h-20 w-20 rounded-xl object-cover">
                    @else
                        <div class="h-20 w-20 rounded-xl bg-green-100"></div>
                    @endif
                    <div class="min-w-0 flex-1">
                        <p class="font-semibold text-gray-900">{{ $umkm->name }}</p>
                        <p class="text-sm text-gray-600">{{ $umkm->product }}</p>
                        <p class="text-xs text-gray-500">Pemilik: {{ $umkm->owner }}</p>
                    </div>
                </div>
                <div class="mt-4 flex items-center justify-between">
                    <span class="rounded-full px-2.5 py-1 text-xs {{ $umkm->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-500' }}">{{ $umkm->is_active ? 'Aktif' : 'Nonaktif' }}</span>
                    <div class="flex gap-3 text-sm">
                        <a href="{{ route('admin.umkms.edit', $umkm) }}" class="font-medium text-blue-600">Edit</a>
                        <form action="{{ route('admin.umkms.destroy', $umkm) }}" method="POST">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Hapus UMKM ini?')" class="font-medium text-red-600">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="rounded-2xl border border-dashed border-gray-200 bg-white p-10 text-center text-gray-400 md:col-span-2 xl:col-span-3">Belum ada data UMKM.</div>
        @endforelse
    </div>
    {{ $umkms->links() }}
</div>
@endsection

@extends('layouts.admin')

@section('title', 'Potensi Desa')
@section('page_title', 'Potensi Desa')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <p class="text-sm text-gray-500">Total {{ $potentials->total() }} potensi desa</p>
        <a href="{{ route('admin.potentials.create') }}" class="rounded-xl bg-green-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-green-700">Tambah Potensi</a>
    </div>
    <div class="overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-sm">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-left text-xs uppercase text-gray-500">
                <tr>
                    <th class="px-5 py-3">Nama</th>
                    <th class="px-5 py-3">Kategori</th>
                    <th class="px-5 py-3">Status</th>
                    <th class="px-5 py-3 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($potentials as $potential)
                    <tr>
                        <td class="px-5 py-4">
                            <p class="font-semibold text-gray-900">{{ $potential->name }}</p>
                            <p class="text-xs text-gray-500">{{ Str::limit($potential->description, 80) }}</p>
                        </td>
                        <td class="px-5 py-4 text-gray-600">{{ $potential->category_label }}</td>
                        <td class="px-5 py-4">
                            <span class="rounded-full px-2.5 py-1 text-xs {{ $potential->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-500' }}">{{ $potential->is_active ? 'Aktif' : 'Nonaktif' }}</span>
                        </td>
                        <td class="px-5 py-4">
                            <div class="flex justify-end gap-3">
                                <a href="{{ route('admin.potentials.edit', $potential) }}" class="font-medium text-blue-600">Edit</a>
                                <form action="{{ route('admin.potentials.destroy', $potential) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('Hapus potensi ini?')" class="font-medium text-red-600">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="px-5 py-10 text-center text-gray-400">Belum ada data potensi desa.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $potentials->links() }}
</div>
@endsection

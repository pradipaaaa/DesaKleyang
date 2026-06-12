@extends('layouts.admin')

@section('title', 'Kategori Berita')
@section('page_title', 'Kategori Berita')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <p class="text-sm text-gray-500">Total {{ $categories->total() }} kategori</p>
        <a href="{{ route('admin.news-categories.create') }}" class="rounded-xl bg-green-600 px-4 py-2.5 text-sm font-semibold text-white">Tambah Kategori</a>
    </div>
    <div class="overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-sm">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-left text-xs uppercase text-gray-500">
                <tr><th class="px-5 py-3">Nama</th><th class="px-5 py-3">Slug</th><th class="px-5 py-3">Berita</th><th class="px-5 py-3 text-right">Aksi</th></tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($categories as $category)
                    <tr>
                        <td class="px-5 py-4"><span class="inline-block h-3 w-3 rounded-full" style="background: {{ $category->color ?? '#1D401F' }}"></span> <span class="font-semibold text-gray-900">{{ $category->name }}</span></td>
                        <td class="px-5 py-4 text-gray-500">{{ $category->slug }}</td>
                        <td class="px-5 py-4 text-gray-600">{{ $category->news_count }}</td>
                        <td class="px-5 py-4">
                            <div class="flex justify-end gap-3">
                                <a href="{{ route('admin.news-categories.edit', $category) }}" class="font-medium text-blue-600">Edit</a>
                                <form action="{{ route('admin.news-categories.destroy', $category) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('Hapus kategori ini?')" class="font-medium text-red-600">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="px-5 py-10 text-center text-gray-400">Belum ada kategori berita.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $categories->links() }}
</div>
@endsection

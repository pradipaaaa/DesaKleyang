@extends('layouts.admin')

@section('title', 'Tulis Berita')
@section('page_title', 'Tulis Berita')

@section('content')
<form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf
    <div class="flex items-center justify-between">
        <a href="{{ route('admin.news.index') }}" class="text-sm text-gray-600 hover:text-green-700">Kembali ke daftar</a>
        <button class="rounded-xl bg-green-600 px-5 py-2.5 text-sm font-semibold text-white hover:bg-green-700">Simpan Berita</button>
    </div>
    <div class="grid gap-6 lg:grid-cols-3">
        <div class="space-y-5 rounded-2xl border border-gray-100 bg-white p-6 shadow-sm lg:col-span-2">
            <div>
                <label class="mb-1 block text-sm font-medium text-gray-700">Judul</label>
                <input name="title" value="{{ old('title') }}" class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm focus:border-green-500 focus:ring-2 focus:ring-green-500/20">
                @error('title')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="mb-1 block text-sm font-medium text-gray-700">Ringkasan</label>
                <textarea name="excerpt" rows="3" class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm focus:border-green-500 focus:ring-2 focus:ring-green-500/20">{{ old('excerpt') }}</textarea>
                @error('excerpt')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="mb-1 block text-sm font-medium text-gray-700">Konten</label>
                <textarea name="content" rows="12" class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm focus:border-green-500 focus:ring-2 focus:ring-green-500/20">{{ old('content') }}</textarea>
                @error('content')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
            </div>
        </div>
        <div class="space-y-5 rounded-2xl border border-gray-100 bg-white p-6 shadow-sm">
            <div>
                <label class="mb-1 block text-sm font-medium text-gray-700">Kategori</label>
                <select name="news_category_id" class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" @selected(old('news_category_id') == $category->id)>{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('news_category_id')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="mb-1 block text-sm font-medium text-gray-700">Penulis</label>
                <input name="author" value="{{ old('author', 'Admin Desa') }}" class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm">
            </div>
            <div>
                <label class="mb-1 block text-sm font-medium text-gray-700">Tanggal Terbit</label>
                <input type="datetime-local" name="published_at" value="{{ old('published_at') }}" class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm">
            </div>
            <div>
                <label class="mb-1 block text-sm font-medium text-gray-700">Thumbnail</label>
                <input type="file" name="thumbnail" accept="image/*" class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm">
                @error('thumbnail')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
            </div>
            <label class="flex items-center gap-3 text-sm text-gray-700">
                <input type="checkbox" name="is_published" value="1" @checked(old('is_published', true)) class="rounded border-gray-300 text-green-600">
                Terbitkan
            </label>
        </div>
    </div>
</form>
@endsection

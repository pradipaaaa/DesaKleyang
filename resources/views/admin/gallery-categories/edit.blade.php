@extends('layouts.admin')

@section('title', 'Edit Kategori Galeri')
@section('page_title', 'Edit Kategori Galeri')

@section('content')
<form action="{{ route('admin.gallery-categories.update', $galleryCategory) }}" method="POST" class="max-w-xl space-y-5 rounded-2xl border border-gray-100 bg-white p-6 shadow-sm">
    @csrf
    @method('PUT')
    @include('admin.gallery-categories.partials.form', ['galleryCategory' => $galleryCategory])
    <div class="flex justify-end gap-3">
        <a href="{{ route('admin.gallery-categories.index') }}" class="rounded-xl border border-gray-300 px-5 py-2.5 text-sm text-gray-700">Batal</a>
        <button class="rounded-xl bg-green-600 px-5 py-2.5 text-sm font-semibold text-white">Simpan</button>
    </div>
</form>
@endsection

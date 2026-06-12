@extends('layouts.admin')

@section('title', 'Tambah Kategori Berita')
@section('page_title', 'Tambah Kategori Berita')

@section('content')
<form action="{{ route('admin.news-categories.store') }}" method="POST" class="max-w-xl space-y-5 rounded-2xl border border-gray-100 bg-white p-6 shadow-sm">
    @csrf
    @include('admin.news-categories.partials.form', ['newsCategory' => null])
    <div class="flex justify-end gap-3">
        <a href="{{ route('admin.news-categories.index') }}" class="rounded-xl border border-gray-300 px-5 py-2.5 text-sm text-gray-700">Batal</a>
        <button class="rounded-xl bg-green-600 px-5 py-2.5 text-sm font-semibold text-white">Simpan</button>
    </div>
</form>
@endsection

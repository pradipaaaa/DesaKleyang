@extends('layouts.admin')

@section('title', 'Edit Galeri')
@section('page_title', 'Edit Galeri')

@section('content')
<form action="{{ route('admin.gallery.update', $gallery) }}" method="POST" enctype="multipart/form-data" class="max-w-3xl space-y-6 rounded-2xl border border-gray-100 bg-white p-6 shadow-sm">
    @csrf
    @method('PUT')
    @include('admin.gallery.partials.form', ['gallery' => $gallery])
    <div class="flex justify-end gap-3">
        <a href="{{ route('admin.gallery.index') }}" class="rounded-xl border border-gray-300 px-5 py-2.5 text-sm text-gray-700">Batal</a>
        <button class="rounded-xl bg-green-600 px-5 py-2.5 text-sm font-semibold text-white">Simpan</button>
    </div>
</form>
@endsection

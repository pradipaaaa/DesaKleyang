@extends('layouts.admin')

@section('title', 'Edit Struktur Organisasi')
@section('page_title', 'Edit Struktur Organisasi')

@section('content')
<div class="space-y-6">

    {{-- Breadcrumb --}}
    <div class="flex items-center space-x-2 text-sm text-gray-500">
        <a href="{{ route('admin.dashboard') }}" class="hover:text-green-600">Dashboard</a>
        <span>/</span>
        <a href="{{ route('admin.organization.index') }}" class="hover:text-green-600">Struktur Organisasi</a>
        <span>/</span>
        <span class="text-gray-700 font-medium">Edit</span>
    </div>

    {{-- Back Button --}}
    <a href="{{ route('admin.organization.index') }}"
        class="inline-flex items-center text-sm text-gray-600 hover:text-green-600 transition-colors">
        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
        </svg>
        Kembali ke Daftar
    </a>

    <form action="{{ route('admin.organization.update', $organization) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-6 pb-3 border-b border-gray-100">
                Edit: <span class="text-green-600">{{ $organization->title }}</span>
            </h2>

            <div class="space-y-5">

                {{-- Title --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Judul <span class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title', $organization->title) }}"
                        class="w-full border border-gray-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('title') border-red-400 @enderror">
                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Current Image --}}
                @if($organization->image)
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Gambar Saat Ini</label>
                        <img src="{{ Storage::url($organization->image) }}" alt="{{ $organization->title }}"
                            class="w-full max-h-64 object-contain rounded-xl border border-gray-200 bg-gray-50 p-2">
                    </div>
                @endif

                {{-- New Image Upload --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        {{ $organization->image ? 'Ganti Gambar (opsional)' : 'Upload Gambar' }}
                    </label>
                    <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:border-green-400 transition-colors">
                        <svg class="mx-auto h-8 w-8 text-gray-400 mb-2" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <label class="cursor-pointer">
                            <span class="text-green-600 hover:text-green-700 font-medium text-sm">Pilih gambar baru</span>
                            <input type="file" name="image" accept="image/*" class="hidden" onchange="previewImage(this)">
                        </label>
                        <p class="text-xs text-gray-400 mt-1">{{ $organization->image ? 'Kosongkan jika tidak ingin mengubah gambar' : 'PNG, JPG, WEBP maks 5MB' }}</p>
                    </div>
                    <img id="image_preview" src="#" alt="Preview" class="hidden mt-3 w-full max-h-64 object-contain rounded-xl border border-gray-200">
                    @error('image')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Description --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                    <textarea name="description" rows="3"
                        class="w-full border border-gray-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('description') border-red-400 @enderror">{{ old('description', $organization->description) }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Is Active --}}
                <div>
                    <label class="flex items-center space-x-3 cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $organization->is_active) ? 'checked' : '' }}
                            class="w-4 h-4 text-green-600 border-gray-300 rounded focus:ring-green-500">
                        <div>
                            <span class="text-sm font-medium text-gray-700">Tampilkan di Website</span>
                            <p class="text-xs text-gray-400">Centang untuk menampilkan struktur ini di halaman publik</p>
                        </div>
                    </label>
                </div>

            </div>
        </div>

        {{-- Submit --}}
        <div class="flex items-center justify-end space-x-3 mt-6">
            <a href="{{ route('admin.organization.index') }}"
                class="px-6 py-2.5 border border-gray-300 text-gray-600 rounded-xl text-sm font-medium hover:bg-gray-50 transition-colors">
                Batal
            </a>
            <button type="submit"
                class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2.5 rounded-xl transition-colors duration-200 flex items-center space-x-2 text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                <span>Simpan Perubahan</span>
            </button>
        </div>

    </form>
</div>

@push('scripts')
<script>
function previewImage(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.getElementById('image_preview');
            preview.src = e.target.result;
            preview.classList.remove('hidden');
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endpush
@endsection

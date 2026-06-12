@extends('layouts.admin')

@section('title', 'Tambah Perangkat Desa')
@section('page_title', 'Tambah Perangkat Desa')

@section('content')
<div class="space-y-6">

    {{-- Breadcrumb --}}
    <div class="flex items-center space-x-2 text-sm text-gray-500">
        <a href="{{ route('admin.dashboard') }}" class="hover:text-green-600">Dashboard</a>
        <span>/</span>
        <a href="{{ route('admin.officials.index') }}" class="hover:text-green-600">Perangkat Desa</a>
        <span>/</span>
        <span class="text-gray-700 font-medium">Tambah</span>
    </div>

    {{-- Back Button --}}
    <a href="{{ route('admin.officials.index') }}"
        class="inline-flex items-center text-sm text-gray-600 hover:text-green-600 transition-colors">
        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
        </svg>
        Kembali ke Daftar
    </a>

    <form action="{{ route('admin.officials.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-6 pb-3 border-b border-gray-100">Informasi Perangkat Desa</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                {{-- Name --}}
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap <span class="text-red-500">*</span></label>
                    <input type="text" name="name" value="{{ old('name') }}"
                        class="w-full border border-gray-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('name') border-red-400 @enderror"
                        placeholder="Nama lengkap perangkat desa">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Position --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Jabatan <span class="text-red-500">*</span></label>
                    <input type="text" name="position" value="{{ old('position') }}"
                        class="w-full border border-gray-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('position') border-red-400 @enderror"
                        placeholder="Contoh: Kepala Desa, Sekretaris, dll">
                    @error('position')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Order --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Urutan Tampil</label>
                    <input type="number" name="order" value="{{ old('order', 0) }}" min="0"
                        class="w-full border border-gray-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('order') border-red-400 @enderror"
                        placeholder="0">
                    @error('order')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Phone --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon</label>
                    <input type="text" name="phone" value="{{ old('phone') }}"
                        class="w-full border border-gray-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('phone') border-red-400 @enderror"
                        placeholder="08xxxxxxxxxx">
                    @error('phone')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="w-full border border-gray-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('email') border-red-400 @enderror"
                        placeholder="email@example.com">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Description --}}
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                    <textarea name="description" rows="3"
                        class="w-full border border-gray-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('description') border-red-400 @enderror"
                        placeholder="Deskripsi singkat tentang perangkat desa ini...">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Photo --}}
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Foto</label>
                    <div class="flex items-start space-x-4">
                        <div class="flex-1">
                            <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:border-green-400 transition-colors">
                                <svg class="mx-auto h-8 w-8 text-gray-400 mb-2" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <label class="cursor-pointer">
                                    <span class="text-green-600 hover:text-green-700 text-sm font-medium">Pilih foto</span>
                                    <input type="file" name="photo" accept="image/*" class="hidden" onchange="previewPhoto(this)">
                                </label>
                                <p class="text-xs text-gray-400 mt-1">PNG, JPG maks 2MB. Disarankan rasio 1:1</p>
                            </div>
                        </div>
                        <div class="flex-shrink-0">
                            <div id="photo_preview_container" class="hidden">
                                <img id="photo_preview" src="#" alt="Preview" class="w-24 h-24 rounded-full object-cover border-2 border-gray-200">
                                <p class="text-xs text-gray-400 mt-1 text-center">Preview</p>
                            </div>
                        </div>
                    </div>
                    @error('photo')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Checkboxes --}}
                <div class="md:col-span-2">
                    <div class="flex flex-wrap gap-6">
                        <label class="flex items-center space-x-3 cursor-pointer">
                            <input type="checkbox" name="is_head" value="1" {{ old('is_head') ? 'checked' : '' }}
                                class="w-4 h-4 text-green-600 border-gray-300 rounded focus:ring-green-500">
                            <div>
                                <span class="text-sm font-medium text-gray-700">Tandai sebagai Kepala Desa</span>
                                <p class="text-xs text-gray-400">Centang jika perangkat ini adalah kepala desa</p>
                            </div>
                        </label>

                        <label class="flex items-center space-x-3 cursor-pointer">
                            <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                                class="w-4 h-4 text-green-600 border-gray-300 rounded focus:ring-green-500">
                            <div>
                                <span class="text-sm font-medium text-gray-700">Status Aktif</span>
                                <p class="text-xs text-gray-400">Tampilkan perangkat ini di halaman publik</p>
                            </div>
                        </label>
                    </div>
                </div>

            </div>
        </div>

        {{-- Submit --}}
        <div class="flex items-center justify-end space-x-3 mt-6">
            <a href="{{ route('admin.officials.index') }}"
                class="px-6 py-2.5 border border-gray-300 text-gray-600 rounded-xl text-sm font-medium hover:bg-gray-50 transition-colors">
                Batal
            </a>
            <button type="submit"
                class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2.5 rounded-xl transition-colors duration-200 flex items-center space-x-2 text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                <span>Simpan</span>
            </button>
        </div>

    </form>
</div>

@push('scripts')
<script>
function previewPhoto(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('photo_preview').src = e.target.result;
            document.getElementById('photo_preview_container').classList.remove('hidden');
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endpush
@endsection

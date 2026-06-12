@extends('layouts.admin')

@section('title', 'Profil Desa')
@section('page_title', 'Profil Desa')

@section('content')
<div class="space-y-6">

    {{-- Breadcrumb --}}
    <div class="flex items-center space-x-2 text-sm text-gray-500">
        <a href="{{ route('admin.dashboard') }}" class="hover:text-green-600">Dashboard</a>
        <span>/</span>
        <span class="text-gray-700 font-medium">Profil Desa</span>
    </div>

    {{-- Flash Message --}}
    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-xl flex items-center space-x-2">
            <svg class="w-5 h-5 text-green-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Informasi Utama --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 mb-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-5 pb-3 border-b border-gray-100">Informasi Utama</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Desa <span class="text-red-500">*</span></label>
                    <input type="text" name="village_name" value="{{ old('village_name', $profile->village_name ?? '') }}"
                        class="w-full border border-gray-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('village_name') border-red-400 @enderror">
                    @error('village_name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tagline</label>
                    <input type="text" name="tagline" value="{{ old('tagline', $profile->tagline ?? '') }}"
                        class="w-full border border-gray-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('tagline') border-red-400 @enderror"
                        placeholder="Slogan atau motto desa">
                    @error('tagline')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                    <input type="text" name="address" value="{{ old('address', $profile->address ?? '') }}"
                        class="w-full border border-gray-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('address') border-red-400 @enderror">
                    @error('address')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon</label>
                    <input type="text" name="phone" value="{{ old('phone', $profile->phone ?? '') }}"
                        class="w-full border border-gray-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('phone') border-red-400 @enderror">
                    @error('phone')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email', $profile->email ?? '') }}"
                        class="w-full border border-gray-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('email') border-red-400 @enderror">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

            </div>
        </div>

        {{-- Sejarah, Visi & Misi --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 mb-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-5 pb-3 border-b border-gray-100">Sejarah, Visi & Misi</h2>
            <div class="space-y-5">

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Sejarah Desa</label>
                    <textarea name="history" rows="5"
                        class="w-full border border-gray-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('history') border-red-400 @enderror"
                        placeholder="Tulis sejarah desa...">{{ old('history', $profile->history ?? '') }}</textarea>
                    @error('history')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Visi</label>
                    <textarea name="vision" rows="3"
                        class="w-full border border-gray-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('vision') border-red-400 @enderror"
                        placeholder="Visi desa...">{{ old('vision', $profile->vision ?? '') }}</textarea>
                    @error('vision')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Misi</label>
                    <textarea name="mission" rows="5"
                        class="w-full border border-gray-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('mission') border-red-400 @enderror"
                        placeholder="Misi desa (bisa ditulis poin per baris)...">{{ old('mission', $profile->mission ?? '') }}</textarea>
                    @error('mission')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

            </div>
        </div>

        {{-- Data Geografis --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 mb-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-5 pb-3 border-b border-gray-100">Data Geografis</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Luas Wilayah (ha)</label>
                    <input type="text" name="area" value="{{ old('area', $profile->area ?? '') }}"
                        class="w-full border border-gray-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('area') border-red-400 @enderror"
                        placeholder="Contoh: 1250.5">
                    @error('area')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Ketinggian (mdpl)</label>
                    <input type="text" name="altitude" value="{{ old('altitude', $profile->altitude ?? '') }}"
                        class="w-full border border-gray-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('altitude') border-red-400 @enderror"
                        placeholder="Contoh: 750">
                    @error('altitude')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Batas Utara</label>
                    <input type="text" name="north_border" value="{{ old('north_border', $profile->north_border ?? '') }}"
                        class="w-full border border-gray-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('north_border') border-red-400 @enderror">
                    @error('north_border')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Batas Selatan</label>
                    <input type="text" name="south_border" value="{{ old('south_border', $profile->south_border ?? '') }}"
                        class="w-full border border-gray-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('south_border') border-red-400 @enderror">
                    @error('south_border')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Batas Timur</label>
                    <input type="text" name="east_border" value="{{ old('east_border', $profile->east_border ?? '') }}"
                        class="w-full border border-gray-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('east_border') border-red-400 @enderror">
                    @error('east_border')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Batas Barat</label>
                    <input type="text" name="west_border" value="{{ old('west_border', $profile->west_border ?? '') }}"
                        class="w-full border border-gray-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('west_border') border-red-400 @enderror">
                    @error('west_border')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Latitude</label>
                    <input type="text" name="latitude" value="{{ old('latitude', $profile->latitude ?? '') }}"
                        class="w-full border border-gray-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('latitude') border-red-400 @enderror"
                        placeholder="Contoh: -7.123456">
                    @error('latitude')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Longitude</label>
                    <input type="text" name="longitude" value="{{ old('longitude', $profile->longitude ?? '') }}"
                        class="w-full border border-gray-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('longitude') border-red-400 @enderror"
                        placeholder="Contoh: 110.123456">
                    @error('longitude')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

            </div>
        </div>

        {{-- Jam Operasional --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 mb-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-5 pb-3 border-b border-gray-100">Jam Operasional Kantor</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Jam Buka</label>
                    <input type="time" name="office_open" value="{{ old('office_open', $profile->office_open ?? '08:00') }}"
                        class="w-full border border-gray-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('office_open') border-red-400 @enderror">
                    @error('office_open')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Jam Tutup</label>
                    <input type="time" name="office_close" value="{{ old('office_close', $profile->office_close ?? '16:00') }}"
                        class="w-full border border-gray-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('office_close') border-red-400 @enderror">
                    @error('office_close')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

            </div>
        </div>

        {{-- Media / Gambar --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 mb-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-5 pb-3 border-b border-gray-100">Gambar</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                {{-- Hero Image --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Gambar Hero (Banner Utama)</label>
                    @if(!empty($profile->hero_image))
                        <div class="mb-3">
                            <img src="{{ Storage::url($profile->hero_image) }}" alt="Hero Image"
                                class="w-full h-40 object-cover rounded-xl border border-gray-200">
                            <p class="text-xs text-gray-400 mt-1">Gambar saat ini</p>
                        </div>
                    @endif
                    <div class="border-2 border-dashed border-gray-300 rounded-xl p-4 text-center hover:border-green-400 transition-colors">
                        <svg class="mx-auto h-8 w-8 text-gray-400 mb-2" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <label class="cursor-pointer">
                            <span class="text-green-600 hover:text-green-700 text-sm font-medium">Pilih file</span>
                            <input type="file" name="hero_image" accept="image/*" class="hidden" id="hero_image_input" onchange="previewImage(this, 'hero_preview')">
                        </label>
                        <p class="text-xs text-gray-400 mt-1">PNG, JPG, WEBP maks 2MB</p>
                    </div>
                    <img id="hero_preview" src="#" alt="Preview" class="hidden mt-2 w-full h-40 object-cover rounded-xl border border-gray-200">
                    @error('hero_image')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Village Logo --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Logo Desa</label>
                    @if(!empty($profile->village_logo))
                        <div class="mb-3 flex justify-center">
                            <img src="{{ Storage::url($profile->village_logo) }}" alt="Logo Desa"
                                class="h-32 w-32 object-contain rounded-xl border border-gray-200 p-2 bg-gray-50">
                        </div>
                        <p class="text-xs text-gray-400 mb-2 text-center">Logo saat ini</p>
                    @endif
                    <div class="border-2 border-dashed border-gray-300 rounded-xl p-4 text-center hover:border-green-400 transition-colors">
                        <svg class="mx-auto h-8 w-8 text-gray-400 mb-2" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <label class="cursor-pointer">
                            <span class="text-green-600 hover:text-green-700 text-sm font-medium">Pilih file</span>
                            <input type="file" name="village_logo" accept="image/*" class="hidden" id="logo_input" onchange="previewImage(this, 'logo_preview')">
                        </label>
                        <p class="text-xs text-gray-400 mt-1">PNG, JPG, WEBP maks 1MB</p>
                    </div>
                    <img id="logo_preview" src="#" alt="Preview" class="hidden mt-2 h-32 w-32 mx-auto object-contain rounded-xl border border-gray-200 p-2 bg-gray-50">
                    @error('village_logo')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

            </div>
        </div>

        {{-- Submit Button --}}
        <div class="flex justify-end">
            <button type="submit"
                class="bg-green-600 hover:bg-green-700 text-white font-semibold px-8 py-3 rounded-xl transition-colors duration-200 flex items-center space-x-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                <span>Simpan Perubahan</span>
            </button>
        </div>

    </form>
</div>

@push('scripts')
<script>
function previewImage(input, previewId) {
    const preview = document.getElementById(previewId);
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.classList.remove('hidden');
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endpush
@endsection

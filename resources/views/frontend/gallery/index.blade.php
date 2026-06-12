@extends('layouts.app')
@section('title', 'Galeri Desa')
@section('content')

<div class="bg-gradient-to-br from-green-700 to-emerald-800 py-16 px-4">
    <div class="max-w-7xl mx-auto text-center text-white">
        <h1 class="text-4xl sm:text-5xl font-bold mb-3">Galeri Desa Kleyang</h1>
        <p class="text-green-100 text-lg">Dokumentasi kegiatan dan momen berharga Desa Kleyang</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    {{-- Category Filter --}}
    <div class="flex flex-wrap gap-3 mb-8">
        <a href="{{ route('gallery') }}"
           class="px-5 py-2 rounded-full text-sm font-medium transition-all border {{ !$category ? 'bg-green-600 text-white border-green-600' : 'bg-white text-gray-600 border-gray-200 hover:border-green-600 hover:text-green-700' }}">
            Semua
        </a>
        @foreach($categories as $cat)
        <a href="{{ route('gallery', ['category' => $cat->slug]) }}"
           class="px-5 py-2 rounded-full text-sm font-medium transition-all border {{ $category === $cat->slug ? 'bg-green-600 text-white border-green-600' : 'bg-white text-gray-600 border-gray-200 hover:border-green-600 hover:text-green-700' }}">
            {{ $cat->name }} <span class="opacity-60">({{ $cat->galleries_count }})</span>
        </a>
        @endforeach
    </div>

    {{-- Gallery Grid --}}
    @if($galleries->count() > 0)
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach($galleries as $photo)
        <div class="group relative rounded-2xl overflow-hidden bg-gray-100 aspect-square cursor-pointer shadow-sm card-hover"
             onclick="openLightbox('{{ $photo->image ? Storage::url($photo->image) : '' }}', '{{ addslashes($photo->title) }}', '{{ addslashes($photo->description ?? '') }}')">
            @if($photo->image)
                <img src="{{ Storage::url($photo->image) }}" alt="{{ $photo->title }}"
                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
            @else
                <div class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-br from-green-50 to-emerald-100 gap-2">
                    <svg class="w-12 h-12 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <p class="text-xs text-green-500 text-center px-2">{{ $photo->title }}</p>
                </div>
            @endif
            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/50 transition-all duration-300 flex items-end p-4">
                <div class="transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                    <p class="text-white font-semibold text-sm">{{ $photo->title }}</p>
                    @if($photo->category)
                    <p class="text-white/70 text-xs mt-0.5">{{ $photo->category->name }}</p>
                    @endif
                </div>
            </div>
            <div class="absolute top-3 right-3 opacity-0 group-hover:opacity-100 transition-opacity">
                <div class="w-8 h-8 bg-white/80 rounded-full flex items-center justify-center">
                    <svg class="w-4 h-4 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/>
                    </svg>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-8">{{ $galleries->links() }}</div>
    @else
    <div class="text-center py-20 bg-white rounded-2xl border border-gray-100">
        <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
        </svg>
        <p class="text-gray-500">Belum ada foto dalam kategori ini.</p>
    </div>
    @endif
</div>

{{-- Lightbox --}}
<div id="lightbox" class="lightbox-overlay" onclick="closeLightbox()">
    <div class="relative max-w-5xl max-h-full p-4" onclick="event.stopPropagation()">
        <button onclick="closeLightbox()" class="absolute -top-12 right-0 text-white hover:text-gray-300 text-4xl font-light w-10 h-10 flex items-center justify-center">✕</button>
        <img id="lightbox-img" src="" alt="" class="max-w-full max-h-[80vh] rounded-xl shadow-2xl object-contain">
        <div class="text-center mt-4">
            <p id="lightbox-title" class="text-white font-semibold text-lg"></p>
            <p id="lightbox-desc" class="text-gray-300 text-sm mt-1"></p>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function openLightbox(src, title, desc) {
        document.getElementById('lightbox-img').src = src || 'https://placehold.co/800x600?text=No+Image';
        document.getElementById('lightbox-title').textContent = title;
        document.getElementById('lightbox-desc').textContent = desc;
        document.getElementById('lightbox').classList.add('active');
        document.body.style.overflow = 'hidden';
    }
    function closeLightbox() {
        document.getElementById('lightbox').classList.remove('active');
        document.body.style.overflow = '';
    }
    document.addEventListener('keydown', (e) => { if (e.key === 'Escape') closeLightbox(); });
</script>
@endpush
@endsection

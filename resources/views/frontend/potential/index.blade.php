@extends('layouts.app')
@section('title', 'Potensi Desa')
@section('content')

<div class="bg-gradient-to-br from-green-700 to-emerald-800 py-16 px-4">
    <div class="max-w-7xl mx-auto text-center text-white">
        <h1 class="text-4xl sm:text-5xl font-bold mb-3">Potensi Desa Kleyang</h1>
        <p class="text-green-100 text-lg">Kekayaan alam dan potensi unggulan yang dimiliki Desa Kleyang</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    {{-- Category Filter --}}
    <div class="flex flex-wrap gap-3 mb-8">
        <a href="{{ route('potential') }}"
           class="px-5 py-2 rounded-full text-sm font-medium transition-all border {{ !$category ? 'bg-green-600 text-white border-green-600 shadow-md' : 'bg-white text-gray-600 border-gray-200 hover:border-green-600 hover:text-green-700' }}">
            Semua
        </a>
        @foreach($categories as $key => $label)
        <a href="{{ route('potential', ['category' => $key]) }}"
           class="px-5 py-2 rounded-full text-sm font-medium transition-all border {{ $category === $key ? 'bg-green-600 text-white border-green-600 shadow-md' : 'bg-white text-gray-600 border-gray-200 hover:border-green-600 hover:text-green-700' }}">
            {{ $label }}
        </a>
        @endforeach
    </div>

    {{-- Potentials Grid --}}
    @if($potentials->count() > 0)
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @php
            $categoryColors = [
                'pertanian'  => 'bg-green-100 text-green-700 border-green-200',
                'peternakan' => 'bg-orange-100 text-orange-700 border-orange-200',
                'wisata'     => 'bg-blue-100 text-blue-700 border-blue-200',
                'kerajinan'  => 'bg-purple-100 text-purple-700 border-purple-200',
                'perkebunan' => 'bg-teal-100 text-teal-700 border-teal-200',
                'lainnya'    => 'bg-gray-100 text-gray-700 border-gray-200',
            ];
        @endphp
        @foreach($potentials as $potential)
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden card-hover group">
            <div class="h-52 bg-gradient-to-br from-green-50 to-emerald-50 relative overflow-hidden flex items-center justify-center">
                @if($potential->photo)
                    <img src="{{ Storage::url($potential->photo) }}" alt="{{ $potential->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                @else
                    <svg class="w-16 h-16 text-green-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                    </svg>
                @endif
                <div class="absolute top-3 left-3">
                    <span class="text-xs font-semibold px-3 py-1 rounded-full border {{ $categoryColors[$potential->category] ?? $categoryColors['lainnya'] }}">
                        {{ $potential->category_label }}
                    </span>
                </div>
            </div>
            <div class="p-6">
                <h3 class="font-bold text-gray-900 text-xl mb-2 group-hover:text-green-700 transition-colors">{{ $potential->name }}</h3>
                <p class="text-gray-500 text-sm leading-relaxed mb-4">{{ $potential->description }}</p>
                @if($potential->benefit)
                <div class="bg-green-50 border border-green-100 rounded-xl p-4">
                    <p class="text-xs font-semibold text-green-700 uppercase tracking-wide mb-1">Manfaat</p>
                    <p class="text-sm text-gray-600">{{ $potential->benefit }}</p>
                </div>
                @endif
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="text-center py-20">
        <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
        <p class="text-gray-500">Tidak ada potensi desa untuk kategori ini.</p>
    </div>
    @endif

    {{-- UMKM CTA --}}
    <div class="mt-16 bg-gradient-to-br from-orange-50 to-amber-50 border border-orange-100 rounded-2xl p-8 text-center">
        <h2 class="text-2xl font-bold text-gray-900 mb-3">UMKM Desa Kleyang</h2>
        <p class="text-gray-600 mb-6">Temukan produk-produk unggulan dari UMKM lokal Desa Kleyang</p>
        <a href="{{ route('umkm') }}"
           class="inline-flex items-center gap-2 bg-orange-500 hover:bg-orange-600 text-white font-semibold px-6 py-3 rounded-xl transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
            </svg>
            Lihat UMKM Desa
        </a>
    </div>
</div>
@endsection

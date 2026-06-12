@extends('layouts.app')

@section('title', 'Beranda')
@section('meta_description', 'Website Resmi Desa Kleyang, Kecamatan Mojotengah, Kabupaten Wonosobo. Maju, Berdaya, dan Sejahtera Bersama.')

@section('content')

{{-- ============================
     HERO SECTION
     ============================ --}}
<section class="relative min-h-screen flex items-center overflow-hidden bg-gray-900">
    {{-- Background --}}
    <div class="absolute inset-0">
        <div class="absolute inset-0 bg-gradient-to-br from-green-900/90 via-green-800/80 to-emerald-900/90 z-10"></div>
        {{-- Animated background shapes --}}
        <div class="absolute top-20 right-20 w-96 h-96 bg-green-500/20 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-20 left-20 w-72 h-72 bg-emerald-400/15 rounded-full blur-3xl animate-pulse" style="animation-delay:1s"></div>
        {{-- Grid pattern --}}
        <div class="absolute inset-0 opacity-10 z-10" style="background-image:url(\"data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E\")"></div>
    </div>

    <div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 w-full">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div class="text-white">
                <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm border border-white/20 rounded-full px-4 py-2 mb-6">
                    <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                    <span class="text-sm text-green-100">Website Resmi Desa Kleyang</span>
                </div>
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold leading-tight mb-6">
                    <span class="text-white">Selamat Datang di</span><br>
                    <span class="text-green-400">Desa Kleyang</span>
                </h1>
                <p class="text-green-100/90 text-lg sm:text-xl leading-relaxed mb-8 max-w-lg">
                    {{ $profile->tagline ?? 'Maju, Berdaya, dan Sejahtera Bersama' }} — Kecamatan Mojotengah, Kabupaten Wonosobo, Jawa Tengah.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('profile') }}"
                       class="inline-flex items-center gap-2 bg-green-500 hover:bg-green-400 text-white font-semibold px-6 py-3.5 rounded-xl transition-all duration-300 shadow-lg hover:shadow-green-500/30 hover:-translate-y-0.5">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                        Profil Desa
                    </a>
                    <a href="{{ route('potential') }}"
                       class="inline-flex items-center gap-2 bg-white/10 hover:bg-white/20 backdrop-blur-sm border border-white/30 text-white font-semibold px-6 py-3.5 rounded-xl transition-all duration-300 hover:-translate-y-0.5">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                        </svg>
                        Potensi Desa
                    </a>
                </div>
            </div>

            {{-- Stats cards floating --}}
            <div class="hidden lg:grid grid-cols-2 gap-4">
                @php
                    $heroStats = [
                        ['value' => number_format($statistics->total_population ?? 3842), 'label' => 'Total Penduduk', 'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z', 'color' => 'from-blue-500 to-blue-600', 'delay' => '0'],
                        ['value' => ($statistics->total_dusun ?? 4), 'label' => 'Jumlah Dusun', 'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6', 'color' => 'from-purple-500 to-purple-600', 'delay' => '0.1s'],
                        ['value' => ($statistics->total_umkm ?? 45), 'label' => 'Jumlah UMKM', 'icon' => 'M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z', 'color' => 'from-orange-500 to-orange-600', 'delay' => '0.2s'],
                        ['value' => number_format($profile->area ?? 245.5) . ' Ha', 'label' => 'Luas Wilayah', 'icon' => 'M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7', 'color' => 'from-teal-500 to-teal-600', 'delay' => '0.3s'],
                    ];
                @endphp
                @foreach($heroStats as $stat)
                <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-5 hover:bg-white/15 transition-all duration-300 card-hover"
                     style="animation-delay: {{ $stat['delay'] }}">
                    <div class="w-10 h-10 bg-gradient-to-br {{ $stat['color'] }} rounded-xl flex items-center justify-center mb-3">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $stat['icon'] }}"/>
                        </svg>
                    </div>
                    <p class="text-2xl font-bold text-white">{{ $stat['value'] }}</p>
                    <p class="text-green-200 text-sm mt-1">{{ $stat['label'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Scroll indicator --}}
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-20 animate-bounce">
        <div class="w-8 h-12 border-2 border-white/30 rounded-full flex items-start justify-center pt-2">
            <div class="w-1.5 h-3 bg-white/60 rounded-full animate-pulse"></div>
        </div>
    </div>
</section>

{{-- ============================
     STATISTICS SECTION (Mobile)
     ============================ --}}
<section class="lg:hidden py-8 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid grid-cols-2 gap-4">
            @foreach($heroStats as $stat)
            <div class="bg-green-50 rounded-xl p-4 text-center">
                <p class="text-2xl font-bold text-green-700">{{ $stat['value'] }}</p>
                <p class="text-gray-600 text-sm mt-1">{{ $stat['label'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============================
     WELCOME/HEADMAN SECTION
     ============================ --}}
@if($headman)
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div class="order-2 lg:order-1">
                <div class="inline-flex items-center gap-2 bg-green-50 text-green-700 font-medium px-4 py-2 rounded-full text-sm mb-4 border border-green-100">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    Sambutan Kepala Desa
                </div>
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-3">{{ $headman->name }}</h2>
                <p class="text-green-600 font-semibold mb-6">{{ $headman->position }}</p>
                <blockquote class="relative">
                    <svg class="w-10 h-10 text-green-200 mb-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                    </svg>
                    <p class="text-gray-600 leading-relaxed text-lg italic">
                        {{ $headman->description ?? 'Kami berkomitmen untuk terus melayani masyarakat Desa Kleyang dengan sepenuh hati. Bersama-sama, kita wujudkan desa yang maju, mandiri, dan sejahtera untuk generasi mendatang.' }}
                    </p>
                </blockquote>
                <div class="mt-6 flex items-center gap-3">
                    <div class="w-12 h-0.5 bg-green-600"></div>
                    <span class="text-gray-500 text-sm">{{ $headman->name }}</span>
                </div>
            </div>
            <div class="order-1 lg:order-2 flex justify-center">
                <div class="relative">
                    <div class="w-72 h-80 rounded-2xl bg-gradient-to-br from-green-100 to-emerald-50 overflow-hidden shadow-xl">
                        @if($headman->photo)
                            <img src="{{ Storage::url($headman->photo) }}" alt="{{ $headman->name }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center flex-col gap-4">
                                <div class="w-24 h-24 bg-green-200 rounded-full flex items-center justify-center">
                                    <svg class="w-14 h-14 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                                <p class="text-green-700 font-semibold">{{ $headman->name }}</p>
                            </div>
                        @endif
                    </div>
                    {{-- Decoration --}}
                    <div class="absolute -bottom-4 -right-4 w-24 h-24 bg-green-600 rounded-2xl -z-10 opacity-20"></div>
                    <div class="absolute -top-4 -left-4 w-16 h-16 bg-emerald-400 rounded-xl -z-10 opacity-20"></div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

{{-- ============================
     POTENTIALS SECTION
     ============================ --}}
@if($potentials->count() > 0)
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <div class="inline-flex items-center gap-2 bg-green-50 text-green-700 font-medium px-4 py-2 rounded-full text-sm mb-4 border border-green-100">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                </svg>
                Keunggulan Kami
            </div>
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">Potensi Unggulan Desa</h2>
            <p class="text-gray-500 max-w-2xl mx-auto">Berbagai potensi alam, pertanian, peternakan, dan wisata yang menjadi kekuatan Desa Kleyang</p>
        </div>

        @php
            $categoryColors = [
                'pertanian'  => ['bg' => 'bg-green-100', 'text' => 'text-green-700', 'border' => 'border-green-200'],
                'peternakan' => ['bg' => 'bg-orange-100', 'text' => 'text-orange-700', 'border' => 'border-orange-200'],
                'wisata'     => ['bg' => 'bg-blue-100', 'text' => 'text-blue-700', 'border' => 'border-blue-200'],
                'kerajinan'  => ['bg' => 'bg-purple-100', 'text' => 'text-purple-700', 'border' => 'border-purple-200'],
                'perkebunan' => ['bg' => 'bg-teal-100', 'text' => 'text-teal-700', 'border' => 'border-teal-200'],
                'lainnya'    => ['bg' => 'bg-gray-100', 'text' => 'text-gray-700', 'border' => 'border-gray-200'],
            ];
        @endphp

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($potentials as $potential)
            @php $colors = $categoryColors[$potential->category] ?? $categoryColors['lainnya']; @endphp
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden card-hover group">
                <div class="h-44 bg-gradient-to-br from-green-50 to-emerald-50 relative overflow-hidden flex items-center justify-center">
                    @if($potential->photo)
                        <img src="{{ Storage::url($potential->photo) }}" alt="{{ $potential->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    @else
                        <svg class="w-16 h-16 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                        </svg>
                    @endif
                    <div class="absolute top-3 left-3">
                        <span class="inline-block {{ $colors['bg'] }} {{ $colors['text'] }} border {{ $colors['border'] }} text-xs font-semibold px-3 py-1 rounded-full">
                            {{ $potential->category_label }}
                        </span>
                    </div>
                </div>
                <div class="p-5">
                    <h3 class="font-bold text-gray-900 text-lg mb-2 group-hover:text-green-700 transition-colors">{{ $potential->name }}</h3>
                    <p class="text-gray-500 text-sm leading-relaxed line-clamp-2">{{ $potential->description }}</p>
                    @if($potential->benefit)
                    <div class="mt-3 flex items-start gap-2">
                        <svg class="w-4 h-4 text-green-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <p class="text-xs text-gray-500 leading-relaxed">{{ Str::limit($potential->benefit, 80) }}</p>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-10">
            <a href="{{ route('potential') }}"
               class="inline-flex items-center gap-2 border-2 border-green-600 text-green-700 hover:bg-green-600 hover:text-white font-semibold px-8 py-3 rounded-xl transition-all duration-300">
                Lihat Semua Potensi
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </div>
</section>
@endif

{{-- ============================
     LATEST NEWS
     ============================ --}}
@if($latestNews->count() > 0)
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-end justify-between mb-12">
            <div>
                <div class="inline-flex items-center gap-2 bg-green-50 text-green-700 font-medium px-4 py-2 rounded-full text-sm mb-4 border border-green-100">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                    </svg>
                    Berita Terkini
                </div>
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900">Berita & Kegiatan</h2>
            </div>
            <a href="{{ route('news') }}" class="hidden sm:flex items-center gap-2 text-green-700 hover:text-green-800 font-medium transition-colors">
                Lihat Semua
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>

        <div class="grid md:grid-cols-3 gap-6">
            @foreach($latestNews as $index => $article)
            <article class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden card-hover group {{ $index === 0 ? 'md:col-span-1' : '' }}">
                <div class="h-52 bg-gradient-to-br from-gray-100 to-gray-200 relative overflow-hidden">
                    @if($article->thumbnail)
                        <img src="{{ Storage::url($article->thumbnail) }}" alt="{{ $article->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-green-50 to-emerald-50">
                            <svg class="w-16 h-16 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                            </svg>
                        </div>
                    @endif
                    @if($article->category)
                    <div class="absolute top-3 left-3">
                        <span class="inline-block bg-white/90 backdrop-blur-sm text-xs font-semibold px-3 py-1 rounded-full" style="color: {{ $article->category->color }}">
                            {{ $article->category->name }}
                        </span>
                    </div>
                    @endif
                </div>
                <div class="p-5">
                    <div class="flex items-center gap-3 text-xs text-gray-400 mb-3">
                        <span class="flex items-center gap-1">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            {{ $article->published_at?->format('d M Y') }}
                        </span>
                        <span>•</span>
                        <span>{{ $article->author }}</span>
                    </div>
                    <h3 class="font-bold text-gray-900 text-lg leading-snug mb-2 group-hover:text-green-700 transition-colors line-clamp-2">
                        <a href="{{ route('news.show', $article->slug) }}">{{ $article->title }}</a>
                    </h3>
                    <p class="text-gray-500 text-sm leading-relaxed line-clamp-2 mb-4">{{ $article->excerpt }}</p>
                    <a href="{{ route('news.show', $article->slug) }}"
                       class="inline-flex items-center gap-1.5 text-green-700 hover:text-green-800 font-medium text-sm transition-colors">
                        Baca Selengkapnya
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
            </article>
            @endforeach
        </div>

        <div class="text-center mt-8 sm:hidden">
            <a href="{{ route('news') }}" class="inline-flex items-center gap-2 text-green-700 font-medium">
                Lihat Semua Berita
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </div>
</section>
@endif

{{-- ============================
     GALLERY PREVIEW
     ============================ --}}
@if($galleries->count() > 0)
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-end justify-between mb-12">
            <div>
                <div class="inline-flex items-center gap-2 bg-green-50 text-green-700 font-medium px-4 py-2 rounded-full text-sm mb-4 border border-green-100">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    Galeri Desa
                </div>
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900">Foto Kegiatan Desa</h2>
            </div>
            <a href="{{ route('gallery') }}" class="hidden sm:flex items-center gap-2 text-green-700 hover:text-green-800 font-medium">
                Lihat Semua
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach($galleries as $photo)
            <div class="group relative rounded-xl overflow-hidden bg-gray-200 aspect-square cursor-pointer"
                 onclick="openLightbox('{{ $photo->image ? Storage::url($photo->image) : '' }}', '{{ addslashes($photo->title) }}')">
                @if($photo->image)
                    <img src="{{ Storage::url($photo->image) }}" alt="{{ $photo->title }}"
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                @else
                    <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-green-50 to-emerald-100">
                        <svg class="w-10 h-10 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                @endif
                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/40 transition-all duration-300 flex items-end">
                    <div class="p-3 translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                        <p class="text-white text-sm font-medium">{{ $photo->title }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ============================
     MAP SECTION
     ============================ --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <div class="inline-flex items-center gap-2 bg-green-50 text-green-700 font-medium px-4 py-2 rounded-full text-sm mb-4 border border-green-100">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                Lokasi Desa
            </div>
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">Lokasi Desa Kleyang</h2>
            <p class="text-gray-500">Kecamatan Mojotengah, Kabupaten Wonosobo, Jawa Tengah</p>
        </div>
        <div class="rounded-2xl overflow-hidden shadow-xl border border-gray-200 h-80 sm:h-96">
            <div id="map" class="w-full h-full"></div>
        </div>
    </div>
</section>

{{-- ============================
     CTA SECTION
     ============================ --}}
<section class="py-20 bg-gradient-to-br from-green-600 to-emerald-700">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl sm:text-4xl font-bold text-white mb-4">Punya Pertanyaan atau Saran?</h2>
        <p class="text-green-100 text-lg mb-8 max-w-2xl mx-auto">
            Kami siap mendengar dan melayani Anda. Hubungi kami melalui form kontak atau kunjungi kantor desa kami.
        </p>
        <a href="{{ route('contact') }}"
           class="inline-flex items-center gap-2 bg-white text-green-700 hover:bg-green-50 font-bold px-8 py-4 rounded-xl transition-all duration-300 shadow-lg hover:shadow-white/20 hover:-translate-y-0.5">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
            Hubungi Kami Sekarang
        </a>
    </div>
</section>

{{-- Lightbox --}}
<div id="lightbox" class="lightbox-overlay" onclick="closeLightbox()">
    <div class="relative max-w-4xl max-h-full p-4" onclick="event.stopPropagation()">
        <button onclick="closeLightbox()" class="absolute -top-10 right-0 text-white hover:text-gray-300 text-3xl font-light">✕</button>
        <img id="lightbox-img" src="" alt="" class="max-w-full max-h-screen rounded-xl shadow-2xl">
        <p id="lightbox-title" class="text-white text-center mt-3 text-sm"></p>
    </div>
</div>

@endsection

@push('head')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
@endpush

@push('scripts')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    // Leaflet Map
    const lat = {{ $profile->latitude ?? -7.3614 }};
    const lng = {{ $profile->longitude ?? 109.9112 }};

    const map = L.map('map').setView([lat, lng], 14);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    const greenIcon = L.divIcon({
        className: '',
        html: '<div style="background:#1D401F;width:32px;height:32px;border-radius:50% 50% 50% 0;transform:rotate(-45deg);border:3px solid white;box-shadow:0 4px 12px rgba(0,0,0,0.3)"></div>',
        iconSize: [32, 32],
        iconAnchor: [16, 32],
    });

    L.marker([lat, lng], { icon: greenIcon })
        .addTo(map)
        .bindPopup('<b>Desa Kleyang</b><br>Kec. Mojotengah, Wonosobo')
        .openPopup();

    // Lightbox
    function openLightbox(src, title) {
        const lb = document.getElementById('lightbox');
        document.getElementById('lightbox-img').src = src || 'https://via.placeholder.com/800x600?text=No+Image';
        document.getElementById('lightbox-title').textContent = title;
        lb.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
        document.getElementById('lightbox').classList.remove('active');
        document.body.style.overflow = '';
    }

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeLightbox();
    });
</script>
@endpush

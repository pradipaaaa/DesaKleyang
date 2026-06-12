@extends('layouts.app')
@section('title', 'Pemerintahan Desa')
@section('content')

<div class="bg-gradient-to-br from-green-700 to-emerald-800 py-16 px-4">
    <div class="max-w-7xl mx-auto text-center text-white">
        <h1 class="text-4xl sm:text-5xl font-bold mb-3">Pemerintahan Desa</h1>
        <p class="text-green-100 text-lg">Struktur organisasi dan perangkat Desa Kleyang</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    {{-- Kepala Desa --}}
    @if($headman)
    <section class="mb-12">
        <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
            <div class="w-8 h-0.5 bg-green-600"></div>Kepala Desa
        </h2>
        <div class="bg-gradient-to-br from-green-600 to-emerald-700 rounded-2xl p-8 text-white flex flex-col sm:flex-row items-center gap-8">
            <div class="flex-shrink-0">
                <div class="w-36 h-36 rounded-2xl bg-white/20 overflow-hidden">
                    @if($headman->photo)
                        <img src="{{ Storage::url($headman->photo) }}" alt="{{ $headman->name }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center">
                            <svg class="w-20 h-20 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                    @endif
                </div>
            </div>
            <div>
                <p class="text-green-200 text-sm uppercase tracking-wider font-medium mb-1">{{ $headman->position }}</p>
                <h3 class="text-3xl font-bold mb-3">{{ $headman->name }}</h3>
                @if($headman->description)
                <p class="text-green-100/90 leading-relaxed max-w-2xl">{{ $headman->description }}</p>
                @endif
                @if($headman->phone)
                <div class="mt-4 flex items-center gap-2 text-green-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                    <span class="text-sm">{{ $headman->phone }}</span>
                </div>
                @endif
            </div>
        </div>
    </section>
    @endif

    {{-- Struktur Organisasi --}}
    @if($orgStructures->count() > 0)
    <section class="mb-12">
        <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
            <div class="w-8 h-0.5 bg-green-600"></div>Struktur Organisasi
        </h2>
        @foreach($orgStructures as $structure)
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 mb-4">
            <h3 class="font-bold text-gray-800 mb-4">{{ $structure->title }}</h3>
            <img src="{{ Storage::url($structure->image) }}" alt="{{ $structure->title }}" class="w-full rounded-xl border border-gray-100">
        </div>
        @endforeach
    </section>
    @endif

    {{-- Perangkat Desa --}}
    @if($officials->count() > 0)
    <section>
        <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
            <div class="w-8 h-0.5 bg-green-600"></div>Perangkat Desa
        </h2>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">
            @foreach($officials->where('is_head', false) as $official)
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden card-hover group text-center p-6">
                <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-green-50 to-emerald-50 mx-auto mb-4 overflow-hidden">
                    @if($official->photo)
                        <img src="{{ Storage::url($official->photo) }}" alt="{{ $official->name }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center">
                            <svg class="w-10 h-10 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                    @endif
                </div>
                <h3 class="font-bold text-gray-900 mb-1 group-hover:text-green-700 transition-colors">{{ $official->name }}</h3>
                <p class="text-sm text-green-600 font-medium mb-2">{{ $official->position }}</p>
                @if($official->phone)
                <p class="text-xs text-gray-400">{{ $official->phone }}</p>
                @endif
            </div>
            @endforeach
        </div>
    </section>
    @endif
</div>
@endsection

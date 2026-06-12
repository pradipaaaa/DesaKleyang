@extends('layouts.app')
@section('title', 'UMKM Desa')
@section('content')

<div class="bg-gradient-to-br from-orange-600 to-amber-700 py-16 px-4">
    <div class="max-w-7xl mx-auto text-center text-white">
        <h1 class="text-4xl sm:text-5xl font-bold mb-3">UMKM Desa Kleyang</h1>
        <p class="text-orange-100 text-lg">Produk-produk unggulan dari pelaku usaha lokal Desa Kleyang</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    {{-- Search --}}
    <div class="mb-8">
        <form action="{{ route('umkm') }}" method="GET">
            <div class="flex gap-3 max-w-md">
                <div class="relative flex-1">
                    <input type="text" name="search" value="{{ $search }}" placeholder="Cari UMKM, produk, atau pemilik..."
                           class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent outline-none text-sm">
                    <svg class="absolute left-3 top-3.5 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-5 py-3 rounded-xl font-medium transition-colors">Cari</button>
                @if($search)
                <a href="{{ route('umkm') }}" class="px-4 py-3 border border-gray-200 rounded-xl text-gray-600 hover:bg-gray-50 transition-colors text-sm">Reset</a>
                @endif
            </div>
        </form>
    </div>

    @if($umkms->count() > 0)
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($umkms as $umkm)
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden card-hover group">
            <div class="h-48 bg-gradient-to-br from-orange-50 to-amber-50 relative overflow-hidden flex items-center justify-center">
                @if($umkm->photo)
                    <img src="{{ Storage::url($umkm->photo) }}" alt="{{ $umkm->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                @else
                    <svg class="w-16 h-16 text-orange-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                @endif
            </div>
            <div class="p-5">
                <h3 class="font-bold text-gray-900 text-lg mb-1 group-hover:text-orange-600 transition-colors">{{ $umkm->name }}</h3>
                <p class="text-orange-600 text-sm font-medium mb-1">{{ $umkm->product }}</p>
                <p class="text-gray-400 text-xs mb-3">Pemilik: {{ $umkm->owner }}</p>
                @if($umkm->description)
                <p class="text-gray-500 text-sm leading-relaxed mb-4 line-clamp-2">{{ $umkm->description }}</p>
                @endif
                @if($umkm->address)
                <div class="flex items-start gap-2 mb-3 text-gray-400">
                    <svg class="w-4 h-4 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <span class="text-xs">{{ $umkm->address }}</span>
                </div>
                @endif
                @if($umkm->whatsapp)
                <a href="{{ $umkm->whatsapp_link }}" target="_blank"
                   class="w-full flex items-center justify-center gap-2 bg-green-600 hover:bg-green-700 text-white text-sm font-medium py-2.5 px-4 rounded-xl transition-colors">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>
                    Hubungi via WhatsApp
                </a>
                @endif
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-8">
        {{ $umkms->links() }}
    </div>
    @else
    <div class="text-center py-20">
        <p class="text-gray-500">Tidak ada UMKM ditemukan.</p>
        <a href="{{ route('umkm') }}" class="mt-4 inline-block text-green-700 hover:text-green-800 font-medium">Reset Pencarian</a>
    </div>
    @endif
</div>
@endsection

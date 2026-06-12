@extends('layouts.app')
@section('title', 'Berita & Kegiatan')
@section('content')

<div class="bg-gradient-to-br from-green-700 to-emerald-800 py-16 px-4">
    <div class="max-w-7xl mx-auto text-center text-white">
        <h1 class="text-4xl sm:text-5xl font-bold mb-3">Berita & Kegiatan</h1>
        <p class="text-green-100 text-lg">Informasi terkini seputar Desa Kleyang</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="flex flex-col lg:flex-row gap-8">

        {{-- Main Content --}}
        <div class="flex-1">
            {{-- Search --}}
            <div class="mb-6">
                <form action="{{ route('news') }}" method="GET" class="flex gap-3">
                    @if($category)
                    <input type="hidden" name="category" value="{{ $category }}">
                    @endif
                    <div class="relative flex-1">
                        <input type="text" name="search" value="{{ $search }}" placeholder="Cari berita..."
                               class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 outline-none text-sm">
                        <svg class="absolute left-3 top-3.5 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-5 py-3 rounded-xl font-medium transition-colors">Cari</button>
                    @if($search || $category)
                    <a href="{{ route('news') }}" class="px-4 py-3 border border-gray-200 rounded-xl text-gray-600 hover:bg-gray-50 text-sm flex items-center">Reset</a>
                    @endif
                </form>
            </div>

            @if($news->count() > 0)
            <div class="grid sm:grid-cols-2 xl:grid-cols-3 gap-6">
                @foreach($news as $article)
                <article class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden card-hover group">
                    <div class="h-48 bg-gradient-to-br from-gray-100 to-gray-200 relative overflow-hidden">
                        @if($article->thumbnail)
                            <img src="{{ Storage::url($article->thumbnail) }}" alt="{{ $article->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-green-50 to-emerald-50">
                                <svg class="w-12 h-12 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                                </svg>
                            </div>
                        @endif
                        @if($article->category)
                        <div class="absolute top-3 left-3">
                            <span class="bg-white/90 text-xs font-semibold px-3 py-1 rounded-full" style="color: {{ $article->category->color }}">
                                {{ $article->category->name }}
                            </span>
                        </div>
                        @endif
                    </div>
                    <div class="p-5">
                        <div class="flex items-center gap-2 text-xs text-gray-400 mb-2">
                            <span>{{ $article->published_at?->format('d M Y') }}</span>
                            <span>•</span>
                            <span>{{ $article->views }} views</span>
                        </div>
                        <h3 class="font-bold text-gray-900 leading-snug mb-2 group-hover:text-green-700 transition-colors line-clamp-2">
                            <a href="{{ route('news.show', $article->slug) }}">{{ $article->title }}</a>
                        </h3>
                        <p class="text-gray-500 text-sm line-clamp-2 mb-4">{{ $article->excerpt }}</p>
                        <a href="{{ route('news.show', $article->slug) }}" class="text-green-700 hover:text-green-800 font-medium text-sm flex items-center gap-1">
                            Baca Selengkapnya
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                    </div>
                </article>
                @endforeach
            </div>
            <div class="mt-8">{{ $news->links() }}</div>
            @else
            <div class="text-center py-20 bg-white rounded-2xl border border-gray-100">
                <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <p class="text-gray-500">Tidak ada berita ditemukan.</p>
            </div>
            @endif
        </div>

        {{-- Sidebar Categories --}}
        <aside class="w-full lg:w-64 flex-shrink-0">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5 sticky top-20">
                <h3 class="font-bold text-gray-900 mb-4">Kategori Berita</h3>
                <div class="space-y-2">
                    <a href="{{ route('news', $search ? ['search' => $search] : []) }}"
                       class="flex items-center justify-between px-3 py-2 rounded-lg text-sm transition-colors {{ !$category ? 'bg-green-50 text-green-700 font-medium' : 'text-gray-600 hover:bg-gray-50' }}">
                        <span>Semua Kategori</span>
                        <span class="text-xs bg-gray-100 text-gray-500 px-2 py-0.5 rounded-full">{{ $news->total() }}</span>
                    </a>
                    @foreach($categories as $cat)
                    <a href="{{ route('news', array_merge($search ? ['search' => $search] : [], ['category' => $cat->slug])) }}"
                       class="flex items-center justify-between px-3 py-2 rounded-lg text-sm transition-colors {{ $category === $cat->slug ? 'bg-green-50 text-green-700 font-medium' : 'text-gray-600 hover:bg-gray-50' }}">
                        <span class="flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full flex-shrink-0" style="background: {{ $cat->color }}"></span>
                            {{ $cat->name }}
                        </span>
                        <span class="text-xs bg-gray-100 text-gray-500 px-2 py-0.5 rounded-full">{{ $cat->news_count }}</span>
                    </a>
                    @endforeach
                </div>
            </div>
        </aside>
    </div>
</div>
@endsection

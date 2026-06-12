@extends('layouts.app')
@section('title', $news->title)
@section('meta_description', $news->excerpt)
@section('content')

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    {{-- Breadcrumb --}}
    <nav class="flex items-center gap-2 text-sm text-gray-500 mb-8">
        <a href="{{ route('home') }}" class="hover:text-green-700 transition-colors">Beranda</a>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        <a href="{{ route('news') }}" class="hover:text-green-700 transition-colors">Berita</a>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        <span class="text-gray-700 truncate max-w-xs">{{ $news->title }}</span>
    </nav>

    <article class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        {{-- Thumbnail --}}
        @if($news->thumbnail)
        <div class="h-72 sm:h-96 overflow-hidden">
            <img src="{{ Storage::url($news->thumbnail) }}" alt="{{ $news->title }}" class="w-full h-full object-cover">
        </div>
        @endif

        <div class="p-8">
            {{-- Category & Date --}}
            <div class="flex flex-wrap items-center gap-3 mb-4">
                @if($news->category)
                <span class="text-sm font-semibold px-3 py-1 rounded-full border" style="color: {{ $news->category->color }}; border-color: {{ $news->category->color }}; background: {{ $news->category->color }}15">
                    {{ $news->category->name }}
                </span>
                @endif
                <span class="text-sm text-gray-500 flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    {{ $news->published_at?->format('d F Y') }}
                </span>
                <span class="text-sm text-gray-500">oleh {{ $news->author }}</span>
                <span class="text-sm text-gray-500 flex items-center gap-1 ml-auto">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    {{ $news->views }} views
                </span>
            </div>

            <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 leading-tight mb-6">{{ $news->title }}</h1>

            @if($news->excerpt)
            <p class="text-lg text-gray-600 leading-relaxed border-l-4 border-green-500 pl-4 mb-8 italic">{{ $news->excerpt }}</p>
            @endif

            <div class="prose-village">
                {!! nl2br(e($news->content)) !!}
            </div>
        </div>
    </article>

    {{-- Navigation --}}
    <div class="flex items-center justify-between mt-8">
        <a href="{{ route('news') }}" class="flex items-center gap-2 text-green-700 hover:text-green-800 font-medium transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            Kembali ke Berita
        </a>
    </div>

    {{-- Related News --}}
    @if($relatedNews->count() > 0)
    <div class="mt-12">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Berita Terkait</h2>
        <div class="grid sm:grid-cols-3 gap-5">
            @foreach($relatedNews as $related)
            <a href="{{ route('news.show', $related->slug) }}" class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden card-hover group block">
                <div class="h-36 bg-gradient-to-br from-green-50 to-emerald-50 overflow-hidden">
                    @if($related->thumbnail)
                        <img src="{{ Storage::url($related->thumbnail) }}" alt="{{ $related->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    @endif
                </div>
                <div class="p-4">
                    <p class="text-xs text-gray-400 mb-1">{{ $related->published_at?->format('d M Y') }}</p>
                    <h3 class="font-semibold text-gray-900 text-sm line-clamp-2 group-hover:text-green-700 transition-colors">{{ $related->title }}</h3>
                </div>
            </a>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection

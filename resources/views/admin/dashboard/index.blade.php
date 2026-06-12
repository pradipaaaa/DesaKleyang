@extends('layouts.admin')
@section('title', 'Dashboard')
@section('page_title', 'Dashboard')
@section('page_subtitle', 'Ringkasan statistik dan aktivitas terbaru')

@section('content')
{{-- Stats Grid --}}
<div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4 mb-8">
    @php
        $statCards = [
            ['label' => 'Berita', 'value' => $stats['news'], 'icon' => 'M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z', 'color' => 'blue', 'route' => 'admin.news.index'],
            ['label' => 'Perangkat Desa', 'value' => $stats['officials'], 'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z', 'color' => 'green', 'route' => 'admin.officials.index'],
            ['label' => 'UMKM', 'value' => $stats['umkms'], 'icon' => 'M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z', 'color' => 'orange', 'route' => 'admin.umkms.index'],
            ['label' => 'Galeri', 'value' => $stats['galleries'], 'icon' => 'M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z', 'color' => 'purple', 'route' => 'admin.gallery.index'],
            ['label' => 'Pesan Masuk', 'value' => $stats['messages'], 'icon' => 'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z', 'color' => 'teal', 'route' => 'admin.messages.index'],
            ['label' => 'Belum Dibaca', 'value' => $stats['unread'], 'icon' => 'M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9', 'color' => 'red', 'route' => 'admin.messages.index'],
        ];
    @endphp

    @foreach($statCards as $card)
    <a href="{{ route($card['route']) }}" class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm hover:shadow-md transition-all duration-200 hover:-translate-y-0.5 group">
        <div class="flex items-center justify-between mb-3">
            <div class="w-10 h-10 bg-{{ $card['color'] }}-50 rounded-xl flex items-center justify-center">
                <svg class="w-5 h-5 text-{{ $card['color'] }}-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $card['icon'] }}"/>
                </svg>
            </div>
            <svg class="w-4 h-4 text-gray-300 group-hover:text-{{ $card['color'] }}-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
            </svg>
        </div>
        <p class="text-3xl font-bold text-gray-900">{{ $card['value'] }}</p>
        <p class="text-xs text-gray-500 mt-1 font-medium">{{ $card['label'] }}</p>
    </a>
    @endforeach
</div>

<div class="grid lg:grid-cols-2 gap-6">
    {{-- Latest News --}}
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
            <h2 class="font-bold text-gray-900">Berita Terbaru</h2>
            <a href="{{ route('admin.news.index') }}" class="text-sm text-green-700 hover:text-green-800 font-medium">Lihat Semua</a>
        </div>
        <div class="divide-y divide-gray-50">
            @foreach($latestNews as $article)
            <div class="px-6 py-4 hover:bg-gray-50 transition-colors">
                <div class="flex items-start justify-between gap-3">
                    <div class="flex-1 min-w-0">
                        <p class="font-medium text-gray-900 text-sm truncate">{{ $article->title }}</p>
                        <div class="flex items-center gap-2 mt-1">
                            @if($article->category)
                            <span class="text-xs px-2 py-0.5 rounded-full font-medium" style="background: {{ $article->category->color }}20; color: {{ $article->category->color }}">
                                {{ $article->category->name }}
                            </span>
                            @endif
                            <span class="text-xs text-gray-400">{{ $article->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 flex-shrink-0">
                        <a href="{{ route('admin.news.edit', $article) }}" class="text-blue-500 hover:text-blue-700">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="px-6 py-4 border-t border-gray-100">
            <a href="{{ route('admin.news.create') }}" class="w-full flex items-center justify-center gap-2 bg-green-50 hover:bg-green-100 text-green-700 font-medium py-2.5 rounded-xl text-sm transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Tambah Berita Baru
            </a>
        </div>
    </div>

    {{-- Latest Messages --}}
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
            <h2 class="font-bold text-gray-900">Pesan Terbaru</h2>
            <a href="{{ route('admin.messages.index') }}" class="text-sm text-green-700 hover:text-green-800 font-medium">Lihat Semua</a>
        </div>
        <div class="divide-y divide-gray-50">
            @forelse($latestMessages as $msg)
            <div class="px-6 py-4 hover:bg-gray-50 transition-colors">
                <div class="flex items-start gap-3">
                    <div class="w-9 h-9 rounded-full bg-green-100 flex items-center justify-center flex-shrink-0">
                        <span class="text-green-700 font-bold text-sm">{{ substr($msg->name, 0, 1) }}</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-2">
                            <p class="font-medium text-gray-900 text-sm">{{ $msg->name }}</p>
                            @if(!$msg->is_read)
                            <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                            @endif
                        </div>
                        <p class="text-xs text-gray-500 truncate">{{ $msg->message }}</p>
                        <p class="text-xs text-gray-400 mt-0.5">{{ $msg->created_at->diffForHumans() }}</p>
                    </div>
                    <a href="{{ route('admin.messages.show', $msg) }}" class="text-green-500 hover:text-green-700 flex-shrink-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    </a>
                </div>
            </div>
            @empty
            <div class="px-6 py-8 text-center text-gray-400 text-sm">Belum ada pesan masuk</div>
            @endforelse
        </div>
    </div>
</div>

{{-- Quick Actions --}}
<div class="mt-6 grid grid-cols-2 sm:grid-cols-4 gap-4">
    @php
        $actions = [
            ['label' => 'Tambah Berita', 'route' => 'admin.news.create', 'color' => 'blue', 'icon' => 'M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z'],
            ['label' => 'Upload Galeri', 'route' => 'admin.gallery.create', 'color' => 'purple', 'icon' => 'M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z'],
            ['label' => 'Tambah UMKM', 'route' => 'admin.umkms.create', 'color' => 'orange', 'icon' => 'M12 4v16m8-8H4'],
            ['label' => 'Kelola Profil', 'route' => 'admin.profile.index', 'color' => 'green', 'icon' => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z'],
        ];
    @endphp
    @foreach($actions as $action)
    <a href="{{ route($action['route']) }}"
       class="bg-{{ $action['color'] }}-50 border border-{{ $action['color'] }}-100 hover:bg-{{ $action['color'] }}-100 rounded-2xl p-5 transition-all duration-200 flex items-center gap-3 group">
        <div class="w-10 h-10 bg-{{ $action['color'] }}-100 rounded-xl flex items-center justify-center flex-shrink-0">
            <svg class="w-5 h-5 text-{{ $action['color'] }}-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $action['icon'] }}"/>
            </svg>
        </div>
        <span class="font-medium text-sm text-gray-700">{{ $action['label'] }}</span>
    </a>
    @endforeach
</div>
@endsection

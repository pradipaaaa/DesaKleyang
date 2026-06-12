@extends('layouts.app')
@section('title', 'Profil Desa')
@section('meta_description', 'Profil lengkap Desa Kleyang - sejarah, visi misi, geografis, dan demografi desa')

@section('content')
{{-- Page Header --}}
<div class="bg-gradient-to-br from-green-700 to-emerald-800 py-16 px-4">
    <div class="max-w-7xl mx-auto text-center text-white">
        <h1 class="text-4xl sm:text-5xl font-bold mb-3">Profil Desa Kleyang</h1>
        <p class="text-green-100 text-lg">Mengenal lebih dekat Desa Kleyang, Kecamatan Mojotengah, Wonosobo</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    {{-- Sejarah Desa --}}
    @if($profile && $profile->history)
    <section class="mb-12">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-900">Sejarah Desa</h2>
            </div>
            <div class="prose-village text-gray-600 leading-relaxed">
                {!! nl2br(e($profile->history)) !!}
            </div>
        </div>
    </section>
    @endif

    {{-- Visi & Misi --}}
    @if($profile && ($profile->vision || $profile->mission))
    <section class="mb-12 grid md:grid-cols-2 gap-6">
        @if($profile->vision)
        <div class="bg-gradient-to-br from-green-600 to-emerald-700 rounded-2xl p-8 text-white">
            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mb-4">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                </svg>
            </div>
            <h3 class="text-xl font-bold mb-3">Visi Desa</h3>
            <p class="text-green-100 leading-relaxed">{{ $profile->vision }}</p>
        </div>
        @endif

        @if($profile->mission)
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center mb-4">
                <svg class="w-6 h-6 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-gray-900 mb-4">Misi Desa</h3>
            <div class="text-gray-600 space-y-2">
                @foreach(explode("\n", $profile->mission) as $misi)
                    @if(trim($misi))
                    <div class="flex items-start gap-2">
                        <div class="w-5 h-5 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                            <div class="w-2 h-2 bg-green-600 rounded-full"></div>
                        </div>
                        <p class="text-sm">{{ trim($misi) }}</p>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
        @endif
    </section>
    @endif

    {{-- Kondisi Geografis --}}
    @if($profile)
    <section class="mb-12">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-900">Kondisi Geografis</h2>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                @php
                    $geoData = [
                        ['label' => 'Luas Wilayah', 'value' => ($profile->area ?? '-') . ' Ha', 'icon' => 'M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7', 'color' => 'blue'],
                        ['label' => 'Ketinggian', 'value' => ($profile->altitude ?? '-') . ' mdpl', 'icon' => 'M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z', 'color' => 'purple'],
                        ['label' => 'Kecamatan', 'value' => $profile->district ?? 'Mojotengah', 'icon' => 'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z', 'color' => 'green'],
                        ['label' => 'Kabupaten', 'value' => $profile->regency ?? 'Wonosobo', 'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6', 'color' => 'orange'],
                    ];
                @endphp
                @foreach($geoData as $geo)
                <div class="bg-{{ $geo['color'] }}-50 border border-{{ $geo['color'] }}-100 rounded-xl p-4">
                    <p class="text-xs font-medium text-{{ $geo['color'] }}-600 uppercase tracking-wide mb-1">{{ $geo['label'] }}</p>
                    <p class="text-xl font-bold text-gray-900">{{ $geo['value'] }}</p>
                </div>
                @endforeach
            </div>

            {{-- Batas Wilayah --}}
            @if($profile->north_border || $profile->south_border)
            <div>
                <h3 class="font-semibold text-gray-800 mb-4">Batas Wilayah</h3>
                <div class="grid grid-cols-2 gap-3">
                    @foreach([
                        ['arah' => 'Utara', 'nilai' => $profile->north_border, 'icon' => '↑'],
                        ['arah' => 'Selatan', 'nilai' => $profile->south_border, 'icon' => '↓'],
                        ['arah' => 'Timur', 'nilai' => $profile->east_border, 'icon' => '→'],
                        ['arah' => 'Barat', 'nilai' => $profile->west_border, 'icon' => '←'],
                    ] as $batas)
                    @if($batas['nilai'])
                    <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-xl">
                        <span class="text-xl text-green-600 font-bold w-6 text-center">{{ $batas['icon'] }}</span>
                        <div>
                            <p class="text-xs text-gray-500">{{ $batas['arah'] }}</p>
                            <p class="font-semibold text-gray-800">{{ $batas['nilai'] }}</p>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </section>
    @endif

    {{-- Demografi dengan Chart --}}
    @if($statistics)
    <section class="mb-12">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-10 h-10 bg-orange-100 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-orange-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-900">Data Demografi</h2>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                @php
                    $demoData = [
                        ['label' => 'Total Penduduk', 'value' => number_format($statistics->total_population), 'sub' => 'jiwa', 'color' => 'green'],
                        ['label' => 'Laki-laki', 'value' => number_format($statistics->male_population), 'sub' => 'jiwa', 'color' => 'blue'],
                        ['label' => 'Perempuan', 'value' => number_format($statistics->female_population), 'sub' => 'jiwa', 'color' => 'pink'],
                        ['label' => 'Kepala Keluarga', 'value' => number_format($statistics->total_families), 'sub' => 'KK', 'color' => 'orange'],
                    ];
                @endphp
                @foreach($demoData as $demo)
                <div class="text-center p-5 bg-{{ $demo['color'] }}-50 rounded-xl border border-{{ $demo['color'] }}-100">
                    <p class="text-3xl font-bold text-{{ $demo['color'] }}-700">{{ $demo['value'] }}</p>
                    <p class="text-sm text-gray-500 mt-1">{{ $demo['sub'] }}</p>
                    <p class="text-xs font-medium text-gray-600 mt-1">{{ $demo['label'] }}</p>
                </div>
                @endforeach
            </div>

            {{-- Chart --}}
            <div class="max-w-sm mx-auto">
                <canvas id="demographicChart" width="400" height="300"></canvas>
            </div>
        </div>
    </section>
    @endif
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
@if($statistics)
const ctx = document.getElementById('demographicChart');
if (ctx) {
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Laki-laki', 'Perempuan'],
            datasets: [{
                data: [{{ $statistics->male_population }}, {{ $statistics->female_population }}],
                backgroundColor: ['#1D401F', '#FF9B00'],
                borderWidth: 3,
                borderColor: '#fff',
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'bottom' },
                title: { display: true, text: 'Distribusi Penduduk Berdasarkan Jenis Kelamin', font: { size: 13 } }
            }
        }
    });
}
@endif
</script>
@endpush

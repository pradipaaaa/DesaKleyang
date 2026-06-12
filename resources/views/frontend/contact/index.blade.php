@extends('layouts.app')
@section('title', 'Kontak & Peta')
@section('content')

<div class="bg-gradient-to-br from-green-700 to-emerald-800 py-16 px-4">
    <div class="max-w-7xl mx-auto text-center text-white">
        <h1 class="text-4xl sm:text-5xl font-bold mb-3">Kontak & Peta Desa</h1>
        <p class="text-green-100 text-lg">Hubungi kami atau temukan lokasi Desa Kleyang</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid lg:grid-cols-2 gap-8">

        {{-- Contact Info + Form --}}
        <div class="space-y-6">
            {{-- Info Card --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Informasi Kantor Desa</h2>
                <div class="space-y-4">
                    @php
                        $contacts = [
                            ['icon' => 'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0zM15 11a3 3 0 11-6 0 3 3 0 016 0z', 'label' => 'Alamat', 'value' => $profile->address ?? 'Jl. Raya Kleyang No. 1, Kec. Mojotengah, Wonosobo'],
                            ['icon' => 'M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z', 'label' => 'Telepon', 'value' => $profile->phone ?? '0286-123456'],
                            ['icon' => 'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z', 'label' => 'Email', 'value' => $profile->email ?? 'desa@kleyang.id'],
                            ['icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z', 'label' => 'Jam Operasional', 'value' => 'Senin - Jumat: 08.00 - 16.00 WIB'],
                        ];
                    @endphp
                    @foreach($contacts as $contact)
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-green-50 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $contact['icon'] }}"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide">{{ $contact['label'] }}</p>
                            <p class="text-gray-800 font-medium mt-0.5">{{ $contact['value'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Contact Form --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-2">Kirim Pesan</h2>
                <p class="text-gray-500 text-sm mb-6">Kritik, saran, atau pertanyaan Anda sangat kami hargai</p>

                @if($errors->any())
                <div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-6">
                    <ul class="space-y-1">
                        @foreach($errors->all() as $error)
                        <li class="text-red-600 text-sm flex items-center gap-2">
                            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            {{ $error }}
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Nama Lengkap <span class="text-red-500">*</span></label>
                        <input type="text" name="name" value="{{ old('name') }}" required
                               class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent outline-none text-sm transition-all @error('name') border-red-400 @enderror"
                               placeholder="Masukkan nama lengkap Anda">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Alamat Email <span class="text-red-500">*</span></label>
                        <input type="email" name="email" value="{{ old('email') }}" required
                               class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent outline-none text-sm transition-all @error('email') border-red-400 @enderror"
                               placeholder="contoh@email.com">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Pesan <span class="text-red-500">*</span></label>
                        <textarea name="message" rows="5" required
                                  class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent outline-none text-sm resize-none transition-all @error('message') border-red-400 @enderror"
                                  placeholder="Tuliskan pesan, kritik, atau saran Anda...">{{ old('message') }}</textarea>
                    </div>
                    <button type="submit"
                            class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3.5 px-6 rounded-xl transition-all duration-300 shadow-sm hover:shadow-md flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                        </svg>
                        Kirim Pesan
                    </button>
                </form>
            </div>
        </div>

        {{-- Map --}}
        <div class="space-y-6">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-6 border-b border-gray-100">
                    <h2 class="text-2xl font-bold text-gray-900">Peta Lokasi</h2>
                    <p class="text-gray-500 text-sm mt-1">Desa Kleyang, Kecamatan Mojotengah, Wonosobo</p>
                </div>
                <div id="map" class="h-96"></div>
            </div>
        </div>
    </div>
</div>

@push('head')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
@endpush

@push('scripts')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    const lat = {{ $profile->latitude ?? -7.3614 }};
    const lng = {{ $profile->longitude ?? 109.9112 }};
    const map = L.map('map').setView([lat, lng], 15);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);
    const icon = L.divIcon({
        className: '',
        html: '<div style="background:#1D401F;width:36px;height:36px;border-radius:50% 50% 50% 0;transform:rotate(-45deg);border:4px solid white;box-shadow:0 4px 12px rgba(0,0,0,0.3)"></div>',
        iconSize: [36, 36],
        iconAnchor: [18, 36],
    });
    L.marker([lat, lng], { icon })
        .addTo(map)
        .bindPopup('<div style="text-align:center"><b>Kantor Desa Kleyang</b><br><small>Kec. Mojotengah, Wonosobo</small></div>')
        .openPopup();
</script>
@endpush
@endsection

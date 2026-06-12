<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'Website Resmi Desa Kleyang, Kecamatan Mojotengah, Kabupaten Wonosobo - Maju, Berdaya, dan Sejahtera Bersama')">
    <title>@yield('title', 'Desa Kleyang') - Website Resmi Desa Kleyang</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>
<body class="font-['Inter'] bg-gray-50 text-gray-800 antialiased">

    {{-- Navbar --}}
    @include('components.navbar')

    {{-- Main Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('components.footer')

    {{-- Flash Messages --}}
    @if(session('success'))
    <div id="flash-msg" class="fixed bottom-6 right-6 z-50 bg-green-600 text-white px-6 py-4 rounded-xl shadow-2xl flex items-center gap-3 alert-dismissible">
        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
        </svg>
        <span>{{ session('success') }}</span>
        <button onclick="document.getElementById('flash-msg').remove()" class="ml-2 hover:opacity-70">✕</button>
    </div>
    <script>setTimeout(() => { const el = document.getElementById('flash-msg'); if(el) el.remove(); }, 5000);</script>
    @endif

    @stack('scripts')
</body>
</html>

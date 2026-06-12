<nav class="bg-white/95 backdrop-blur-md shadow-sm sticky top-0 z-50 border-b border-gray-100" id="main-navbar">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <div class="w-10 h-10 bg-green-600 rounded-xl flex items-center justify-center shadow-md group-hover:bg-green-700 transition-colors">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                </div>
                <div>
                    <p class="font-bold text-green-700 text-sm leading-tight">Desa Kleyang</p>
                    <p class="text-xs text-gray-500 leading-tight">Kec. Mojotengah, Wonosobo</p>
                </div>
            </a>

            {{-- Desktop Nav Links --}}
            <div class="hidden lg:flex items-center gap-1">
                @php
                    $navLinks = [
                        ['route' => 'home', 'label' => 'Beranda'],
                        ['route' => 'profile', 'label' => 'Profil Desa'],
                        ['route' => 'government', 'label' => 'Pemerintahan'],
                        ['route' => 'potential', 'label' => 'Potensi Desa'],
                        ['route' => 'news', 'label' => 'Berita'],
                        ['route' => 'gallery', 'label' => 'Galeri'],
                        ['route' => 'contact', 'label' => 'Kontak'],
                    ];
                @endphp
                @foreach($navLinks as $link)
                <a href="{{ route($link['route']) }}"
                   class="px-4 py-2 text-sm font-medium rounded-lg transition-all duration-200
                          {{ request()->routeIs($link['route']) ? 'bg-green-50 text-green-700 font-semibold' : 'text-gray-600 hover:bg-gray-50 hover:text-green-700' }}">
                    {{ $link['label'] }}
                </a>
                @endforeach
            </div>

            {{-- CTA Button + Mobile Toggle --}}
            <div class="flex items-center gap-3">
                <a href="{{ route('contact') }}"
                   class="hidden sm:inline-flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200 shadow-sm hover:shadow-md">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    Hubungi Kami
                </a>
                <button id="mobile-menu-toggle" class="lg:hidden p-2 rounded-lg text-gray-600 hover:bg-gray-100 transition-colors">
                    <svg class="w-6 h-6" id="menu-icon-open" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg class="w-6 h-6 hidden" id="menu-icon-close" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div id="mobile-menu" class="lg:hidden hidden bg-white border-t border-gray-100 shadow-lg">
        <div class="px-4 py-4 space-y-1">
            @foreach($navLinks as $link)
            <a href="{{ route($link['route']) }}"
               class="block px-4 py-3 text-sm font-medium rounded-lg transition-colors
                      {{ request()->routeIs($link['route']) ? 'bg-green-50 text-green-700 font-semibold' : 'text-gray-600 hover:bg-gray-50 hover:text-green-700' }}">
                {{ $link['label'] }}
            </a>
            @endforeach
        </div>
    </div>
</nav>

<script>
    const mobileToggle = document.getElementById('mobile-menu-toggle');
    const mobileMenu   = document.getElementById('mobile-menu');
    const iconOpen     = document.getElementById('menu-icon-open');
    const iconClose    = document.getElementById('menu-icon-close');

    mobileToggle?.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
        iconOpen.classList.toggle('hidden');
        iconClose.classList.toggle('hidden');
    });
</script>

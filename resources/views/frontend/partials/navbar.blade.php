@php
    $routeName = Route::currentRouteName();
    
    // Config per page as in original header.js
    $pageConfigs = [
        'home' => ['mode' => 'floating', 'bg' => '', 'color' => '#1a1f4d'],
        'about' => ['mode' => 'fullwidth', 'bg' => 'bg-[#1a1f4d]', 'color' => '#1a1f4d'],
        'divisions' => ['mode' => 'fullwidth', 'bg' => 'bg-[#1a1f4d]', 'color' => '#1a1f4d'],
        'diaspora' => ['mode' => 'fullwidth', 'bg' => 'bg-primary', 'color' => '#05482c'],
        'faq' => ['mode' => 'fullwidth', 'bg' => 'bg-[#161c42]', 'color' => '#161c42'],
        'contact' => ['mode' => 'fullwidth', 'bg' => 'bg-[#0b5b3a]', 'color' => '#0b5b3a'],
        'mentions-legales' => ['mode' => 'fullwidth', 'bg' => 'bg-darkBlue', 'color' => '#121a44'],
        'profile' => ['mode' => 'fullwidth', 'bg' => 'bg-[#16205a]', 'color' => '#16205a'],
        'profile.simulations.show' => ['mode' => 'fullwidth', 'bg' => 'bg-[#16205a]', 'color' => '#16205a'],
    ];

    $config = $pageConfigs[$routeName] ?? ['mode' => 'fullwidth', 'bg' => 'bg-darkBlue', 'color' => '#121a44'];
    
    $menuItems = [
        ['label' => 'Accueil', 'route' => 'home'],
        ['label' => 'À propos', 'route' => 'about'],
        ['label' => 'Nos Divisions', 'route' => 'divisions'],
        ['label' => 'Simulateurs', 'route' => 'simulator.index'],
        ['label' => 'Diaspora', 'route' => 'diaspora'],
        ['label' => 'FAQ', 'route' => 'faq'],
    ];
@endphp

<!-- ================= NAVBAR ================= -->
<header id="navBar" 
    @if($config['mode'] === 'floating')
        class="fixed top-4 left-1/2 -translate-x-1/2 z-50 w-[95%] max-w-7xl rounded-[28px] overflow-visible transition-all duration-300"
    @else
        class="fixed top-0 left-0 w-full z-50 {{ $config['bg'] }} transition-all duration-300"
    @endif
>
    <nav class="max-w-7xl mx-auto flex items-center justify-between px-6 py-3">
        <a href="{{ route('home') }}">
            <img src="{{ asset('aiae-frontend/Images/logos/LOGO AIAE BLANC.png') }}" alt="AIAE" class="aiae-header-logo h-12 md:h-16 w-auto object-contain" />
        </a>

        <ul class="hidden lg:flex items-center gap-2 text-sm font-medium">
            @foreach($menuItems as $item)
                @php
                    $isActive = Route::is($item['route']);
                    $activeCls = "bg-white text-[{$config['color']}] shadow";
                    $inactiveCls = "bg-glassDark text-white hover:bg-white hover:text-[{$config['color']}]";
                @endphp
                <li>
                    <a href="{{ route($item['route']) }}" 
                       class="px-4 py-2 rounded-full block whitespace-nowrap font-light transition-colors {{ $isActive ? $activeCls : $inactiveCls }}">
                        {{ $item['label'] }}
                    </a>
                </li>
            @endforeach
        </ul>

        <div class="flex items-center gap-3">
            <a href="{{ route('profile') }}" class="w-10 h-10 rounded-full bg-glassDark flex items-center justify-center hover:bg-white/20 transition-colors">
                <img src="{{ asset('aiae-frontend/Images/Contact blanc.svg') }}" alt="Profile" class="h-5 w-5" />
            </a>
            <a href="{{ route('contact') }}" class="hidden sm:block px-5 py-2 rounded-full bg-white text-[{{ $config['color'] }}] shadow hover:bg-gray-100 transition-colors">
                Contact
            </a>
            <button id="burger" class="lg:hidden text-2xl rounded-full bg-glassDark p-2" aria-label="Menu">
                <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h10" />
                </svg>
            </button>
        </div>
    </nav>

    <!-- Menu mobile -->
    <div id="mobileMenu" class="hidden lg:hidden mt-1 backdrop-blur-xl rounded-2xl p-4 space-y-2 shadow-xl mx-4" style="background:rgba(0,0,0,0.75)">
        <button id="closeMobile" class="w-full flex justify-end px-2 mb-2" aria-label="Fermer le menu">
            <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
            </svg>
        </button>

        @foreach($menuItems as $item)
            @php $isActive = Route::is($item['route']); @endphp
            <a href="{{ route($item['route']) }}" 
               class="block px-4 py-3 rounded-lg transition-colors {{ $isActive ? "bg-white text-[{$config['color']}]" : "bg-white/20 text-white hover:bg-white/30" }}">
                {{ $item['label'] }}
            </a>
        @endforeach
        
        <a href="{{ route('contact') }}" class="block px-4 py-3 rounded-lg bg-white text-center text-[{{ $config['color'] }}] sm:hidden">
            Contact
        </a>
    </div>
</header>

<script>
    // Logic for Mobile Menu (Vanilla JS)
    document.addEventListener('DOMContentLoaded', () => {
        const burger = document.getElementById('burger');
        const mobileMenu = document.getElementById('mobileMenu');
        const closeMobile = document.getElementById('closeMobile');

        if (burger && mobileMenu) {
            burger.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }

        if (closeMobile && mobileMenu) {
            closeMobile.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
            });
        }

        // Close menu on link click
        const mobileLinks = mobileMenu?.querySelectorAll('a');
        mobileLinks?.forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
            });
        });
    });
</script>

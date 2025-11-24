<div>
    <style>
        .hero-bg {
            /* ... style lainnya tetap sama ... */
            background-image: url('URL_GAMBAR_DESA_ANDA'); /* Ganti dengan URL gambar asli */
            background-size: cover;
            background-position: center;
            background-color: #047857;
            position: relative;
        }
        .hero-bg::before {
            content: '';
            position: absolute;
            top: 0; right: 0; bottom: 0; left: 0;
            background: rgba(0, 0, 0, 0.4);
        }
        .progress-bar { height: 12px; border-radius: 9999px; overflow: hidden; }
        .progress-fill { height: 100%; border-radius: 9999px; transition: width 0.5s ease-in-out; }
    </style>

<div 
    id="hero-section"
    class="hero-bg relative text-white h-screen flex items-center justify-center rounded-b-xl shadow-xl mb-12 bg-center bg-no-repeat bg-fixed"
    style="background-image: url('{{ asset('images/sawah.jpg') }}'); background-size: cover;"
>
    <!-- Overlay gelap transparan -->
    <div class="absolute inset-0 bg-black bg-opacity-40 rounded-b-xl"></div>

    <!-- Konten -->
    <div class="relative z-10 text-center max-w-4xl mx-auto px-4 -mt-16">
        <h1 class="text-6xl md:text-7xl font-extrabold mb-4 uppercase tracking-wider">SIKAMPUH</h1>
        <p class="text-xl italic mb-10">"Desa nyaman dengan sejuta keindahannya"</p>

        <a href="#village-overview"
           class="relative overflow-hidden px-8 py-3 font-semibold text-gray-800 bg-white rounded-full shadow-lg w-48 mx-auto flex items-center justify-center transition-all duration-500 group"
        >
            <span class="absolute inset-0 bg-gradient-to-r from-teal-500 to-green-600 translate-x-[-100%] group-hover:translate-x-0 transition-transform duration-500 ease-in-out rounded-full"></span>
            <span class="relative z-10 flex items-center text-gray-800 group-hover:text-white transition-colors duration-300">
                Eksplor SKP <span class="ml-2">→</span>
            </span>
        </a>
    </div>
</div>
    <div class="max-w-7xl mx-auto px-4"> 
        {{-- @livewire('sections.welcome-banner') --}}
        <div id="village-overview" class="scroll-mt-24">
            @livewire('sections.village-overview')
        </div>
        @livewire('sections.village-chief-address')
        @livewire('sections.village-news')
        @livewire('sections.leadership-structure')
    </div>
</div>
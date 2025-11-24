<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'SIKAMPUH | Sistem Informasi & Layanan Digital Desa' }}</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');
        body { font-family: 'Inter', sans-serif; background-color: #f3f4f6; }
        .text-sikampuh-green { color: #10b981; }
        .bg-sikampuh-teal { background-color: #047857; }
        .bg-sikampuh-green-light { background-color: #ccffcc; }
        .dropdown-menu { transition: opacity 0.2s ease-out, transform 0.2s ease-out; }
    </style>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.0/css/all.min.css">
    @livewireStyles
</head>
<body class="bg-gray-100 font-sans">

    @php
        use App\Models\VillageProfile;
        use App\Models\Contact; // ✅ Import Model Contact

        $villageProfile = VillageProfile::first();
        $contact = Contact::first(); // ✅ Ambil data kontak dari DB
    @endphp

<header class="bg-sikampuh-teal shadow-lg sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center text-white">
        
        <a href="{{ route('welcome') }}" class="flex items-center space-x-2">
            
            @if ($villageProfile?->logo_url)
                <img src="{{ asset('storage/' . $villageProfile->logo_url) }}"
                    alt="Logo Desa"
                    class="w-8 h-8 object-contain"> @else
                <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 2a8 8 0 100 16 8 8 0 000-16zM6.5 9a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zm4.781 1.76l2.67-2.67a.5.5 0 01.708 0l.707.707a.5.5 0 010 .707l-2.67 2.67a.5.5 0 01-.707 0l-.708-.707a.5.5 0 010-.707z" clip-rule="evenodd"/>
                </svg>
            @endif

            <div class="flex flex-col">
                <span class="text-xl font-bold">
                    {{ $villageProfile->name ?? config('app.name', 'SIKAMPUH') }}
                </span>
                <span class="text-xs italic">Sistem Informasi & Layanan Digital</span>
            </div>
        </a>
            
            <nav class="space-x-6 hidden md:flex font-semibold items-center">
                <a href="{{ route('welcome') }}" class="hover:text-gray-300 transition">Beranda</a>

                <div class="relative group" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <a href="#" class="flex items-center hover:text-gray-300 transition">
                        Profil
                        <svg class="w-4 h-4 ml-1 transform group-hover:rotate-180 transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </a>

                    <div x-show="open"
                         x-transition:enter="ease-out duration-200"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         x-transition:leave="ease-in duration-150"
                         x-transition:leave-start="opacity-100 scale-100"
                         x-transition:leave-end="opacity-0 scale-95"
                         class="dropdown-menu absolute right-0 mt-3 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-20 origin-top-right">
                        <div class="py-1 text-gray-700">
                            <a href="{{ route('profil.desa') }}" class="block px-4 py-2 hover:bg-gray-100 hover:text-sikampuh-teal">Profil Desa</a>
                            <a href="{{ route('profil.visi-misi') }}" class="block px-4 py-2 hover:bg-gray-100 hover:text-sikampuh-teal">VISI MISI</a>
                            <a href="{{ route('profil.apbdes') }}" class="block px-4 py-2 hover:bg-gray-100 hover:text-sikampuh-teal">APBDES</a>
                            <a href="{{ route('profil.potensi-desa') }}" class="block px-4 py-2 hover:bg-gray-100 hover:text-sikampuh-teal">Potensi Desa</a>
                            <a href="{{ route('arsip.index') }}" class="block px-4 py-2 hover:bg-gray-100 hover:text-sikampuh-teal">Arsip</a>
                        </div>
                    </div>
                </div>

                <a href="{{ route('berita.index') }}" class="hover:text-gray-300 transition">Berita</a>
                <a href="{{ route('layanan.index') }}" class="hover:text-gray-300 transition">Layanan</a>

                @auth
                    <a href="{{ route('profile') }}" class="hover:text-gray-300 transition">{{ auth()->user()->name }}</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-red-400 hover:text-red-600 transition">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-white bg-teal-700 px-3 py-1 rounded-full hover:bg-teal-600 transition">Login</a>
                @endauth
            </nav>

            <button class="md:hidden text-white focus:outline-none" onclick="document.getElementById('mobile-menu').classList.toggle('hidden');">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
    </header>

    <div id="mobile-menu" class="hidden md:hidden bg-white shadow-xl border-t border-gray-200 fixed w-full z-40">
        <div class="px-4 py-4 space-y-2 font-medium text-gray-700">
            <a href="{{ route('welcome') }}" class="block p-2 hover:bg-gray-100 rounded">Beranda</a>

            <div x-data="{ open: false }">
                <button @click="open = !open" class="flex justify-between items-center w-full p-2 hover:bg-gray-100 rounded">
                    <span>Profil</span>
                    <svg class="w-4 h-4 transform transition duration-300" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="open" class="pl-4 pt-1 space-y-1 text-sm bg-gray-50 rounded mt-1">
                    <a href="{{ route('profil.desa') }}" class="block px-4 py-2 hover:bg-gray-100 hover:text-sikampuh-teal">Profil Desa</a>
                    <a href="{{ route('profil.visi-misi') }}" class="block px-4 py-2 hover:bg-gray-100 hover:text-sikampuh-teal">VISI MISI</a>
                    <a href="{{ route('profil.apbdes') }}" class="block px-4 py-2 hover:bg-gray-100 hover:text-sikampuh-teal">APBDES</a>
                    <a href="{{ route('profil.potensi-desa') }}" class="block px-4 py-2 hover:bg-gray-100 hover:text-sikampuh-teal">Potensi Desa</a>
                    <a href="{{ route('arsip.index') }}" class="block px-4 py-2 hover:bg-gray-100 hover:text-sikampuh-teal">Arsip</a>
                </div>
            </div>

            <a href="{{ route('berita.index') }}" class="block p-2 hover:bg-gray-100 rounded">Berita</a>
            <a href="{{ route('layanan.index') }}" class="block p-2 hover:bg-gray-100 rounded">Layanan</a>

            @auth
                <a href="{{ route('profile') }}" class="block p-2 hover:bg-gray-100 rounded">{{ auth()->user()->name }}</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-start p-2 text-red-500 hover:bg-gray-100 rounded">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="block p-2 bg-sikampuh-teal text-white rounded mt-4 text-center hover:bg-teal-600">Login</a>
            @endauth
        </div>
    </div>

    <main>
        {{ $slot }}
    </main>

    @livewire('forms.aspiration-form')

    <footer class="bg-sikampuh-green-light border-t mt-16 shadow-inner">
        <div class="max-w-7xl mx-auto px-4 py-12 grid grid-cols-2 md:grid-cols-4 gap-8 text-gray-800">
            <div>
                <h4 class="font-bold mb-3 text-lg">{{ $villageProfile->name ?? 'Sikampuh Online' }}</h4>
                @if ($villageProfile && $villageProfile->address)
                    <p class="text-sm">
                        {{ str_replace(',', ',', $villageProfile->address) }}
                    </p>
                @else
                     <p class="text-sm">Alamat Desa belum diatur di database.</p>
                @endif
            </div>
                <div>
                    <h4 class="font-bold mb-3 text-lg">Link Terkait</h4>
                    <ul class="space-y-2 text-sm">
                        <li class="flex items-center">
                            <svg class="w-4 h-4 text-sikampuh-green mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            <a href="https://maps.app.goo.gl/Zq3SPk2nDpcLnu7bA" class="hover:underline text-gray-800">Lokasi</a>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-4 h-4 text-sikampuh-green mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            <a href="{{ route('profil.desa') }}" class="hover:underline text-gray-800">Layanan</a>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-4 h-4 text-sikampuh-green mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            <a href="{{ route('layanan.index') }}"class="hover:underline text-gray-800">Profil Desa</a>
                        </li>
                    </ul>
                </div>
            <div>
                <h4 class="font-bold mb-3 text-lg">Kontak</h4>
                <p class="text-sm space-y-1">
                    @if ($contact && $contact->email)
                        <a href="mailto:{{ $contact->email }}" class="block hover:underline">{{ $contact->email }}</a>
                    @else
                        <span class="block text-gray-500">Email belum diatur.</span>
                    @endif
                    
                    @if ($contact && $contact->phone)
                        <a href="tel:{{ $contact->phone }}" class="block hover:underline">{{ $contact->phone }}</a>
                    @else
                         <span class="block text-gray-500">Telepon belum diatur.</span>
                    @endif
                </p>
            </div>
            
            <div>
                <h4 class="font-bold mb-3 text-lg">Sosial Media</h4>
                <div class="flex justify-center md:justify-start space-x-5">
                    
                    @php
                        // Daftar platform dan ikon yang sesuai
                        $socialPlatforms = [
                            'facebook' => ['url_column' => 'facebook_url', 'icon' => 'fa-facebook-f', 'color' => 'hover:text-blue-600'],
                            'youtube' => ['url_column' => 'youtube_url', 'icon' => 'fa-youtube', 'color' => 'hover:text-red-600'],
                            'instagram' => ['url_column' => 'instagram_url', 'icon' => 'fa-instagram', 'color' => 'hover:text-pink-600'],
                            'twitter' => ['url_column' => 'twitter_url', 'icon' => 'fa-twitter', 'color' => 'hover:text-blue-400'],
                            'tiktok' => ['url_column' => 'tiktok_url', 'icon' => 'fa-tiktok', 'color' => 'hover:text-gray-600'],
                        ];
                    @endphp

                    @foreach ($socialPlatforms as $platform)
                        @if ($contact && $contact->{$platform['url_column']})
                            <a href="{{ $contact->{$platform['url_column']} }}" target="_blank" class="{{ $platform['color'] }} transition">
                                <i class="fab {{ $platform['icon'] }} text-xl"></i>
                            </a>
                        @endif
                    @endforeach
                    
                </div>
            </div>
            
        </div>
        <div class="max-w-7xl mx-auto px-4 py-4 text-center text-gray-600 border-t border-gray-300 text-sm">
            &copy; {{ date('Y') }} {{ config('app.name') ?? 'SIKAMPUH' }}. All rights reserved.
        </div>
    </footer>

    @livewireScripts
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>
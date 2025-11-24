<div class="antialiased">
    
    <!-- Header Banner -->
    <div 
        class="relative bg-cover bg-center h-[700px] flex items-center justify-center text-white shadow-xl bg-fixed"
        style="background-image: url('{{ asset('images/sawah.jpg') }}'); filter: brightness(0.7);"
    >
        <div class="absolute inset-0 bg-black bg-opacity-40"></div>

        <div class="relative z-10 text-center">
            <p class="text-xl font-medium tracking-wider">Visi Misi</p>
            <h1 class="text-5xl font-extrabold mt-2">Desa {{ $villageName }}</h1>
        </div>
    </div>

    
    <!-- Main Content -->
    <div class="max-w-4xl mx-auto px-4 py-16">
        
        <!-- Profil Desa -->
        <div class="text-center mb-12">
            <h2 class="text-3xl font-extrabold text-green-700 mb-4">Desa {{ $villageName }}</h2>
            <p class="text-gray-700 leading-relaxed mx-auto max-w-2xl mb-4">
                {{ $heroText }}
            </p>
            <p class="text-xl font-bold text-green-500 italic">
                {{ $slogan }}
            </p>
        </div>
        
        <hr class="my-10 border-green-200">

        <!-- Visi -->
        <div class="mb-12">
            <h3 class="text-3xl font-extrabold text-green-700 text-center mb-6 border-b-2 border-green-500 inline-block px-4 pb-1">
                Visi
            </h3>
            <div class="bg-green-50 p-6 rounded-lg shadow-md text-center">
                <p class="text-xl font-semibold text-green-800">
                    {{ $visi }}
                </p>
            </div>
        </div>

        <!-- Misi -->
        <div class="mb-12">
            <h3 class="text-3xl font-extrabold text-green-700 text-center mb-6 border-b-2 border-green-500 inline-block px-4 pb-1">
                Misi
            </h3>
            <ul class="space-y-3 text-lg text-gray-700 ml-4">
                @forelse ($misi as $item)
                    <li class="flex items-start">
                        <svg class="w-5 h-5 mt-1 mr-2 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 
                                7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span>
                            {{ is_array($item) ? ($item['misi'] ?? '') : $item }}
                        </span>
                    </li>
                @empty
                    <li class="text-center text-gray-500">Data Misi belum tersedia.</li>
                @endforelse
            </ul>
        </div>
        
    </div>
</div>

<div class="antialiased">
    
    <div 
        class="relative bg-cover bg-center h-[700px] flex items-center justify-center text-white shadow-xl bg-fixed" 
        style="background-image: url('{{ asset('images/desa.jpg') }}'); background-size: cover; background-position: center; filter: brightness(0.6);"
    >
        <div class="absolute inset-0 bg-black bg-opacity-40"></div>

        <div class="relative z-10 text-center">
            <h1 class="text-5xl font-extrabold mb-2">PROFIL DESA</h1>
            <p class="text-xl font-medium tracking-wider">Mengenal Lebih Dekat Desa Sikampuh</p>
        </div>
    </div>

    
    <div class="max-w-7xl mx-auto px-4 py-16">
        
        <div class="text-center mb-16">
            <h2 class="text-3xl font-extrabold text-gray-800 mb-8">STRUKTUR ORGANISASI PEMERINTAH DESA</h2>
            <div class="w-full overflow-x-auto bg-white p-4 rounded-lg shadow-xl">
                <img src="{{ $structureImage ?: 'https://placehold.co/800x400/f3f4f6/000?text=STRUKTUR+ORGANISASI+PEMERINTAH+DESA' }}" 
                     alt="Struktur Organisasi Desa" class="w-full min-w-[700px] h-auto mx-auto border border-gray-300" 
                     style="min-width: 700px;">
            </div>
        </div>

        <div class="mb-16">
            <h2 class="text-3xl font-extrabold text-center text-gray-800 mb-10">DATA DEMOGRAFI</h2>
            
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                @foreach ($demography as $data)
                    <div class="flex flex-col items-center p-6 bg-white rounded-xl shadow-lg border-t-4 border-green-500 hover:shadow-xl transition duration-300">
                        <div class="text-4xl font-bold text-green-700">{{ $data['value'] }}</div>
                        <p class="text-sm text-gray-500 mt-2 text-center">{{ $data['label'] }}</p>
                    </div>
                @endforeach
            </div>

            <div class="text-center bg-gray-50 p-6 rounded-xl border border-gray-200 shadow-inner">
                <p class="text-gray-700 leading-relaxed max-w-4xl mx-auto">
                    {{ $geographicInfo }}
                </p>
            </div>
        </div>
        
        <div class="mb-16">
            <h2 class="text-3xl font-extrabold text-gray-800 mb-10 text-center">{{ $historyTitle }}</h2>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-12"> 
                
                <div class="space-y-8">
                    
                    <div class="pt-4"> <h3 class="text-xl font-bold text-gray-900 mb-1">{{ $mythTitle }}</h3>
                        <hr class="w-1/3 border-yellow-600 border-2 mb-4"> 
                        <p class="text-gray-700 leading-relaxed">
                            {{ $mythContent }} 
                        </p>
                    </div>
                </div>

                <div class="space-y-8">
                    
                    <div class="pt-4"> <h3 class="text-xl font-bold text-gray-900 mb-1">Sejarah Singkat Desa</h3>
                        <hr class="w-1/3 border-yellow-600 border-2 mb-4"> 
                        <p class="text-gray-700 leading-relaxed">
                            {{ $historyContent }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="relative h-72 rounded-lg overflow-hidden shadow-xl border border-gray-300">
                    <img src="{{ $map1Image ?: 'https://placehold.co/400x300/a0a0a0/333333?text=Peta+Lokasi' }}" alt="Peta Lokasi Desa" class="object-cover w-full h-full">
                    <div class="absolute inset-0 bg-black bg-opacity-10 flex items-center justify-center">
                        <span class="text-white text-xl font-bold">Peta Lokasi</span>
                    </div>
                </div>
                
                <div class="relative h-72 rounded-lg overflow-hidden shadow-xl border border-gray-300">
                    <img src="{{ $map2Image ?: 'https://placehold.co/400x300/c0c0c0/333333?text=Peta+Wilayah' }}" alt="Peta Wilayah Desa" class="object-cover w-full h-full">
                    <div class="absolute inset-0 bg-black bg-opacity-10 flex items-center justify-center">
                        <span class="text-white text-xl font-bold">Peta Wilayah</span>
                    </div>
                </div>
            </div>

        </div>
        
    </div>
    
</div>
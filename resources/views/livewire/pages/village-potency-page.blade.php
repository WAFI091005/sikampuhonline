<div class="antialiased">

    {{-- Hero Section --}}
    <div 
        class="relative bg-cover bg-center h-[700px] flex items-center justify-center text-white shadow-xl bg-fixed"
        style="background-image: url('{{ asset('images/sawah.jpg') }}'); filter: brightness(0.7);"
    >
        <div class="absolute inset-0 bg-black opacity-50"></div>

        <div class="relative z-10 text-center">
            <h1 class="text-5xl font-extrabold mb-2">POTENSI DESA</h1>
            <p class="text-xl font-medium tracking-wider">
                Informasi Potensi {{ $villageName }} Berbagai Sektor
            </p>
        </div>
    </div>


    <div class="max-w-7xl mx-auto px-4 py-16">

        {{-- Potensi Ringkasan --}}
        <div class="text-center mb-16">
            <h2 class="text-3xl font-extrabold text-gray-800 mb-8">POTENSI DESA {{ $villageName }}</h2>

            <div class="flex flex-col lg:flex-row lg:space-x-12 items-center justify-center">
                <div class="lg:w-1/2 text-left mb-6 lg:mb-0">
                    <h3 class="text-2xl font-bold text-gray-900 mb-1">Menggali Potensi Desa {{ $villageName }}</h3>
                    <hr class="w-1/4 border-yellow-600 border-2 mb-4">
                    <p class="text-gray-700 leading-relaxed max-w-lg">
                        {{ $potencySummary }}
                    </p>
                </div>

                {{-- Lingkaran Ilustrasi Potensi --}}
                <div class="lg:w-1/2 flex justify-center relative h-72 w-full max-w-md">
                    @php
                        $positions = [
                            0 => 'top: 0; left: 140px;',
                            1 => 'top: 100px; left: 0;',
                            2 => 'bottom: 0; right: 60px;',
                        ];
                    @endphp

                    @forelse ($topPotencies as $index => $potency)
                        <div class="absolute w-36 h-36 rounded-full overflow-hidden shadow-lg border-4 border-white"
                            style="{{ $positions[$index] ?? $positions[0] }}">
                            <img src="{{ $potency['image'] }}" 
                                alt="{{ $potency['title'] }}"
                                class="w-full h-full object-cover opacity-90 hover:opacity-100 transition">
                            <div class="absolute inset-0 bg-[{{ $potency['color'] }}] bg-opacity-60 
                                        flex items-center justify-center font-bold text-lg {{ $potency['text_class'] }}">
                                {{ $potency['title'] }}
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-500 italic">Ilustrasi belum tersedia.</p>
                    @endforelse
                </div>
            </div>
        </div>

        <hr class="my-10 border-gray-300">

        {{-- Potensi Fisik --}}
        <div class="mb-16">
            <h2 class="text-3xl font-extrabold text-center text-gray-800 mb-10">POTENSI UNGGULAN {{ $villageName }}</h2>
            <h3 class="text-2xl font-bold text-gray-800 mb-8 border-l-4 border-yellow-600 pl-3 inline-block">POTENSI FISIK</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @forelse ($physicalPotencies as $potency)
                    <div class="bg-white rounded-xl shadow-lg border-l-4 border-yellow-600 p-6 
                                hover:shadow-2xl hover:-translate-y-2 transition duration-300 ease-in-out">
                        
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h4 class="text-xl font-bold text-gray-900 mb-1">{{ $potency['title'] }}</h4>
                                <hr class="w-1/3 border-yellow-600 border-2"> 
                            </div>

                            {{-- ✅ $potency['image'] sekarang berisi URL publik yang lengkap/eksternal --}}
                            <img src="{{ $potency['image'] }}" 
                                 alt="{{ $potency['title'] }}" 
                                 class="w-16 h-16 rounded-full object-cover shadow-md flex-shrink-0">
                        </div>

                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                            {{ $potency['summary'] }}
                        </p>

                        <a href="{{ $potency['link'] }}" 
                           class="text-sm font-semibold text-green-700 hover:text-green-900 flex items-center">
                            Lihat detail
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </div>
                @empty
                    <p class="text-gray-500 md:col-span-2">Data potensi fisik unggulan belum tersedia.</p>
                @endforelse
            </div>
        </div>

        {{-- Potensi Non Fisik --}}
        <div class="mb-16">
            <h3 class="text-2xl font-bold text-gray-800 mb-6 border-l-4 border-yellow-600 pl-3 inline-block">POTENSI NON FISIK</h3>
            <p class="text-gray-700 leading-relaxed mb-6">
                Potensi non-fisik mencakup aspek budaya dan sosial yang menjadi kekuatan komunitas desa.
            </p>
            
            <ul class="space-y-4 text-gray-700 list-disc list-inside ml-4">
                @forelse ($nonPhysicalPotencies as $item)
                    <li>
                        <span class="font-semibold">{{ $item->title }}</span>: 
                        {{ $item->content }}
                    </li>
                @empty
                    <p class="text-gray-500">Data potensi non-fisik belum tersedia.</p>
                @endforelse
            </ul>
        </div>

    </div>

</div>
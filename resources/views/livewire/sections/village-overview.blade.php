<div class="max-w-7xl mx-auto px-4 py-6 md:py-12">
    <style>
        .progress-bar {
            height: 8px;
            border-radius: 4px;
            overflow: hidden;
        }
        .progress-fill {
            height: 100%;
            transition: width 0.5s ease-in-out;
            border-radius: 4px;
        }
    </style>
    
    <div class="grid md:grid-cols-3 gap-12">
        
        <div class="md:col-span-2">
            
            <h2 class="text-3xl font-bold mb-4 text-gray-800">
                Sekilas Tentang {{ $villageData->name ?? 'Desa Sikampuh' }}
            </h2>
            
            <p class="text-gray-600 mb-4">
                {{ $villageData->description ?? 'Deskripsi umum desa belum dimasukkan ke database.' }}
            </p>
            
            <p class="text-gray-600">
                {{ $villageData->commitment ?? 'Komitmen pemerintah desa belum dimasukkan ke database.' }}
            </p>
        </div>

        <div class="md:col-span-1 space-y-4">
            <h3 class="text-xl font-semibold mb-2 text-gray-800">Capaian Pembangunan</h3>
            @foreach ($capaian as $title => $percentage)
                <div>
                    <div class="flex justify-between mb-1 text-sm font-medium">
                        <span>{{ $title }}</span>
                        <span>{{ $percentage }}%</span>
                    </div>
                    <div class="progress-bar bg-gray-300">
                        <div class="progress-fill 
                            @if($title == 'Pemerintahan') bg-blue-500
                            @elseif($title == 'Pembinaan Kemasyarakatan') bg-yellow-500
                            @elseif($title == 'Pembangunan') bg-green-500
                            @else bg-red-500 @endif" 
                            style="width: {{ $percentage }}%">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <hr class="my-8 border-gray-300">
</div>
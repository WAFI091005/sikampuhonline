<h3 class="text-2xl font-bold text-blue-700 mb-6">Proyek Pembangunan Desa Tahun {{ $activeYear }}</h3>
@if ($summaryData['projects']->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach ($summaryData['projects'] as $project)
            <div class="bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden hover:shadow-xl transition duration-200">
                <div class="relative h-48 bg-gray-100">
                    @if ($project->image_url)
                        <img src="{{ Storage::url($project->image_url) }}" alt="{{ $project->name }}" class="w-full h-full object-cover">
                    @else
                        <div class="flex items-center justify-center w-full h-full text-gray-400 text-sm">Tidak Ada Foto</div>
                    @endif
                </div>
                <div class="p-4">
                    <h4 class="text-lg font-bold text-gray-900">{{ $project->name }}</h4>
                    <p class="text-sm text-gray-500 mb-2">{{ $project->location }}</p>
                    <div class="flex justify-between items-center text-xs">
                        <span class="font-bold text-blue-600">Rp{{ number_format($project->budget, 0, ',', '.') }}</span>
                        <span class="px-2 py-0.5 rounded-full text-white 
                            @if ($project->status == 'Selesai') bg-green-500
                            @elseif ($project->status == 'Proses') bg-yellow-500
                            @else bg-gray-500 @endif">
                            {{ $project->status }}
                        </span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="p-6 bg-yellow-50 border-l-4 border-yellow-500 text-yellow-800 rounded-lg">Data Proyek pembangunan tahun {{ $activeYear }} belum dimasukkan.</div>
@endif
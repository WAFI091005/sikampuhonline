<div class="antialiased">
    
    <div 
        class="relative bg-cover bg-center h-[700px] flex items-center justify-center text-white shadow-xl bg-fixed"
        style="background-image: url('{{ asset('images/sawah.jpg') }}'); filter: brightness(0.7);"
    >
        <div class="absolute inset-0 bg-black opacity-60"></div>

        <div class="relative z-10 text-center">
            <h1 class="text-3xl font-bold">Arsip Desa</h1>
            <p class="text-4xl font-extrabold mt-1">Sistem Informasi Desa Sikampuh</p>
        </div>

        <div class="absolute bottom-6 right-6 z-10">
            @livewire('forms.aspiration-form')
        </div>
    </div>

    
    <div class="max-w-7xl mx-auto px-4 py-12">
        
        <div class="text-center mb-8">
            <h2 class="bg-green-600 text-white text-center py-3 px-6 rounded-lg inline-block font-bold text-xl">
                Arsip Desa
            </h2>
        </div>

        <div class="bg-gray-100 p-6 rounded-xl shadow-lg mb-10">
            <form class="grid grid-cols-1 md:grid-cols-3 gap-4 items-end"> 
                
                <div>
                    <label for="keyword" class="text-sm font-semibold text-gray-700 block mb-1">Kata Kunci (Judul)</label>
                    <div class="relative">
                        <input wire:model.live.debounce.300ms="keyword" type="text" id="keyword" placeholder="Judul dokumen" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500 pr-10">
                        <svg class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                    </div>
                </div>

                <div>
                    <label for="category" class="text-sm font-semibold text-gray-700 block mb-1">Kategori</label>
                    <div class="relative">
                        <select wire:model.live="category" id="category" class="w-full p-2 border border-gray-300 rounded-lg appearance-none focus:ring-green-500 focus:border-green-500">
                            @foreach ($categories as $cat)
                                <option>{{ $cat }}</option>
                            @endforeach
                        </select>
                        <svg class="absolute right-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                </div>

                <div>
                    <label for="year" class="text-sm font-semibold text-gray-700 block mb-1">Tahun</label>
                    <div class="relative">
                        <select wire:model.live="year" id="year" class="w-full p-2 border border-gray-300 rounded-lg appearance-none focus:ring-green-500 focus:border-green-500">
                            @foreach ($years as $y)
                                <option>{{ $y }}</option>
                            @endforeach
                        </select>
                        <svg class="absolute right-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                </div>
                
                <div class="md:col-span-3 lg:col-span-1">
                    <button type="reset" wire:click="$set('keyword', ''), $set('category', 'Semua Dokumen'), $set('year', 'Semua Tahun')" class="w-full bg-gray-500 text-white font-bold p-2 rounded-lg hover:bg-gray-600 transition">
                         Reset Filter
                    </button>
                </div>
            </form>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200">
            <h3 class="text-xl font-bold text-gray-800 mb-4">Hasil Pencarian</h3>

            <p class="text-sm text-gray-600 mb-6">
                Menampilkan {{ $archivedData->firstItem() }} sampai {{ $archivedData->lastItem() }} dari {{ $archivedData->total() }} dokumen
            </p>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-green-600 text-white">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">No</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Judul</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Tahun</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Kategori</th>
                            <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($archivedData as $index => $item)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $archivedData->firstItem() + $loop->index }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    <div class="flex items-center space-x-3">
                                        @if ($item->image_url)
                                            <img src="{{ asset('storage/' . $item->image_url) }}" alt="Dokumen" class="w-10 h-10 rounded object-cover shadow-sm">
                                        @else
                                            <img src="https://placehold.co/40x40/c0c0c0/333333?text=Doc" alt="Dokumen" class="w-10 h-10 rounded object-cover shadow-sm">
                                        @endif
                                        <span>{{ $item->title }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->year }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->category }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium space-x-2">
                                    <a href="{{ asset('storage/' . $item->file_url) }}" target="_blank" class="text-white bg-green-500 p-2 rounded-md hover:bg-green-600 transition inline-flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                        Unduh
                                    </a>
                                    <a href="{{ asset('storage/' . $item->file_url) }}" target="_blank" class="text-white bg-cyan-600 p-2 rounded-md hover:bg-cyan-700 transition inline-flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                        Lihat
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                                    Tidak ada dokumen arsip yang sesuai dengan kriteria pencarian Anda.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $archivedData->links() }}
            </div>
            
        </div>
    </div>
</div>
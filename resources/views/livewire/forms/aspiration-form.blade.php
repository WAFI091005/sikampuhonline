<div>
<div class="fixed right-4 bottom-4 z-50">

<button wire:click="toggleForm" 
    class="flex items-center space-x-2 bg-white text-gray-800 p-3 rounded-xl shadow-2xl border-l-4 border-cyan-600 hover:bg-gray-100 transition duration-300 transform hover:scale-105">

    <!-- SVG headset -->
    <svg class="w-6 h-6 text-cyan-600" fill="currentColor" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
        <path d="M256 32C132.3 32 32 132.3 32 256v112c0 13.3 10.7 24 24 24h56v-96H80v-40c0-97.2 78.8-176 176-176s176 78.8 176 176v40h-32v96h56c13.3 0 24-10.7 24-24V256c0-123.7-100.3-224-224-224zM160 352v64c0 17.7 14.3 32 32 32h48v-96H160zm112 0v96h48c17.7 0 32-14.3 32-32v-64h-80z"/>
    </svg>

    <span class="text-base font-semibold">Pengaduan & Aspirasi</span>
</button>


    @if ($isOpen)
    <div class="absolute bottom-full right-0 mb-4 w-72 bg-white rounded-xl shadow-2xl overflow-hidden border border-gray-200 animate-slide-up">
        
        <div class="bg-teal-700 text-white p-3 flex justify-between items-center">
            <h3 class="text-base font-bold">Ajukan Aspirasi Anda</h3>
            <button wire:click="toggleForm" class="text-white hover:text-gray-200 p-1 rounded-full hover:bg-teal-600 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        @if (session()->has('message'))
            <div class="p-3 bg-green-100 text-green-700 text-sm font-medium">
                {{ session('message') }}
            </div>
        @endif

        <!-- Menambahkan wire:loading.attr="disabled" pada form submission untuk mencegah double click -->
        <form wire:submit.prevent="submitForm" class="p-4 space-y-3"> 
            
            <div>
                <label for="name" class="block text-xs font-medium text-gray-700">Nama</label>
                <input wire:model.defer="name" type="text" id="name" placeholder="Masukkan nama anda" 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm p-2 text-sm bg-gray-100 focus:ring-cyan-500 focus:border-cyan-500 @error('name') border-red-500 @enderror">
                @error('name') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="phone" class="block text-xs font-medium text-gray-700">No Telepon/WA</label>
                <input wire:model.defer="phone" type="text" id="phone" placeholder="Masukkan nomor telepon/WA aktif anda" 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm p-2 text-sm bg-gray-100 focus:ring-cyan-500 focus:border-cyan-500 @error('phone') border-red-500 @enderror">
                @error('phone') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
            </div>
            
            <div>
                <label for="content" class="block text-xs font-medium text-gray-700">Aspirasi & Pengaduan</label>
                <textarea wire:model.defer="content" id="content" placeholder="Masukkan keluhan, kesan atau keresahan anda" rows="3" 
                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm p-2 text-sm bg-gray-100 focus:ring-cyan-500 focus:border-cyan-500 @error('content') border-red-500 @enderror"></textarea>
                <p class="text-xs text-gray-500 mt-1">*max 100 kata</p>
                @error('content') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
            </div>

            <!-- INPUT FILE UNTUK GAMBAR -->
            <div>
                <label for="image" class="block text-xs font-medium text-gray-700">Lampiran Gambar (Max 1MB)</label>
                
                <input wire:model="image" type="file" id="image" class="hidden" accept="image/*">
                
                <label for="image" class="mt-1 flex items-center p-2 w-full rounded-md bg-gray-100 border cursor-pointer 
                                        @error('image') border-red-500 @enderror">
                    <svg class="w-4 h-4 mr-1 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.414a1 1 0 000-1.414l-6.707-6.707a1 1 0 00-1.414 0l-6.707 6.707a2 2 0 102.828 2.828L15 8.172"></path></svg>
                    <span class="text-gray-500 text-xs truncate">
                        {{ $image ? $image->getClientOriginalName() : 'Masukkan gambar...' }}
                    </span>
                    <span wire:loading wire:target="image" class="ml-auto text-cyan-600">Mengunggah...</span>
                </label>
                
                @error('image') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror

                <!-- Pratinjau Gambar (Optional) -->
                @if ($image)
                    <img src="{{ $image->temporaryUrl() }}" class="mt-2 w-full h-20 object-cover rounded-md shadow-sm border">
                @endif
            </div>

            <button type="submit" wire:loading.attr="disabled" wire:target="image, submitForm"
                    class="w-full flex items-center justify-center space-x-2 bg-yellow-400 text-gray-800 p-2 rounded-lg font-bold text-sm shadow-md hover:bg-yellow-500 transition duration-150 disabled:bg-gray-400">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                <span wire:loading.remove wire:target="submitForm">Kirim</span>
                <span wire:loading wire:target="submitForm">Memproses...</span>
            </button>
        </form>

    </div>
    @endif
</div>

<style>
    /* Animasi tetap sama */
    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    .animate-slide-up {
        animation: slideUp 0.3s ease-out forwards;
    }
</style>
</div>
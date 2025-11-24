<div class="antialiased">
    
    <div class="max-w-4xl mx-auto px-4 py-12">
        
        <div class="text-center mb-8">
            <h2 class="bg-green-600 text-white text-center py-3 px-6 rounded-lg inline-block font-bold text-xl">
                Layanan Persuratan
            </h2>
        </div>

        @if (!$forceLoggedIn)
            {{-- Bagian Login --}}
            <div class="border border-gray-300 p-6 rounded-lg bg-gray-50 shadow-md">
                <p class="text-gray-700 text-center italic">
                    Maaf Anda belum login. Silahkan **login** terlebih dahulu menggunakan **NIK yang terdaftar**.
                </p>
                <div class="text-center mt-4">
                    <a href="{{ route('login') }}" class="inline-block bg-sikampuh-teal text-white px-4 py-2 rounded-lg font-semibold hover:bg-teal-700 transition">
                        Login Sekarang
                    </a>
                </div>
            </div>
        @else
            {{-- Bagian Pilihan Layanan --}}
            <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200">
                <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center">Pilih Jenis Surat yang Anda Butuhkan:</h3>
                
                @if (count($availableServicesChunks) > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-6">
                    @foreach ($availableServicesChunks as $column)
                        <ul class="space-y-4">
                            @foreach ($column as $service)
                                <li class="flex items-start space-x-2">
                                    <svg class="w-4 h-4 text-green-600 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                    <button wire:click="openForm({{ $service['id'] }}, '{{ $service['name'] }}')" class="text-gray-700 hover:text-green-600 transition duration-150 text-left font-medium">
                                        {{ $service['name'] }}
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                    @endforeach
                </div>
                @else 
                     <p class="text-center text-gray-500">Tidak ada layanan aktif yang ditemukan.</p>
                @endif
                
                <div class="text-center mt-8">
                    <a href="{{ route('layanan.status') }}" class="inline-block bg-yellow-400 text-gray-800 font-bold px-6 py-2 rounded-lg shadow-md hover:bg-yellow-500 transition">
                        Lacak Status Pengajuan Surat
                    </a>
                </div>
            </div>

            {{-- Bagian Formulir yang Dibuka (Termasuk kode HTML Form Anda sebelumnya) --}}
            @if ($isFormOpen)
                <div class="mt-8">
                    <div class="bg-white p-6 md:p-8 rounded-xl shadow-2xl border border-gray-200">
                        <div class="bg-teal-700 text-white text-center py-3 rounded-t-xl -mt-6 mx-auto w-11/12 font-bold text-lg">
                            Formulir Layanan Persuratan
                        </div>
                        
                        <h4 class="text-xl font-bold text-gray-800 text-center mt-4 mb-6">
                            Pengajuan: {{ $selectedServiceName }}
                        </h4>

                        <form wire:submit.prevent="submitService" class="space-y-4">
                            
                            <label class="block text-sm font-semibold text-gray-700">Nama Lengkap Pemohon:</label>
                            <input wire:model.defer="formData.applicant_name" type="text" placeholder="Nama Lengkap" class="w-full p-3 rounded-lg bg-gray-100 border-none focus:ring-teal-500">
                            @error('formData.applicant_name') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                            
                            <label class="block text-sm font-semibold text-gray-700">NIK:</label>
                            <input wire:model.defer="formData.nik" type="text" placeholder="NIK Pemohon (16 digit)" class="w-full p-3 rounded-lg bg-gray-100 border-none focus:ring-teal-500">
                            @error('formData.nik') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                            
                            <div class="flex space-x-4">
                                <div class="w-1/2">
                                    <label class="block text-sm font-semibold text-gray-700">No. Telepon/WA:</label>
                                    <input wire:model.defer="formData.phone" type="text" placeholder="Nomor aktif" class="w-full p-3 rounded-lg bg-gray-100 border-none focus:ring-teal-500">
                                    @error('formData.phone') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                                </div>
                                <div class="w-1/2">
                                    <label class="block text-sm font-semibold text-gray-700">Jenis Kelamin:</label>
                                    <select wire:model.defer="formData.gender" class="w-full p-3 rounded-lg bg-gray-100 border-none focus:ring-teal-500">
                                        <option value="">Pilih...</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                    @error('formData.gender') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            
                            <label class="block text-sm font-semibold text-gray-700">Alamat Pemohon:</label>
                            <textarea wire:model.defer="formData.address" rows="3" placeholder="Alamat Lengkap sesuai KTP" class="w-full p-3 rounded-lg bg-gray-100 border-none focus:ring-teal-500"></textarea>
                            @error('formData.address') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror

                            <label class="block text-sm font-semibold text-gray-700">Alamat Email (Opsional):</label>
                            <input wire:model.defer="formData.email" type="email" placeholder="Alamat Email" class="w-full p-3 rounded-lg bg-gray-100 border-none focus:ring-teal-500">

                            @if($customFormView)
                                <div class="border-t border-gray-300 pt-4 mt-4 space-y-4">
                                    <h4 class="text-lg font-bold text-gray-800 border-l-4 border-yellow-500 pl-3">Persyaratan & Detail Khusus</h4>
                                    {{-- Custom form partials akan di-include di sini --}}
                                    @include($customFormView) 
                                </div>
                            @endif
                            
                            <div class="pt-6 text-right">
                                <button type="submit" 
                                        wire:loading.attr="disabled"
                                        wire:target="submitService"
                                        class="w-full flex items-center justify-center space-x-2 bg-teal-600 text-white font-bold p-3 rounded-lg shadow-lg hover:bg-teal-700 transition disabled:bg-gray-400">
                                    <span wire:loading.remove wire:target="submitService">Ajukan Surat</span>
                                    <span wire:loading wire:target="submitService">Memproses Pengajuan...</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
            
        @endif
        
    </div>
    
</div>

{{-- SCRIPT SWEETALERT UNTUK MENANGKAP EVENT SUCCESS/ERROR --}}
<script>
    document.addEventListener('livewire:initialized', () => {
        Livewire.on('applicationSubmitted', (event) => {
            // Livewire 3 mengirim payload sebagai array, ambil elemen pertama
            const data = event[0]; 
            
            Swal.fire({
                title: data.title,
                html: data.message, 
                icon: data.type, // 'success' atau 'error'
                confirmButtonText: data.type === 'success' ? 'Lacak Status' : 'Tutup',
                confirmButtonColor: data.type === 'success' ? '#10B981' : '#EF4444', 
                showCancelButton: data.type === 'success',
                cancelButtonText: 'Tutup'
            }).then((result) => {
                // Redirect ke halaman status pengajuan setelah user klik tombol Lacak
                if (result.isConfirmed && data.type === 'success') {
                    // Menggunakan route helper Laravel untuk URL yang benar
                    window.location.href = '{{ route("layanan.status") }}' + '?code=' + data.code; 
                }
            });
        });
    });
</script>
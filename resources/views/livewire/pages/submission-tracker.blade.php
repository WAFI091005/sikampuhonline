<div class="antialiased">
    
    <div class="relative bg-cover bg-center h-[200px] flex items-center justify-center text-white bg-sikampuh-teal shadow-xl">
        <div class="relative z-10 text-center">
            <h1 class="text-4xl font-extrabold mb-1">Status Pengajuan</h1>
            <p class="text-lg font-medium tracking-wider">Lacak Semua Surat Anda</p>
        </div>
    </div>
    
    <div class="max-w-6xl mx-auto px-4 py-12">
        
        @auth
            @if ($pendingCount > 0)
            <div class="p-4 mb-6 text-sm text-red-700 bg-red-100 rounded-lg flex items-center space-x-3 shadow-md">
                <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 001 1h2a1 1 0 100-2h-1V6z" clip-rule="evenodd"></path></svg>
                <span class="font-semibold">Jumlah pengajuan surat yang butuh dikonfirmasi: {{ $pendingCount }} Pengajuan</span>
            </div>
            @endif

            <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200">
                
                @if ($submissions->isNotEmpty())
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Pemohon</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis Surat</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nomor & Tgl Surat</th>
                                <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($submissions as $submission)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $submission->applicant_name }}
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-600">
                                        {{ $submission->service->name ?? '-' }} 
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-600">
                                        <div class="font-semibold">{{ $submission->submission_code }}</div>
                                        <div class="text-xs text-gray-500">{{ $submission->created_at->format('d M Y') }}</div>
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap text-center text-sm">
                                        @include('livewire.pages.submission-status-badge', ['status' => $submission->status])
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap text-center text-sm font-medium">
                                        
                                        @if ($submission->status === 'Rejected')
                                            <button wire:click="showRejectionReason({{ $submission->id }})" 
                                                    class="text-red-600 hover:text-red-800 font-medium">
                                                Lihat Alasan
                                            </button>
                                        @else
                                            <a href="#" class="text-blue-600 hover:text-blue-800 font-medium">Detail</a>
                                        @endif
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-6">
                    {{ $submissions->links() }}
                </div>
                
                <div class="mt-8">
                    <a href="{{ route('layanan.index') }}" class="inline-flex items-center bg-green-600 text-white font-bold px-6 py-2 rounded-lg shadow-md hover:bg-green-700 transition">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7"></path></svg>
                        Kembali ke Formulir
                    </a>
                </div>
                
            </div>
            @else
                <div class="p-8 text-center text-gray-500">
                    <p class="font-semibold text-lg mb-2">Anda belum memiliki pengajuan surat saat ini.</p>
                    <a href="{{ route('layanan.index') }}" class="text-green-600 hover:text-green-700 font-medium">Ajukan Surat Pertama Anda</a>
                </div>
            @endif
        
        @else
            <div class="p-6 text-center border border-gray-300 rounded-lg shadow-md">
                <p class="text-gray-700 mb-4">Silakan login untuk melihat daftar pengajuan surat Anda.</p>
                <a href="{{ route('login') }}" class="inline-block bg-sikampuh-teal text-white px-6 py-2 rounded-lg font-semibold hover:bg-teal-700 transition">
                    Login Sekarang
                </a>
            </div>
        @endauth
        
    </div>
    
    @if ($showRejectionModal)
    <div class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.398 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                Alasan Penolakan Pengajuan
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    Dokumen atau persyaratan Anda ditolak dengan alasan sebagai berikut:
                                </p>
                                <div class="mt-4 p-3 bg-red-50 border border-red-200 rounded-md">
                                    <p class="text-red-700 whitespace-pre-wrap">{{ $rejectionReason }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button wire:click="closeRejectionModal" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
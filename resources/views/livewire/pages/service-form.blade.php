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
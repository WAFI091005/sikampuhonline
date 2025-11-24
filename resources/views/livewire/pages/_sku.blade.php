<div>
    <label class="block text-sm font-semibold text-gray-700">Nama Usaha:</label>
    <input wire:model.defer="formData.unique_details.nama_usaha" type="text" placeholder="Contoh: Warung Sembako Bahagia" 
           class="w-full p-3 rounded-lg bg-gray-100 border-none focus:ring-teal-500">
    @error('formData.unique_details.nama_usaha') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror

    <label class="block text-sm font-semibold text-gray-700 mt-4">Jenis/Bidang Usaha:</label>
    <input wire:model.defer="formData.unique_details.bidang_usaha" type="text" placeholder="Contoh: Perdagangan (Sembako) / Jasa (Bengkel)" 
           class="w-full p-3 rounded-lg bg-gray-100 border-none focus:ring-teal-500">
    @error('formData.unique_details.bidang_usaha') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror

    <label class="block text-sm font-semibold text-gray-700 mt-4">Alamat Tempat Usaha:</label>
    <textarea wire:model.defer="formData.unique_details.alamat_usaha" rows="2" placeholder="Alamat lengkap tempat usaha" 
           class="w-full p-3 rounded-lg bg-gray-100 border-none focus:ring-teal-500"></textarea>
    @error('formData.unique_details.alamat_usaha') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
</div>
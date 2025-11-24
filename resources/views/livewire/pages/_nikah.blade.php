<div>
    <label class="block text-sm font-semibold text-gray-700">NIK Calon Pasangan:</label>
    <input wire:model.defer="formData.unique_details.nik_pasangan" type="text" placeholder="NIK Calon Pasangan Anda" 
           class="w-full p-3 rounded-lg bg-gray-100 border-none focus:ring-teal-500">
    @error('formData.unique_details.nik_pasangan') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror

    <label class="block text-sm font-semibold text-gray-700 mt-4">Status Pernikahan Sebelumnya:</label>
    <select wire:model.defer="formData.unique_details.status_pernikahan" class="w-full p-3 rounded-lg bg-gray-100 border-none focus:ring-teal-500">
        <option value="">Pilih status...</option>
        <option value="Jejaka/Perawan">Jejaka / Perawan</option>
        <option value="Duda/Janda">Duda / Janda</option>
    </select>
    @error('formData.unique_details.status_pernikahan') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
    
    <p class="mt-4 text-xs text-red-600 border-t border-dashed pt-2">
        **Peringatan:** Pengajuan ini memerlukan dokumen pendukung (Surat Keterangan Kematian/Akta Cerai jika Duda/Janda).
    </p>
</div>
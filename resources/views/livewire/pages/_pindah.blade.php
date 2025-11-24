<div>
    <label class="block text-sm font-semibold text-gray-700">Alamat Pindah (Provinsi/Kabupaten):</label>
    <input wire:model.defer="formData.unique_details.alamat_pindah_prov" type="text" placeholder="Contoh: Bandung, Jawa Barat" 
           class="w-full p-3 rounded-lg bg-gray-100 border-none focus:ring-teal-500">
    @error('formData.unique_details.alamat_pindah_prov') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror

    <label class="block text-sm font-semibold text-gray-700 mt-4">Alasan Pindah:</label>
    <select wire:model.defer="formData.unique_details.alasan_pindah" class="w-full p-3 rounded-lg bg-gray-100 border-none focus:ring-teal-500">
        <option value="">Pilih alasan...</option>
        <option value="Pekerjaan">Pekerjaan</option>
        <option value="Pendidikan">Pendidikan</option>
        <option value="Ikut Pasangan">Ikut Pasangan</option>
        <option value="Lainnya">Lainnya</option>
    </select>
    @error('formData.unique_details.alasan_pindah') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
    
    <p class="mt-4 text-xs text-gray-600 border-t border-dashed pt-2">
        **Perhatian:** Proses pindah memerlukan verifikasi data kependudukan yang lengkap.
    </p>
</div>
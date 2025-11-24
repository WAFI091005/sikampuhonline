<div>
    <label class="block text-sm font-semibold text-gray-700">Keperluan Pengajuan SKTM:</label>
    <input wire:model.defer="formData.unique_details.keperluan" type="text" placeholder="Contoh: Bantuan biaya rumah sakit / Sekolah anak" 
           class="w-full p-3 rounded-lg bg-gray-100 border-none focus:ring-teal-500">
    @error('formData.unique_details.keperluan') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror

    <label class="block text-sm font-semibold text-gray-700 mt-4">Keterangan Tambahan (Misal: Nama Anak yang Sekolah):</label>
    <input wire:model.defer="formData.unique_details.keterangan_tambahan" type="text" placeholder="Isi jika diperlukan" 
           class="w-full p-3 rounded-lg bg-gray-100 border-none focus:ring-teal-500">
    
    <p class="mt-4 text-xs text-gray-600 border-t border-dashed pt-2">
        **Catatan:** Mohon siapkan berkas pendukung (Kartu Keluarga, KTP orang tua) saat mengambil surat di kantor.
    </p>
</div>
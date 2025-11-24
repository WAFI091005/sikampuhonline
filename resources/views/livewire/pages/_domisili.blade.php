<div>
    <label class="block text-sm font-semibold text-gray-700">Tujuan Penggunaan Surat Domisili:</label>
    <input wire:model.defer="formData.unique_details.tujuan_domisili" type="text" placeholder="Contoh: Pengurusan Beasiswa / Persyaratan Kerja" 
           class="w-full p-3 rounded-lg bg-gray-100 border-none focus:ring-teal-500">
    @error('formData.unique_details.tujuan_domisili') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror

    <label class="block text-sm font-semibold text-gray-700 mt-4">Keterangan Tambahan (Opsional):</label>
    <textarea wire:model.defer="formData.unique_details.keterangan_tambahan" rows="2" placeholder="Isi keterangan lain jika diperlukan" 
           class="w-full p-3 rounded-lg bg-gray-100 border-none focus:ring-teal-500"></textarea>
    
    <p class="mt-4 text-xs text-gray-600 border-t border-dashed pt-2">
        **Catatan:** Dokumen yang dibutuhkan: Foto Copy KTP & Kartu Keluarga.
    </p>
</div>
<div>
    <label class="block text-sm font-semibold text-gray-700">Keperluan Pengantar Kepolisian:</label>
    <input wire:model.defer="formData.unique_details.keperluan_polisi" type="text" placeholder="Contoh: Pengurusan SKCK / Laporan kehilangan" 
           class="w-full p-3 rounded-lg bg-gray-100 border-none focus:ring-teal-500">
    @error('formData.unique_details.keperluan_polisi') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror

    <label class="block text-sm font-semibold text-gray-700 mt-4">Alamat Tujuan Pengurusan:</label>
    <input wire:model.defer="formData.unique_details.alamat_tujuan" type="text" placeholder="Contoh: Polres Cilacap / Polsek Kroya" 
           class="w-full p-3 rounded-lg bg-gray-100 border-none focus:ring-teal-500">
    @error('formData.unique_details.alamat_tujuan') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
    
    <p class="mt-4 text-xs text-gray-600 border-t border-dashed pt-2">
        **Catatan:** Pastikan Anda memiliki berkas yang diperlukan oleh pihak Kepolisian.
    </p>
</div>
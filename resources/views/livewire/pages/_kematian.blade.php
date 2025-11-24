<div>
    <label class="block text-sm font-semibold text-gray-700">Nama Lengkap yang Meninggal:</label>
    <input wire:model.defer="formData.unique_details.nama_meninggal" type="text" placeholder="Nama Lengkap Almarhum/Almarhumah" 
           class="w-full p-3 rounded-lg bg-gray-100 border-none focus:ring-teal-500">
    @error('formData.unique_details.nama_meninggal') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror

    <label class="block text-sm font-semibold text-gray-700 mt-4">Tanggal Kematian:</label>
    <input wire:model.defer="formData.unique_details.tanggal_kematian" type="date" class="w-full p-3 rounded-lg bg-gray-100 border-none focus:ring-teal-500">
    @error('formData.unique_details.tanggal_kematian') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror

    <label class="block text-sm font-semibold text-gray-700 mt-4">Tempat Kematian:</label>
    <input wire:model.defer="formData.unique_details.tempat_kematian" type="text" placeholder="Contoh: Rumah Sakit / Rumah Pribadi" 
           class="w-full p-3 rounded-lg bg-gray-100 border-none focus:ring-teal-500">
</div>
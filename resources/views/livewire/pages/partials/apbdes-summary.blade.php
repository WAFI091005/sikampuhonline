<h3 class="text-2xl font-bold text-gray-800 mb-1">{{ $summaryData['title'] }}</h3>
<p class="text-sm text-gray-500 mb-6">Diperbarui: {{ $summaryData['date'] }}</p>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="p-4 bg-green-50 rounded-lg shadow-md border-l-4 border-green-600">
        <p class="text-sm text-gray-600 font-semibold">Total Penerimaan</p>
        <p class="text-xl font-extrabold text-green-800 mt-1">Rp{{ number_format($summaryData['total_revenue'], 0, ',', '.') }}</p>
    </div>
    <div class="p-4 bg-red-50 rounded-lg shadow-md border-l-4 border-red-600">
        <p class="text-sm text-gray-600 font-semibold">Total Belanja</p>
        <p class="text-xl font-extrabold text-red-800 mt-1">Rp{{ number_format($summaryData['total_expenditure'], 0, ',', '.') }}</p>
    </div>
    <div class="p-4 bg-blue-50 rounded-lg shadow-md border-l-4 border-blue-600">
        <p class="text-sm text-gray-600 font-semibold">Jumlah Proyek</p>
        <p class="text-xl font-extrabold text-blue-800 mt-1">{{ $summaryData['project_count'] }} Proyek</p>
    </div>
</div>

<div class="bg-gray-100 p-4 rounded-lg shadow-inner max-w-lg mx-auto">
    <a href="{{ $summaryData['document_link'] }}" target="_blank">
        <img src="{{ $summaryData['image'] }}" alt="Dokumen APBDes {{ $activeYear }}" class="w-full h-auto rounded-md shadow-lg border border-gray-300 hover:opacity-90 transition duration-200">
    </a>
</div>

<p class="text-center text-sm text-gray-500 mt-4">
    @if ($summaryData['document_link'] != '#')
        Klik gambar untuk melihat dokumen lengkap (PDF/Image).
    @else
        Dokumen lengkap tidak tersedia.
    @endif
</p>

@if ($summaryData['summary_text'])
    <hr class="my-10">
    <div class="prose max-w-none">
        <h4 class="text-xl font-bold mb-3">Ringkasan Naratif</h4>
        {!! $summaryData['summary_text'] !!}
    </div>
@endif
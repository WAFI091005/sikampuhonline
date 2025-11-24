<h3 class="text-2xl font-bold text-red-700 mb-6">Belanja & Pengeluaran Desa Tahun {{ $activeYear }}</h3>
@if ($summaryData['expenditures']->count() > 0)
    <div class="bg-white shadow-xl rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-red-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-bold text-red-700 uppercase tracking-wider">Pos Belanja</th>
                    <th class="px-6 py-3 text-right text-xs font-bold text-red-700 uppercase tracking-wider">Jumlah Anggaran</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($summaryData['expenditures'] as $expenditure)
                    <tr class="hover:bg-red-50/50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $expenditure->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-right font-bold text-red-600">Rp{{ number_format($expenditure->amount, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
                <tr class="bg-red-100/50 font-extrabold">
                    <td class="px-6 py-4 whitespace-nowrap text-base text-gray-800">TOTAL BELANJA</td>
                    <td class="px-6 py-4 whitespace-nowrap text-base text-right text-red-800">Rp{{ number_format($summaryData['total_expenditure'], 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@else
    <div class="p-6 bg-yellow-50 border-l-4 border-yellow-500 text-yellow-800 rounded-lg">Data Belanja tahun {{ $activeYear }} belum dimasukkan.</div>
@endif
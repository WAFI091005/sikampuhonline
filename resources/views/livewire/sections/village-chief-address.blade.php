<div class="px-4 py-6 md:py-12 bg-white shadow-lg rounded-xl max-w-7xl mx-auto my-8">
    <h2 class="text-4xl font-extrabold mb-8 text-gray-800 border-b pb-4">
        Sambutan Kepala Desa
    </h2>

    <div class="flex flex-col md:flex-row items-start md:space-x-10">
        {{-- Foto Kepala Desa --}}
        <div class="flex-shrink-0 mb-6 md:mb-0">
            <div class="w-48 h-48 bg-gray-300 rounded-lg shadow-xl overflow-hidden border-4 border-gray-100 p-1 transform hover:scale-105 transition duration-300">
                @php
                    $photoPath = $chiefImage;

                    // Kalau file ada di storage publik (contoh: officials/namafile.jpg)
                    if ($chief && $chief->photo_url && file_exists(public_path('storage/' . $chief->photo_url))) {
                        $photoPath = asset('storage/' . $chief->photo_url);
                    }
                @endphp

                <img src="{{ $photoPath }}"
                     alt="Kepala Desa {{ $chiefName }}"
                     class="object-cover w-full h-full rounded-md">
            </div>
        </div>

        {{-- Isi Sambutan --}}
        <div class="flex-grow">
            <blockquote class="text-xl italic text-gray-700 border-l-4 border-cyan-500 pl-4 space-y-4">
                <p class="mb-4 font-serif leading-relaxed">
                    {{ $chiefGreeting }}
                </p>

                <footer class="mt-4 pt-2 border-t border-gray-100">
                    <p class="text-lg font-semibold text-gray-900">
                        {{ $chiefName }}
                    </p>
                    <p class="text-sm text-cyan-600 font-medium">
                        {{ $chiefTitle }}
                    </p>
                </footer>
            </blockquote>
        </div>
    </div>
</div>

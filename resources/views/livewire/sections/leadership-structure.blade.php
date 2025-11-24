<div class="max-w-7xl mx-auto">

    <!-- Struktur Organisasi -->
    <div class="px-4 py-6 md:py-12 text-center">
        <h2 class="text-4xl font-extrabold mb-2 text-gray-800">LEADERSHIP STRUCTURE</h2>
        <p class="text-gray-600 mb-10">Jajaran Organisasi Desa Sikampuh</p>
        
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-8 max-w-6xl mx-auto">
            @forelse ($officials as $official)
                <div class="flex flex-col items-center group">
                    @php
                        // Tentukan path gambar
                        $photoPath = 'https://placehold.co/128x128/c0c0c0/333333?text=' . urlencode(str_replace(' ', '+', $official->title));
                        if ($official->photo_url && file_exists(public_path('storage/' . $official->photo_url))) {
                            $photoPath = asset('storage/' . $official->photo_url);
                        }
                    @endphp

                    <!-- Foto Pejabat -->
                    <div class="w-32 h-32 mb-3 bg-gray-200 rounded-lg shadow-md overflow-hidden border-2 border-white transform group-hover:scale-105 transition duration-300 ease-out">
                        <img src="{{ $photoPath }}" 
                             alt="{{ $official->name }}" 
                             class="object-cover w-full h-full">
                    </div>

                    <!-- Nama & Jabatan -->
                    <p class="font-bold text-lg text-gray-800">{{ $official->name }}</p>
                    <p class="text-sm text-gray-500">{{ $official->title }}</p>
                </div>
            @empty
                <p class="text-center md:col-span-4 text-gray-500">Data struktur organisasi belum tersedia.</p>
            @endforelse
        </div>
    </div>

    <!-- Garis Pemisah -->
    <hr class="my-8 border-gray-300 mx-4 md:mx-0">

    <!-- Denah Desa -->
    <div class="px-4 py-6 md:py-12">
        <h2 class="text-4xl font-extrabold mb-2 text-gray-800 text-center md:text-left">DENAH DESA</h2>
        <p class="text-gray-600 mb-6 text-center md:text-left">Peta Desa Sikampuh</p>

        <div class="aspect-w-16 aspect-h-9 w-full rounded-lg shadow-xl overflow-hidden border border-gray-300">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.1222308390465!2d108.83676677507267!3d-7.343214172040063!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6fb7bfe90caa69%3A0x50f2dc0ee7e1f3cb!2sDesa%20Sikampuh%2C%20Wanareja%2C%20Cilacap%2C%20Jawa%20Tengah!5e0!3m2!1sid!2sid!4v1731157200000!5m2!1sid!2sid" 
                width="100%" 
                height="450" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>

        <div class="text-center mt-6">
            <a href="https://maps.app.goo.gl/Zq3SPk2nDpcLnu7bA" 
               target="_blank" 
               class="inline-block bg-green-600 text-white px-6 py-2 rounded-full hover:bg-green-700 transition">
                Lihat Rute ke Desa Sikampuh
            </a>
        </div>
    </div>
</div>

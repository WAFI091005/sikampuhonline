<div class="max-w-7xl mx-auto px-4 py-12 md:py-16">
    <h2 class="text-3xl md:text-4xl font-extrabold mb-10 text-center text-gray-800">BERITA DESA HARI INI</h2>
    
    <div class="flex flex-col lg:flex-row lg:space-x-8 items-stretch"> 
        
        <div class="lg:w-1/3 mb-8 lg:mb-0 pr-4 border-l-4 border-cyan-500 pl-4 
                    flex items-center justify-start">
            
            <div>
                <h3 class="text-3xl font-bold text-gray-900 mb-2">{{ $newsTodayTitle }}</h3>
                <hr class="w-1/3 mb-4 border-cyan-500 border-2">
                
                <p class="text-gray-600 leading-relaxed line-clamp-4">
                    {{ $newsTodayContent }}
                </p>
            </div>
        </div>

        <div class="lg:w-2/3 bg-gray-200 p-6 md:p-8 rounded-xl shadow-lg flex-shrink-0">
            
            @forelse ($latestNews as $news)
                <div class="flex space-x-4 mb-6 pb-6 @if (!$loop->last) border-b border-gray-300 @endif">
                    
                    <div class="flex-shrink-0 w-24 h-16 md:w-32 md:h-20 bg-gray-300 rounded overflow-hidden">
                        <img src="{{ $news['image'] }}" alt="Gambar Berita" class="object-cover w-full h-full">
                    </div>
                    
                    <div>
                        <h4 class="text-lg font-bold text-gray-900 mb-1">{{ $news['title'] }}</h4>
                        <p class="text-sm text-gray-600 mb-2 line-clamp-2">
                            {{ $news['summary'] }}
                        </p>
                        <a href="{{ $news['link'] }}" class="text-cyan-600 hover:text-cyan-800 text-sm font-semibold transition duration-150">
                            Baca Selengkapnya Disini...
                        </a>
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-500">Belum ada berita yang tersedia.</p>
            @endforelse
            
        </div>
    </div>
</div>
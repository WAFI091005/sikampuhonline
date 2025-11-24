<div class="antialiased">
    <div class="max-w-7xl mx-auto px-4 py-12">
        @if ($news)
            <div class="text-center mb-8">
                <h2 class="text-xl font-extrabold text-gray-800 mb-4">BERITA SIKAMPUH</h2>
                <div class="flex items-center justify-center text-lg font-semibold text-gray-700">
                    <a href="#" class="mx-3 hover:text-gray-900 transition">&lt;</a>
                    <span>{{ $news->published_at->format('d F Y') }}</span>
                    <a href="#" class="mx-3 hover:text-gray-900 transition">&gt;</a>
                </div>
            </div>

            <div class="flex flex-col lg:flex-row lg:space-x-8">
                <div class="lg:w-1/2">
                    <div class="mb-8 border-l-4 border-yellow-600 pl-4">
                        <img src="{{ $news->main_image_url }}" alt="{{ $news->title }}" class="w-full h-auto rounded-lg shadow-lg border border-gray-300">
                    </div>

                    <div class="p-4 bg-gray-50 rounded-lg border-l-4 border-yellow-600 shadow-md">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">Dokumentasi</h3>
                        <div class="grid grid-cols-3 gap-3">
                            @foreach ($documentationImages as $item)
                                <div 
                                    wire:click="@if($item['id']) navigateToNews({{ $item['id'] }}) @endif"
                                    class="relative aspect-[4/3] rounded-md border border-gray-200 shadow-sm overflow-hidden cursor-pointer 
                                        transition duration-150 
                                        @if($item['id']) hover:ring-2 hover:ring-cyan-500 @else opacity-50 @endif">
                                    
                                    <img 
                                        src="{{ $item['url'] }}" 
                                        alt="{{ $item['title'] }}" 
                                        class="absolute inset-0 w-full h-full object-cover" />
                                    
                                    @if(!$item['id'])
                                        <span class="absolute inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center text-xs text-white">
                                            N/A
                                        </span>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="lg:w-1/2 mt-8 lg:mt-0">
                    <h3 class="text-2xl font-extrabold text-gray-900 mb-4">{{ $news->title }}</h3>
                    <p class="text-gray-700 leading-relaxed mb-6">
                        {{ $news->content }}
                    </p>
                </div>
            </div>
        @else
            <div class="text-center py-20">
                <h2 class="text-3xl font-extrabold text-gray-800 mb-4">Belum Ada Berita Tersedia</h2>
                <p class="text-gray-600">Mohon masukkan data berita ke database terlebih dahulu.</p>
            </div>
        @endif
    </div>
</div>

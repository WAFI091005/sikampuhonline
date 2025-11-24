<div class="antialiased">
    
    <div 
        class="relative bg-cover bg-center h-[700px] flex items-center justify-center text-white shadow-xl bg-fixed"
        style="background-image: url('{{ asset('images/sawah.jpg') }}'); filter: brightness(0.7);"
    >
        <div class="absolute inset-0 bg-black bg-opacity-40"></div>
        <div class="relative z-10 text-center">
            <p class="text-xl font-medium tracking-wider">Publikasi</p>
            <h1 class="text-5xl font-extrabold mt-2">Keuangan & APBDes</h1>
        </div>
    </div>

    
    <div class="max-w-7xl mx-auto px-4 py-12">
        
        <div class="flex flex-col lg:flex-row lg:space-x-8">
            
            <div class="lg:w-3/4" wire:loading.class="opacity-50" wire:target="setActiveYear, setActiveTab">
                
                <div class="flex space-x-0 border-b-2 border-gray-300 mb-8">
                    @foreach ($availableYears as $year)
                        <button wire:key="year-{{ $year }}" wire:click="setActiveYear({{ $year }})" 
                                class="px-4 py-2 font-bold text-lg transition duration-200 
                                     @if ($activeYear == $year) 
                                         text-green-700 border-b-4 border-green-700 
                                     @else 
                                         text-gray-500 hover:text-green-600 hover:border-b-4 hover:border-green-300
                                     @endif">
                            {{ $year }}
                        </button>
                    @endforeach
                </div>
                
                <div wire:loading wire:target="setActiveYear, setActiveTab" class="text-center py-10">
                    <svg class="animate-spin h-8 w-8 text-green-600 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <p class="mt-2 text-gray-500">Memuat data...</p>
                </div>
                <div wire:key="content-{{ $activeYear }}-{{ $activeTab }}" wire:loading.remove wire:target="setActiveYear, setActiveTab">
                    @if ($activeTab == 'summary')
                        @include('livewire.pages.partials.apbdes-summary')
                    @elseif ($activeTab == 'revenue')
                        @include('livewire.pages.partials.apbdes-revenue')
                    @elseif ($activeTab == 'expenditure')
                        @include('livewire.pages.partials.apbdes-expenditure')
                    @elseif ($activeTab == 'projects')
                        @include('livewire.pages.partials.apbdes-projects')
                    @endif
                </div>

            </div>
            
            <div class="lg:w-1/4 mt-10 lg:mt-0">
                <div class="bg-gray-50 p-4 rounded-lg border-l-4 border-green-500 shadow">
                    <h4 class="text-lg font-bold text-gray-800 mb-4">Detail Publikasi {{ $activeYear }}</h4>
                    <div class="space-y-3">
                        @foreach ($tabNavigations as $nav)
                            <button wire:click="setActiveTab('{{ $nav['key'] }}')" 
                                    wire:key="tab-{{ $nav['key'] }}"
                                    class="w-full text-left flex items-center space-x-3 p-3 rounded-lg border transition duration-150 shadow-sm
                                        @if ($activeTab == $nav['key']) 
                                            bg-green-100 border-green-500 hover:bg-green-200 font-bold text-green-700
                                        @else 
                                            bg-white border-gray-200 hover:bg-green-50 font-medium text-gray-700
                                        @endif">
                                
                                <svg class="w-5 h-5 flex-shrink-0 @if ($activeTab == $nav['key']) text-green-700 @else text-green-600 @endif" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $nav['icon'] }}"></path></svg>
                                
                                <span class="text-sm">{{ $nav['title'] }}</span>
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    
</div>
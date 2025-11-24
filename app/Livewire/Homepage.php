<?php

namespace App\Livewire;

use Livewire\Component;

class Homepage extends Component
{
    // Jika Anda menggunakan Blade Component Layout di resources/views/components/layouts/app.blade.php, 
    // Anda tidak perlu mendeklarasikan $layout. Livewire akan mendeteksinya secara otomatis.
    // Jika layout masih di resources/views/layouts/app.blade.php, gunakan:
    // protected static string $layout = 'layouts.app';
    
    public function render()
    {
        return view('livewire.homepage');
    }
}

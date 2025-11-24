<?php

namespace App\Livewire\Forms;

use Livewire\Component;
use Livewire\WithFileUploads; 
use App\Models\Aspiration; 

class AspirationForm extends Component
{
    use WithFileUploads; 

    public $isOpen = false; 

    // ... (Properti lainnya) ...
    public $name = '';
    public $phone = '';
    public $content = '';
    public $image; 

    public function toggleForm()
    {
        $this->isOpen = !$this->isOpen;
        $this->resetErrorBag(); 
    }

    public function submitForm()
    {
        // 1. Validasi data
        $validatedData = $this->validate([
            'name' => 'required|min:3',
            'phone' => 'required|numeric',
            'content' => 'required|max:100', 
            'image' => 'nullable|image|max:5120',
        ]);
        
        $imagePath = null;
        
        // 2. Logika File Upload
        if ($this->image) {
            $folderName = 'aspirasi/' . date('Y') . '/' . date('m'); 
            $imagePath = $this->image->store($folderName, 'public');
        }

        // 3. Simpan Data ke Database
        Aspiration::create([
            'name' => $validatedData['name'],
            'phone' => $validatedData['phone'],
            'content' => $validatedData['content'],
            'image_url' => $imagePath,
            'is_read' => false,
        ]);
        
        // 4. Setelah berhasil:
        session()->flash('message', 'Terima kasih! Pengaduan/Aspirasi Anda telah kami terima dan akan segera diproses.');
        
        // Reset field
        $this->reset(['name', 'phone', 'content', 'image']);
        
        // BARIS INI KAMI HAPUS AGAR FORM TIDAK LANGSUNG TERTUTUP: 
        // $this->isOpen = false;
        
        // Form akan tetap terbuka, tetapi isian sudah kosong dan notifikasi terlihat.
    }
    
    // ... (Metode render) ...
    public function render()
    {
        return view('livewire.forms.aspiration-form');
    }
}
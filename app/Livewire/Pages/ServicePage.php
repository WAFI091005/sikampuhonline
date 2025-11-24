<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Submission; 
use Illuminate\Validation\Rule; 

class ServicePage extends Component
{
    // === PROPERTI UTAMA ===
    public $forceLoggedIn = true; 
    public $isFormOpen = false;
    public $selectedServiceId = null;
    public $selectedServiceName = '';
    public $customFormView = null; // Path partial view khusus
    
    public $formData = [
        'nik' => '',
        'applicant_name' => '',
        'phone' => '',
        'email' => '',
        'gender' => '',
        'address' => '',
        'unique_details' => [], // Data unik per form (disimpan sebagai JSON/Array)
    ];
    
    // Daftar Layanan (Untuk Demo/Mapping View)
    public $availableServices = [
        ['id' => 1, 'name' => 'Surat Keterangan Tidak Mampu (SKTM)', 'view' => '_sktm'],
        ['id' => 2, 'name' => 'Surat Pengantar Nikah (N1-N4)', 'view' => '_nikah'],
        ['id' => 3, 'name' => 'Surat Keterangan Usaha (SKU)', 'view' => '_sku'],
        ['id' => 4, 'name' => 'Surat Keterangan Kematian', 'view' => '_kematian'],
        ['id' => 5, 'name' => 'Surat Keterangan Domisili', 'view' => '_domisili'],
        ['id' => 6, 'name' => 'Surat Pengantar Kepolisian', 'view' => '_kepolisian'], 
        ['id' => 7, 'name' => 'Surat Pengantar Pindah', 'view' => '_pindah'],
    ];

    public function openForm($serviceId, $serviceName)
    {
        $this->selectedServiceId = $serviceId;
        $this->selectedServiceName = $serviceName;
        
        $service = collect($this->availableServices)->firstWhere('id', $serviceId);
        // Pastikan path view sesuai dengan struktur folder Anda (e.g., resources/views/livewire/pages/_sktm.blade.php)
        $this->customFormView = $service ? 'livewire.pages.' . $service['view'] : null; 
        
        if ($this->forceLoggedIn) { 
            $this->isFormOpen = true;
            $this->resetErrorBag();
            $this->formData['unique_details'] = []; // Reset detail unik setiap kali form dibuka
        } else {
            session()->flash('auth_error', 'Anda harus login terlebih dahulu.');
        }
    }

    public function submitService()
    {
        // Aturan validasi dasar
        $rules = [
            'formData.nik' => 'required|numeric|digits:16',
            'formData.applicant_name' => 'required|string|max:255',
            'formData.phone' => 'required|string|max:15',
            'formData.gender' => 'required|in:Laki-laki,Perempuan',
            'formData.address' => 'required|string',
            'formData.email' => 'nullable|email|max:255',
        ];

        // --- VALIDASI TAMBAHAN BERDASARKAN JENIS SURAT ---
        $serviceId = $this->selectedServiceId;
        
        if ($serviceId == 1 || $serviceId == 5 || $serviceId == 6 || $serviceId == 7) { 
            $rules['formData.unique_details.keperluan'] = 'required|string|max:255'; 
            if ($serviceId == 1) { 
                $rules['formData.unique_details.keterangan_tambahan'] = 'nullable|string|max:255';
            }
        } elseif ($serviceId == 2) { 
            $rules['formData.unique_details.nik_pasangan'] = 'required|digits:16';
            $rules['formData.unique_details.status_pernikahan'] = ['required', Rule::in(['Jejaka/Perawan', 'Duda/Janda'])];
        } elseif ($serviceId == 3) {
            $rules['formData.unique_details.nama_usaha'] = 'required|string|max:255';
            $rules['formData.unique_details.bidang_usaha'] = 'required|string|max:255';
            $rules['formData.unique_details.alamat_usaha'] = 'required|string';
        } elseif ($serviceId == 4) {
            $rules['formData.unique_details.nama_meninggal'] = 'required|string|max:255';
            $rules['formData.unique_details.tanggal_kematian'] = 'required|date';
            $rules['formData.unique_details.tempat_kematian'] = 'required|string';
        }
        
        // 1. Lakukan Validasi
        $this->validate($rules);

        // 2. Generate Kode Pelacakan Unik
        $serviceNameClean = preg_replace('/[^A-Za-z0-9]/', '', $this->selectedServiceName);
        $prefix = strtoupper(substr($serviceNameClean, 0, 3));
        $code = $prefix . '-' . time() . rand(100, 999);
        
        try {
            // 3. SIMPAN DATA KE DATABASE (Pastikan model Submission sudah dikonfigurasi)
            Submission::create([
                'service_id' => $serviceId,
                'service_name' => $this->selectedServiceName,
                'submission_code' => $code,
                'user_id' => Auth::check() ? Auth::id() : null,
                'nik' => $this->formData['nik'],
                'applicant_name' => $this->formData['applicant_name'],
                'phone' => $this->formData['phone'],
                'email' => $this->formData['email'],
                'gender' => $this->formData['gender'],
                'address' => $this->formData['address'],
                'unique_details' => $this->formData['unique_details'], // Disimpan sebagai JSON
                'status' => 'Pending',
            ]);
            
            // 4. KIRIM EVENT SUKSES menggunakan Livewire dispatch
            $this->dispatch('applicationSubmitted', [
                'title' => 'Pengajuan Berhasil! 🎉',
                'message' => "Pengajuan surat **{$this->selectedServiceName}** berhasil diajukan. Kode Tracking Anda adalah: **{$code}**",
                'type' => 'success',
                'code' => $code,
            ]);
            
        } catch (\Exception $e) {
            // 4. KIRIM EVENT GAGAL
            $this->dispatch('applicationSubmitted', [
                'title' => 'Gagal Menyimpan!',
                'message' => 'Terjadi kesalahan saat memproses pengajuan. Silakan coba lagi. ' . $e->getMessage(),
                'type' => 'error',
            ]);
            return; 
        }

        // 5. Reset dan Tutup Formulir HANYA JIKA BERHASIL
        $this->reset(['formData', 'isFormOpen', 'selectedServiceId', 'selectedServiceName', 'customFormView']);
        $this->resetErrorBag();
    }

    public function render()
    {
        $customFormView = $this->customFormView;
        $serviceCount = count($this->availableServices);
        $chunks = [];
        if ($serviceCount > 0) {
            $chunkLength = ceil($serviceCount / 2);
            $chunks = array_chunk($this->availableServices, $chunkLength);
        }

        return view('livewire.pages.service-page', [
            'customFormView' => $customFormView, 
            'availableServicesChunks' => $chunks,
        ])->layout('components.layouts.app', ['title' => 'Layanan Persuratan Desa']);
    }
}
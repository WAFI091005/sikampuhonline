<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Submission;
use Illuminate\Support\Facades\Auth;

class SubmissionTracker extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';

    public $pendingCount = 0; 
    
    // ✅ Properti untuk logic modal penolakan
    public $rejectionReason = '';
    public $showRejectionModal = false;

    public function mount()
    {
        if (Auth::check()) {
            $userNik = Auth::user()->nik ?? null;
            if ($userNik) {
                // Hitung pengajuan yang berstatus 'Pending' untuk notifikasi di atas
                $this->pendingCount = Submission::byNik($userNik)
                                                ->where('status', 'Pending')
                                                ->count();
            }
        }
    }
    
    // ✅ Fungsi untuk menampilkan modal penolakan
    public function showRejectionReason($submissionId)
    {
        // Ambil data pengajuan
        $submission = Submission::findOrFail($submissionId);
        
        // Cek otorisasi dasar (NIK pengguna saat ini harus cocok)
        if (Auth::check() && $submission->nik === Auth::user()->nik && $submission->status === 'Rejected') {
            $this->rejectionReason = $submission->rejected_reason ?? 'Tidak ada alasan penolakan spesifik yang dicatat.';
            $this->showRejectionModal = true;
        }
    }
    
    // ✅ Fungsi untuk menutup modal
    public function closeRejectionModal()
    {
        $this->showRejectionModal = false;
        $this->rejectionReason = '';
    }

    public function getSubmissionsProperty()
    {
        $user = Auth::user();
        if ($user && $user->nik) {
            return Submission::byNik($user->nik)
                             ->with('service') 
                             ->orderBy('created_at', 'desc') 
                             ->paginate(10);
        }
        
        return Submission::whereRaw('1 = 0')->paginate(10); 
    }
    
    public function render()
    {
        return view('livewire.pages.submission-tracker', [
            'submissions' => $this->submissions,
        ])->layout('components.layouts.app', ['title' => 'Status Pengajuan Surat']);
    } 
}
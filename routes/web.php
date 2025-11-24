<?php

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Login;
use App\Livewire\Pages\APBDESPage;
use App\Livewire\Pages\ArchivePage;
use App\Livewire\Pages\ServicePage;
use App\Livewire\Pages\VisiMisiPage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\NewsDetailPage;
use App\Livewire\Pages\SubmissionTracker;
use App\Livewire\Pages\VillagePotencyPage;
use App\Livewire\Pages\VillageProfilePage;
use App\Http\Controllers\Auth\PendudukLoginController;
use App\Livewire\Homepage; // <-- Import Komponen Homepage


/*
|--------------------------------------------------------------------------
| ROUTES SIKAMPUH FRONTEND (LIVEWIRE) - Publik
|--------------------------------------------------------------------------
*/

// Halaman Utama (Home Page) - DIRUBAH MENGGUNAKAN LIVEWIRE COMPONENT
Route::get('/', Homepage::class)->name('welcome'); // <-- Menggunakan Homepage::class


// --- 1. PROFIL DESA (PUBLIK) ---
Route::group(['prefix' => 'profil'], function () {
    Route::get('desa', VillageProfilePage::class)->name('profil.desa');
    Route::get('visi-misi', VisiMisiPage::class)->name('profil.visi-misi');
    Route::get('apbdes', APBDESPage::class)->name('profil.apbdes');
    Route::get('potensi-desa', VillagePotencyPage::class)->name('profil.potensi-desa');
});


// --- 2. BERITA & ARSIP (PUBLIK) ---
Route::get('berita', App\Livewire\Pages\NewsDetailPage::class)->name('berita.index');
Route::get('berita/{news?}', NewsDetailPage::class)->name('berita.detail'); 
Route::get('arsip-desa', ArchivePage::class)->name('arsip.index');


// --- 3. LAYANAN PERSURATAN ---
Route::group(['prefix' => 'layanan'], function () {
    Route::get('/', ServicePage::class)->name('layanan.index');
    Route::get('status', SubmissionTracker::class)->middleware(['auth'])->name('layanan.status'); 
});


/*
|--------------------------------------------------------------------------
| AUTHENTIKASI KUSTOM (DIJAGA DENGAN SINTAKS ARRAY)
|--------------------------------------------------------------------------
*/

// Routes yang dilindungi 'auth' bawaan (Dashboard/Profile)
Route::view('dashboard', 'dashboard')->middleware(['auth', 'verified'])->name('dashboard');
Route::view('profile', 'profile')->middleware(['auth'])->name('profile');

require __DIR__.'/auth.php'; // Auth Register, Reset Password, dll.

// --- OVERRIDE LOGIN KUSTOM ---
// Route GET Login: Menggunakan Sintaks Array (Solusi untuk konflik Livewire/Volt)
Route::get('login', [PendudukLoginController::class, 'showLoginForm'])
    ->middleware('guest')
    ->name('login');

// Proses Login (NIK + Tanggal Lahir)
Route::post('login', [PendudukLoginController::class, 'login'])
    ->middleware('guest')
    ->name('login.post');



// Route Logout Sederhana
Route::post('logout', [PendudukLoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::get('/potensi-desa/{id}', function ($id) {
    $potency = \App\Models\VillagePotency::findOrFail($id);
    return view('pages.potency-detail', compact('potency'));
})->name('village-potency.detail');
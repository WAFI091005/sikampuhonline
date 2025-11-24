<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Penduduk;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class PendudukLoginController extends Controller
{
    // Tampilkan halaman login penduduk
    public function showLoginForm()
    {
        return view('livewire.pages.auth.login');
    }

    // Proses login penduduk (NIK + Tanggal Lahir)
    public function login(Request $request)
    {
        $request->validate([
            'nik' => ['required', 'string', 'max:16'],
            'tanggal_lahir' => ['required', 'date'],
        ]);

        // Cek ke tabel penduduk
        $penduduk = Penduduk::where('nik', $request->nik)
            ->whereDate('tanggal_lahir', $request->tanggal_lahir)
            ->first();

        if (!$penduduk) {
            return back()->withErrors([
                'nik' => 'NIK atau tanggal lahir tidak cocok dengan data kami.',
            ]);
        }

        // Pastikan user sudah ada atau buat otomatis
        $user = User::where('penduduk_id', $penduduk->id)->first();

        if (!$user) {
            $user = User::create([
                'name' => $penduduk->nama,
                'nik' => $penduduk->nik,
                'penduduk_id' => $penduduk->id,
                'email' => $penduduk->nik . '@desa.local', // dummy email
                'password' => Hash::make($penduduk->tanggal_lahir->format('Y-m-d')),
            ]);
        }

        // Login user
        Auth::login($user);
        $request->session()->regenerate();

        // PERUBAHAN KRITIS: Arahkan ke route 'welcome'
        return redirect()->intended('/')->with('success', 'Selamat datang, ' . $penduduk->nama . '!');
    }

    // Logout penduduk
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
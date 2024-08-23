<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Santri;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Kegiatan;
use App\Models\KegiatanRegis;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin()
    {
        $totalPengajar = Guru::count();
        $totalSantri = Santri::where('terverifikasi', true)->count();
        $totalVerifikasi = Santri::where('terverifikasi', false)->count();

        $user = Auth::user();

        if ($user->role == 'guru') {
            $guru = $user->guru;
            return view('admin.index', compact('totalPengajar', 'totalSantri', 'totalVerifikasi', 'guru'));
        }

        return view('admin.index', compact('totalPengajar', 'totalSantri', 'totalVerifikasi'));
    }

    public function guru()
    {
        $data = Guru::all();
        return view('admin.guru', compact('data'));
    }

    public function santri()
    {
        $santris = Santri::where('terverifikasi', true)->get();

        $user = Auth::user();

        if ($user->role == 'guru') {
            $guru = $user->guru;
            return view('admin.santri', compact('santris', 'guru'));
        }

        return view('admin.santri', compact('santris'));
    }

    public function user()
    {
        $data = User::all();
        return view('admin.user', compact('data'));
    }

    public function index()
    {
        $totalPengajar = Guru::count();
        $totalSantri = Santri::where('terverifikasi', true)->count();
        $totalVerifikasi = Santri::where('terverifikasi', false)->count();

        $user = Auth::user();

        if ($user->role == 'guru') {
            $guru = $user->guru;
            return view('admin.index', compact('totalPengajar', 'totalSantri', 'totalVerifikasi', 'guru'));
        }

        return view('admin.index', compact('totalPengajar', 'totalSantri', 'totalVerifikasi'));
    }

    public function daftarkegiatan()
    {
        $kegiatan = Kegiatan::all();
        return view('admin.tampilkan_kegiatan', compact('kegiatan'));
    }

    public function showRegistrations($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $registrations = $kegiatan->registrations; 

        return view('admin.regis_kegiatan', compact('kegiatan', 'registrations'));
    }

    public function destroyRegistration($id)
{
    $registration = KegiatanRegis::findOrFail($id);
    $registration->delete();

    return redirect()->back()->with('success', 'Pendaftaran berhasil dihapus.');
}



}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Surah;

class SurahController extends Controller
{
    public function index()
    {
        $surahs = Surah::all();

        $user = Auth::user();

        if ($user->role == 'guru') {
            $guru = $user->guru;
            return view('admin.surah', compact('surahs', 'guru'));
        }

        return view('admin.surah', compact('surahs'));
    }

    public function create()
    {
        $user = Auth::user();

        if ($user->role == 'guru') {
            $guru = $user->guru;
            return view('admin.tambah_surah', compact('guru'));
        }

        return view('admin.tambah_surah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        Surah::create([
            'nama' => $request->nama,
        ]);

        return redirect()->route('surahs.index')->with('success', 'Surah berhasil ditambahkan.');
    }

    public function destroy(Surah $surah)
    {
        $surah->delete();
        return redirect()->route('surahs.index')->with('success', 'Surah berhasil dihapus.');
    }
}
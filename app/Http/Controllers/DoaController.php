<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Doa;

class DoaController extends Controller
{
    public function index()
    {
        $doas = Doa::all();

        $user = Auth::user();

        if ($user->role == 'guru') {
            $guru = $user->guru;
            return view('admin.doa', compact('doas', 'guru'));
        }

        return view('admin.doa', compact('doas'));
    }

    public function create()
    {
        $user = Auth::user();

        if ($user->role == 'guru') {
            $guru = $user->guru;
            return view('admin.tambah_doa', compact('guru'));
        }

        return view('admin.tambah_doa');
    }

    public function store(Request $request)
    {
        $request->validate([
            'doa' => 'required|string|max:255',
        ]);

        Doa::create([
            'doa' => $request->doa,
        ]);

        return redirect()->route('doas.index')->with('success', 'Doa berhasil ditambahkan.');
    }

    public function destroy(Doa $doa)
    {
        $doa->delete();
        return redirect()->route('doas.index')->with('success', 'Doa berhasil dihapus.');
    }
}

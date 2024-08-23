<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Santri;
use App\Models\Surah;
use App\Models\Hafalan;

class HafalanController extends Controller
{
    public function index()
    {
        $santris = Santri::where('terverifikasi', true)->get();

        $user = Auth::user();

        if ($user->role == 'guru') {
            $guru = $user->guru;
            return view('admin.tampilan_hafalan', compact('santris', 'guru'));
        }

        return view('admin.tampilan_hafalan', compact('santris'));
    }

    public function show($id)
    {
        $santri = Santri::find($id);

        if (!$santri) {
            return redirect()->back()->with('error', 'Santri tidak ditemukan.');
        }

        $surahs = Surah::all();

        $user = Auth::user();

        if ($user->role == 'guru') {
            $guru = $user->guru;
            return view('admin.hafalan', compact('santri', 'surahs', 'guru'));
        }

        return view('admin.hafalan', compact('santri', 'surahs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'santri_id' => 'required|exists:santri,id',
            'surahs_id' => 'required|exists:surahs,id',
            'nilai' => 'required|integer|min:0|max:100',
            'jumlah_ayat' => 'required|integer|min:1',
        ]);

        Hafalan::create([
            'santri_id' => $request->santri_id,
            'surahs_id' => $request->surahs_id,
            'nilai' => $request->nilai,
            'jumlah_ayat' => $request->jumlah_ayat,
        ]);

        return redirect()->back()->with('success', 'Hafalan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $hafalan = Hafalan::findOrFail($id);
        $surahs = Surah::all(); 

        $user = Auth::user();

        if ($user->role == 'guru') {
            $guru = $user->guru;
            return view('admin.edit_hafalan', compact('hafalan', 'surahs', 'guru'));
        }

        return view('admin.edit_hafalan', compact('hafalan', 'surahs'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nilai' => 'required|integer|min:0|max:100',
            'jumlah_ayat' => 'required|integer|min:1',
        ]);

        $hafalan = Hafalan::findOrFail($id);
        $hafalan->update($request->all());

        return redirect()->route('hafalan.show', $hafalan->santri_id)
            ->with('success', 'Hafalan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $hafalan = Hafalan::findOrFail($id);
        $hafalan->delete();

        return redirect()->back()->with('success', 'Hafalan berhasil dihapus');
    }

    public function exportPdf(Santri $santri)
    {
        $pdf = Pdf::loadView('admin.pdf_hafalan_surah', compact('santri'));
        return $pdf->download('hafalan-surah-' . $santri->nama_santri . '.pdf');
    }
}


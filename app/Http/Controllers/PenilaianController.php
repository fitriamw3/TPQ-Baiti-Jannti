<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Penilaian;
use App\Models\Santri;
use Barryvdh\DomPDF\Facade\Pdf;

class PenilaianController extends Controller
{
    public function index()
    {
        $santris = Santri::where('terverifikasi', true)->get();

        $user = Auth::user();

        if ($user->role == 'guru') {
            $guru = $user->guru;
            return view('admin.penilaian', compact('santris', 'guru'));
        }

        return view('admin.penilaian', compact('santris'));
    }

    public function show($id)
    {
        $santri = Santri::find($id);

        if (!$santri) {
            return redirect()->back()->with('error', 'Santri tidak ditemukan.');
        }

        $penilaian = Penilaian::all();

        $user = Auth::user();

        if ($user->role == 'guru') {
            $guru = $user->guru;
            return view('admin.tampilkan_penilaian', compact('santri', 'penilaian', 'guru'));
        }

        return view('admin.tampilkan_penilaian', compact('santri', 'penilaian'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'santri_id' => 'required|exists:santri,id',
            'juz' => 'required|integer|min:1|max:30',
            'nama_surah' => 'required|string|max:20',
            'ayat_mulai' => 'required|integer|min:1',
            'ayat_akhir' => 'required|integer|min:1|gte:ayat_mulai',
            'nilai_tajwid' => 'required|integer|min:0|max:100',
            'nilai_lancar' => 'required|integer|min:0|max:100',
            'catatan' => 'required|string|max:50',
        ]);

        Penilaian::create([
            'santri_id' => $request->santri_id,
            'juz' => $request->juz,
            'nama_surah' => $request->nama_surah,
            'ayat_mulai' => $request->ayat_mulai,
            'ayat_akhir' => $request->ayat_akhir,
            'nilai_tajwid' => $request->nilai_tajwid,
            'nilai_lancar' => $request->nilai_lancar,
            'catatan' => $request->catatan,
        ]);

        return redirect()->back()->with('success', 'Penilaian berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $penilaian = Penilaian::findOrFail($id);

        $user = Auth::user();

        if ($user->role == 'guru') {
            $guru = $user->guru;
            return view('admin.edit_penilaian', compact('penilaian', 'guru'));
        }

        return view('admin.edit_penilaian', compact('penilaian'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'juz' => 'required|integer|min:1|max:30',
            'nama_surah' => 'required|string|max:20',
            'ayat_mulai' => 'required|integer|min:1',
            'ayat_akhir' => 'required|integer|min:1|gte:ayat_mulai',
            'nilai_tajwid' => 'required|integer|min:0|max:100',
            'nilai_lancar' => 'required|integer|min:0|max:100',
            'catatan' => 'required|string|max:50',
        ]);

        $penilaian = Penilaian::findOrFail($id);
        $penilaian->update($request->all());

        return redirect()->route('penilaian.show', $penilaian->santri_id)
            ->with('success', 'Hafalan berhasil diperbarui');
    }

    public function exportPdf(Santri $santri)
    {
        $pdf = Pdf::loadView('admin.pdf_penilaian', compact('santri'));
        return $pdf->download('penilaian-' . $santri->nama_santri . '.pdf');
    }

    public function destroy($id)
    {
        $penilaian = Penilaian::findOrFail($id);
        $penilaian->delete();

        return redirect()->back()->with('success', 'Hafalan berhasil dihapus');
    }
}
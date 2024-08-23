<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Doa;
use App\Models\Santri;
use App\Models\Hafalan;
use Barryvdh\DomPDF\Facade\Pdf;

class Hafalan2Controller extends Controller
{
    public function show($id)
    {
        $santri = Santri::find($id);

        if (!$santri) {
            return redirect()->back()->with('error', 'Santri tidak ditemukan.');
        }

        $doas = Doa::all();

        $user = Auth::user();

        if ($user->role == 'guru') {
            $guru = $user->guru;
            return view('admin.hafalan_doa', compact('santri', 'doas', 'guru'));
        }

        return view('admin.hafalan_doa', compact('santri', 'doas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'santri_id' => 'required|exists:santri,id',
            'doas_id' => 'required|exists:doas,id',
            'nilai' => 'required|integer|min:0|max:100',
        ]);

        Hafalan::create([
            'santri_id' => $request->santri_id,
            'doas_id' => $request->doas_id,
            'nilai' => $request->nilai,
        ]);

        return redirect()->back()->with('success', 'Hafalan berhasil ditambahkan');
    }


    public function edit($id)
    {
        $hafalan = Hafalan::findOrFail($id);
        $doas = Doa::all();

        $user = Auth::user();

        if ($user->role == 'guru') {
            $guru = $user->guru;
            return view('admin.edit_doa', compact('hafalan', 'doas', 'guru'));
        }

        return view('admin.edit_doa', compact('hafalan', 'doas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nilai' => 'required|integer|min:0|max:100',
        ]);

        $hafalan = Hafalan::findOrFail($id);
        $hafalan->update($request->all());

        return redirect()->route('hafalan2.show', $hafalan->santri_id)
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
        $pdf = Pdf::loadView('admin.pdf_hafalan_doa', compact('santri'));
        return $pdf->download('hafalan-doa-' . $santri->nama_santri . '.pdf');
    }
}

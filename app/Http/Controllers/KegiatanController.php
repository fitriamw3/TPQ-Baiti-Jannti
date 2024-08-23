<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;
use App\Models\TPQ;
use Carbon\Carbon;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatan = Kegiatan::all();
        return view('admin.kegiatan', compact('kegiatan'));
    }

    public function create()
    {
        return view('admin.tambah_kegiatan');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'judul_keg' => 'required',
            'isi_keg' => 'required',
            'gambar' => 'required|image',
            'hari_keg' => 'required',
            'tempat_keg' => 'required',
            'kontak_keg' => 'required'
        ]);

        $kegiatan = new Kegiatan();
        $kegiatan->judul_keg = $request->judul_keg;
        $kegiatan->isi_keg = $request->isi_keg;
        $kegiatan->hari_keg = $request->hari_keg;
        $kegiatan->tempat_keg = $request->tempat_keg;
        $kegiatan->kontak_keg = $request->kontak_keg;

        if ($request->hasFile('gambar')) {
            $filename = $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path('fotokegiatan/'), $filename);
            $kegiatan->gambar = $filename;
        }

        $kegiatan->save();

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil ditambahkan.');
    }

    public function edit(Kegiatan $kegiatan)
    {
        return view('admin.edit_kegiatan', compact('kegiatan'));
    }

    public function update(Request $request, Kegiatan $kegiatan)
    {
        $this->validate($request, [
            'judul_keg' => 'required',
            'isi_keg' => 'required',
            'gambar' => 'nullable|image',
            'hari_keg' => 'required',
            'tempat_keg' => 'required',
            'kontak_keg' => 'required'
        ]);

        if ($request->hasFile('gambar')) {
            $filename = $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path('fotokegiatan/'), $filename);
            $kegiatan->gambar = $filename;
        }

        $kegiatan->judul_keg = $request->judul_keg;
        $kegiatan->isi_keg = $request->isi_keg;
        $kegiatan->hari_keg = $request->hari_keg;
        $kegiatan->tempat_keg = $request->tempat_keg;
        $kegiatan->kontak_keg = $request->kontak_keg;
        
        $kegiatan->save();

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil diupdate.');
    }

    public function destroy(Kegiatan $kegiatan)
    {
        $kegiatan->delete();
        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil dihapus.');
    }

}
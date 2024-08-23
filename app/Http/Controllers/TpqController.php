<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TPQ;

class TpqController extends Controller
{
    public function index()
    {
        $tpq = TPQ::all();
        return view('admin.about', compact('tpq'));
    }

    public function create()
    {
        return view('admin.tambah_about');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'katagori' => 'required|in:profil,visi,misi,gambar,lokasi,email,telepon',
            'keterangan' => 'nullable|string|max:3000',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->katagori === 'gambar') {
            $request->validate(['gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048']);
        }

        $tpq = new TPQ();
        $tpq->katagori = $request->katagori;
        $tpq->keterangan = $request->keterangan;


        if ($request->hasFile('gambar')) {
            $filename = $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path('fotoprofil/'), $filename);
            $tpq->gambar = $filename;
        }

        $tpq->save();

        return redirect()->route('about.index')->with('success', 'Profil berhasil ditambahkan.');
    }

    public function edit(TPQ $tpq)
    {
        return view('admin.edit_about', compact('tpq'));
    }

    public function update(Request $request, TPQ $tpq)
    {
        $this->validate($request, [
            'katagori' => 'required|in:profil,visi,misi,gambar,lokasi,email,telepon',
            'keterangan' => 'nullable|string|max:3000',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Logika untuk menyimpan data sesuai dengan kategori
        if ($request->katagori === 'gambar') {
            $request->validate(['gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048']);
        }

        if ($request->hasFile('gambar')) {
            $filename = $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path('fotoprofil/'), $filename);
            $tpq->gambar = $filename;
        }

        $tpq->katagori = $request->katagori;
        $tpq->keterangan = $request->keterangan;
        $tpq->save();

        return redirect()->route('about.index')->with('success', 'Profil berhasil diperbarui.');
    }

    public function destroy(TPQ $tpq)
    {
        $tpq->delete();
        return redirect()->route('about.index')->with('success', 'Galeri berhasil dihapus.');
    }
}

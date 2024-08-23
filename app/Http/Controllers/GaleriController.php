<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;

class GaleriController extends Controller
{
    public function index()
    {
        $galeri = Galeri::all();
        return view('admin.galeri', compact('galeri'));
    }

    public function create()
    {
        return view('admin.tambah_galeri');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_galeri' => 'required|string|max:50',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'ket_galeri' => 'required|string|max:200',
        ]);

        $galeri = new Galeri();
        $galeri->nama_galeri = $request->nama_galeri;
        $galeri->ket_galeri = $request->ket_galeri;

        if ($request->hasFile('gambar')) {
            $filename = $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path('fotogaleri/'), $filename);
            $galeri->gambar = $filename;
        }

        $galeri->save();

        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil ditambahkan.');
    }

    public function edit(Galeri $galeri)
    {
        return view('admin.edit_galeri', compact('galeri'));
    }

    public function update(Request $request, Galeri $galeri)
    {
        $this->validate($request, [
            'nama_galeri' => 'required|string|max:50',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'ket_galeri' => 'required|string|max:200',
        ]);

        if ($request->hasFile('gambar')) {
            $filename = $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path('fotogaleri/'), $filename);
            $galeri->gambar = $filename;
        }

        $galeri->nama_galeri = $request->input('nama_galeri');
        $galeri->ket_galeri = $request->input('ket_galeri');
        $galeri->save();

        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil diperbarui.');
    }


    public function destroy(Galeri $galeri)
    {
        $galeri->delete();
        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil dihapus.');
    }
}
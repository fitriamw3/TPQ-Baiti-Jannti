<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestasi;

class PrestasiController extends Controller
{
    public function index()
    {
        $prestasi = Prestasi::all();
        return view('admin.prestasi', compact('prestasi'));
    }

    public function create()
    {
        return view('admin.tambah_prestasi');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string|max:3000',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $prestasi = new Prestasi();
        $prestasi->judul = $request->judul;
        $prestasi->deskripsi = $request->deskripsi;

        if ($request->hasFile('gambar')) {
            $filename = $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path('fotoprestasi/'), $filename);
            $prestasi->gambar = $filename;
        }

        $prestasi->save();

        return redirect()->route('prestasi.index')->with('success', 'Prestasi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $prestasi = Prestasi::findOrFail($id);
        return view('admin.edit_prestasi', compact('prestasi'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string|max:3000',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $prestasi = Prestasi::findOrFail($id);
        $prestasi->judul = $request->judul;
        $prestasi->deskripsi = $request->deskripsi;

        if ($request->hasFile('gambar')) {
            $filename = $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path('fotoprestasi/'), $filename);
            $prestasi->gambar = $filename;
        }

        $prestasi->save();

        return redirect()->route('prestasi.index')->with('success', 'Prestasi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $prestasi = Prestasi::findOrFail($id);
        if ($prestasi->gambar) {
            unlink(public_path('fotoprestasi/') . $prestasi->gambar);
        }
        $prestasi->delete();

        return redirect()->route('prestasi.index')->with('success', 'Prestasi berhasil dihapus.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Santri;

class SantriController extends Controller
{
    public function unverified()
    {
        $santris = Santri::where('terverifikasi', false)->get();
        return view('admin.verifikasi', compact('santris'));
    }

    public function verify($id)
    {
        $santri = Santri::findOrFail($id);
        $santri->terverifikasi = true;
        $santri->save();

        return redirect()->route('santri.unverified')->with('success', 'Santri berhasil diverifikasi.');
    }

    public function create()
    {
        return view('admin.tambah_santri');
    }

    public function insertsantri(Request $request)
    {
        $this->validate($request, [
            'nik_santri' => 'nullable|size:16',
            'tlpn_ortu_santri' => 'required|min:11|max:13',
            'foto_santri' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if (!$request->ayah_santri && !$request->ibu_santri && !$request->wali_santri) {
            return redirect()->back()->withErrors([
                'parent_guardian' => 'Setidaknya salah satu dari ayah, ibu, atau wali harus diisi.'
            ])->withInput();
        }

        $data = Santri::create($request->all());
        
        if ($request->hasFile('foto_santri')) {
            $request->file('foto_santri')->move('fotosantri/', $request->file('foto_santri')->getClientOriginalName());

            $data->foto_santri = $request->file('foto_santri')->getClientOriginalName();
            $data->save();
        }

        return redirect()->route('santri')->with('success', 'Data santri berhasil ditambah.');
    }

    public function tampilkansantri($id)
    {
        $data = Santri::find($id);
        //dd($data);
        return view('admin.edit_santri', compact('data'));
    }

    public function updatesantri(Request $request, $id)
    {
        $this->validate($request, [
            'nik_santri' => 'nullable|size:16',
            'tlpn_ortu_santri' => 'required|min:11|max:13',
            'foto_santri' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = Santri::find($id);
        $data->update($request->all());

        if ($request->hasFile('foto_santri')) {
            $request->file('foto_santri')->move('fotosantri/', $request->file('foto_santri')->getClientOriginalName());
            $data->foto_santri = $request->file('foto_santri')->getClientOriginalName();
        }

        $data->save();

        //dd($data);
        return redirect()->route('santri')->with('success', 'Data pengguna berhasil diperbarui.');
    }


    public function deletesantri($id)
    {
        $data = Santri::find($id);
        $data->delete();
        return redirect()->route('santri');
    }
}

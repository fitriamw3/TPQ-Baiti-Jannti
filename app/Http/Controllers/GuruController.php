<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;

class GuruController extends Controller
{
    public function create()
    {
        return view('admin.tambah_guru');
    }

    public function insertguru(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'nik_guru' => 'required|size:16',
            'tlpn_guru' => 'required|min:11|max:13',
            'foto_guru' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = Guru::create($request->all());
        if ($request->hasFile('foto_guru')) {
            $request->file('foto_guru')->move('fotoguru/', $request->file('foto_guru')->getClientOriginalName());
            $data->foto_guru = $request->file('foto_guru')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('guru')->with('success', 'Data pengajar berhasil ditambah.');
    }

    public function tampilkanguru($id)
    {
        $data = Guru::find($id);
        //dd($data);
        return view('admin.edit_guru', compact('data'));
    }

    public function updateguru(Request $request, $id)
    {
        $this->validate($request, [
            'nik_guru' => 'required|size:16',
            'tlpn_guru' => 'required|min:11|max:13',
            'foto_guru' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = Guru::find($id);
        $data->update($request->except(['foto_guru']));

        if ($request->hasFile('foto_guru')) {
            $request->file('foto_guru')->move('fotoguru/', $request->file('foto_guru')->getClientOriginalName());
            $data->foto_guru = $request->file('foto_guru')->getClientOriginalName();
        }

        $data->save();

        return redirect()->route('guru')->with('success', 'Data pengguna berhasil diperbarui.');

    }

    public function deleteguru($id)
    {
        $data = Guru::find($id);
        $data->delete();
        return redirect()->route('guru');
    }
}


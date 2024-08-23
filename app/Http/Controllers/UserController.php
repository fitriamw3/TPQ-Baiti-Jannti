<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        return view('admin.tambah_user');
    }


    public function insertuser(Request $request)
    {
        //dd($request->all());
        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'nama' => $request->nama,
            'role' => $request->role,
        ]);

        return redirect()->route('user')->with('success', 'Data pengguna berhasil ditambah.');

    }


    public function tampilkanuser($id)
    {
        $data = User::find($id);
        //dd($data);
        return view('admin.edit_user', compact('data'));
    }


    public function updateuser(Request $request, $id)
    {
        $this->validate($request, [
            'username' => 'required|string|max:255',
            'password' => 'nullable|string',
            'nama' => 'required|string|max:255',
            'role' => 'required|in:admin,guru,santri',
        ]);
    
        User::find($id)->update([
            'username' => $request->username,
            'nama' => $request->nama,
            'role' => $request->role
        ]);
        
        if (!is_null($request->password)) {
            User::find($id)->update([
                'password' => $request->password
            ]);
        }

        //dd($data);
        return redirect()->route('user')->with('success', 'Data pengguna berhasil diperbarui.');
    }


    public function deleteuser($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect()->route('user');
    }
}

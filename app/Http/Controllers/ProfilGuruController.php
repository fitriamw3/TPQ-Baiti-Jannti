<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilGuruController extends Controller
{
    public function showProfile()
    {
        $user = Auth::user();

        if ($user->role == 'guru') {
            $guru = $user->guru; // Ambil data guru terkait
            return view('guru.profile', compact('guru'));
        } else {
            return redirect()->route('home')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }
    }

    public function changePasswordForm()
    {
        $user = Auth::user();

        if ($user->role == 'guru') {
            $guru = $user->guru; // Ambil data guru terkait
            return view('guru.ubah_password', compact('user','guru'));
        } else {
            return redirect()->route('home')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }
        
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        $user->password = $request->current_password;
        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('status', 'Password berhasil diupdate');
    }
}

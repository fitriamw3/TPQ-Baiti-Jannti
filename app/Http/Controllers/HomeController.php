<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Santri;
use App\Models\Guru;
use App\Models\Galeri;
use App\Models\TPQ;
use App\Models\Prestasi;
use App\Models\Kegiatan;
use App\Models\KegiatanRegis;

class HomeController extends Controller
{
    public function index()
    {
        return view('umum.welcome');
    }

    public function umum()
    {
        $tpq = TPQ::all();
        $lokasi = TPQ::where('katagori', 'lokasi')->first();
        $telepon = TPQ::where('katagori', 'telepon')->first();
        $email = TPQ::where('katagori', 'email')->first();

        $profil = TPQ::where('katagori', 'profil')->first();
        $visi = TPQ::where('katagori', 'visi')->first();
        $misi = TPQ::where('katagori', 'misi')->get();
        $gambar = TPQ::where('katagori', 'gambar')->first();

        $kegiatan = Kegiatan::all();

        $guru = Guru::all();
        $galeri = Galeri::all();

        $prestasi = Prestasi::all();

        return view('umum.umum', compact('guru','galeri','profil','visi','misi','lokasi','telepon','email','gambar','prestasi','kegiatan'));
    }

    public function login()
    {
        $tpq = TPQ::all();
        $lokasi = TPQ::where('katagori', 'lokasi')->first();
        $telepon = TPQ::where('katagori', 'telepon')->first();
        $email = TPQ::where('katagori', 'email')->first();

        return view('umum.login', compact('lokasi', 'telepon', 'email'));
    }

    public function loginproses(Request $request)
    {
        // dd('test');
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // return Auth::user();
            if (Auth::user()->role == 'admin' || Auth::user()->role == 'guru') {
                return redirect('/admin');
            } else if (Auth::user()->role == 'santri') {
                return redirect('/home-santri');
            }
        }

        // Jika autentikasi gagal
        return back()->withErrors([
            'password' => 'Username atau password salah.',
        ])->withInput($request->only('username'));
    }

    public function register()
    {
        $tpq = TPQ::all();
        $lokasi = TPQ::where('katagori', 'lokasi')->first();
        $telepon = TPQ::where('katagori', 'telepon')->first();
        $email = TPQ::where('katagori', 'email')->first();

        return view('umum.register', compact('lokasi', 'telepon', 'email'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'nullable|string|max:16',
            'gender' => 'required|in:L,P',
            'tmpt_lahir' => 'required|string|max:50',
            'tgl_lahir' => 'required|date',
            'usia' => 'required|integer',
            'pendidikan' => 'required|string|max:50',
            'alamat' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'ayah' => 'nullable|string|max:50',
            'ibu' => 'nullable|string|max:50',
            'wali' => 'nullable|string|max:50',
            'tlpn_ortu' => 'required|string|max:13',
        ]);

        $filename = null;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('fotosantri/'), $filename);
        }

        $santri = new Santri;
        $santri->nama_santri = $request->nama;
        $santri->nik_santri = $request->nik;
        $santri->jenis_kelamin_santri = $request->gender;
        $santri->tmpt_lahir_santri = $request->tmpt_lahir;
        $santri->tgl_lahir_Santri = $request->tgl_lahir;
        $santri->usia_santri = $request->usia;
        $santri->pendidikan_santri = $request->pendidikan;
        $santri->alamat_santri = $request->alamat;
        $santri->foto_santri = $filename;
        $santri->ayah_santri = $request->ayah;
        $santri->ibu_santri = $request->ibu;
        $santri->wali_santri = $request->wali;
        $santri->tlpn_ortu_santri = $request->tlpn_ortu;
        $santri->terverifikasi = false; // Santri belum diverifikasi
        $santri->save();

        session()->flash('success', 'Pendaftaran berhasil. Akun anda akan tersedia jika telah mengikuti minimal 3x pertemuan TPQ');
        return redirect()->back();
    }

    public function deleteverifikasi()
    {

        $user = Santri::where('terverifikasi', false)->get();
        // return $user;
        foreach ($user as $hapus) {
            Santri::where('id', $hapus->id)->delete();
        }
        return redirect()->back();
    }

    public function show($id)
    {
        $tpq = TPQ::all();
        $lokasi = TPQ::where('katagori', 'lokasi')->first();
        $telepon = TPQ::where('katagori', 'telepon')->first();
        $email = TPQ::where('katagori', 'email')->first();

        $kegiatan = Kegiatan::findOrFail($id);
        return view('umum.tampil_kegiatan', compact('kegiatan','telepon','email','lokasi'));
    }

    public function registerkeg(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:50',
            'tgl_lahir' => 'required|date',
            'usia' => 'required|integer',
            'jenis_kelamin_santri' => 'required|in:L,P',
            'alamat' => 'required|string',
            'foto' => 'required|image',
            'tlpn_ortu' => 'required|string|max:13',
        ]);

        $kegiatan = Kegiatan::findOrFail($id);

        // Simpan foto ke direktori
        $fotoPath = $request->file('foto')->store('fotopendaftaran', 'public');

        KegiatanRegis::create([
            'kegiatan_id' => $kegiatan->id,
            'nama' => $request->input('nama'),
            'tgl_lahir' => $request->input('tgl_lahir'),
            'usia' => $request->input('usia'),
            'jenis_kelamin_santri' => $request->input('jenis_kelamin_santri'),
            'alamat' => $request->input('alamat'),
            'foto' => $fotoPath,
            'tlpn_ortu' => $request->input('tlpn_ortu'),
        ]);

        return redirect()->route('kegiatan-tpq.show', ['id' => $id])->with('success', 'Pendaftaran berhasil!');
    }

}

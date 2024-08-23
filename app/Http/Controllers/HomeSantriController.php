<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\Santri;
use App\Models\Guru;
use App\Models\Galeri;
use App\Models\TPQ;
use App\Models\Prestasi;
use App\Models\Kegiatan;
use App\Models\KegiatanRegis;
use App\Models\Absensi;
use App\Models\Hafalan;
use App\Models\Penilaian;

class HomeSantriController extends Controller
{
    public function Home()
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

        $santri = Santri::all(); // Ambil data santri

        return view('user.santri', compact('guru', 'galeri', 'profil', 'visi', 'misi', 'lokasi', 'telepon', 'email', 'gambar', 'prestasi', 'kegiatan', 'santri'));
    }


    public function show($id)
    {
        $tpq = TPQ::all();
        $lokasi = TPQ::where('katagori', 'lokasi')->first();
        $telepon = TPQ::where('katagori', 'telepon')->first();
        $email = TPQ::where('katagori', 'email')->first();

        $kegiatan = Kegiatan::findOrFail($id);
        return view('user.kegiatan', compact('kegiatan', 'telepon', 'email', 'lokasi'));
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

        return redirect()->route('kegiatan-santri.show', ['id' => $id])->with('success', 'Pendaftaran berhasil!');
    }

    public function profil($id)
    {
        $tpq = TPQ::all();
        $lokasi = TPQ::where('katagori', 'lokasi')->first();
        $telepon = TPQ::where('katagori', 'telepon')->first();
        $email = TPQ::where('katagori', 'email')->first();

        $santri = Santri::findOrFail($id);

        return view('user.profil', compact('lokasi', 'telepon', 'email', 'santri'));
    }

    public function pwberubah()
    {
        $tpq = TPQ::all();
        $lokasi = TPQ::where('katagori', 'lokasi')->first();
        $telepon = TPQ::where('katagori', 'telepon')->first();
        $email = TPQ::where('katagori', 'email')->first();

        $santri = Auth::user()->santri;

        return view('user.ubah_password', compact('lokasi', 'telepon', 'email', 'santri'));
    }

    public function changePassword(Request $request)
    {
        // Validasi input
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        // Cek apakah password lama cocok
        if (!Hash::check($request->current_password, auth()->user()->password)) {
            return back()->withErrors(['current_password' => 'Password lama salah.']);
        }

        // Ganti password
        $user = auth()->user();
        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('status', 'Password berhasil diubah.');

    }

    public function showHafalan()
    {
        $tpq = TPQ::all();
        $lokasi = TPQ::where('katagori', 'lokasi')->first();
        $telepon = TPQ::where('katagori', 'telepon')->first();
        $email = TPQ::where('katagori', 'email')->first();

        $santri_id = Auth::user()->santri->id;
        $hafalans = Hafalan::where('santri_id', $santri_id)->get();

        $hafalanSurahs = $hafalans->filter(function ($hafalan) {
            return $hafalan->surahs_id !== null;
        });

        $hafalanDoas = $hafalans->filter(function ($hafalan) {
            return $hafalan->doas_id !== null;
        });

        return view('user.hafalan', compact('lokasi', 'telepon', 'email', 'hafalanSurahs', 'hafalanDoas'));
    }

    public function showNilai()
    {
        $tpq = TPQ::all();
        $lokasi = TPQ::where('katagori', 'lokasi')->first();
        $telepon = TPQ::where('katagori', 'telepon')->first();
        $email = TPQ::where('katagori', 'email')->first();

        $santriId = Auth::user()->santri->id;
        $nilai = Penilaian::where('santri_id', $santriId)->get();

        return view('user.penilaian', compact('lokasi', 'telepon', 'email', 'nilai'));
    }

    public function showAbsensi(Request $request)
    {
        $tpq = TPQ::all();
        $lokasi = TPQ::where('katagori', 'lokasi')->first();
        $telepon = TPQ::where('katagori', 'telepon')->first();
        $email = TPQ::where('katagori', 'email')->first();

        $santriId = Auth::user()->santri->id;
        $query = Absensi::where('santri_id', $santriId);

        if ($request->filled('bulan')) {
            $query->whereMonth('tanggal', $request->bulan);
        }

        if ($request->filled('tahun')) {
            $query->whereYear('tanggal', $request->tahun);
        }

        $absensi = $query->get()->map(function ($item) {
            $item->tanggal = Carbon::parse($item->tanggal);
            return $item;
        })->sortBy(function ($item) {
            return $item->tanggal->format('Y-m-d'); 
        });

        $years = range(2024, now()->year);

        return view('user.absensi', compact('lokasi', 'telepon', 'email', 'absensi', 'years'));
    }
}

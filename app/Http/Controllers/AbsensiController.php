<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Absensi;
use App\Models\Santri;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class AbsensiController extends Controller
{
    public function index(Request $request)
    {
        $year = $request->input('year', Carbon::now()->format('Y')); // default to current year

        $absensis = Absensi::with('santri')
            ->whereYear('tanggal', $year)
            ->orderBy('tanggal', 'desc')
            ->get()
            ->groupBy(function ($date) {
                return Carbon::parse($date->tanggal)->format('Y-m'); // Group by year-month
            });

        $years = Absensi::selectRaw('YEAR(tanggal) as year')
            ->distinct()
            ->pluck('year');

        $user = Auth::user();

        if ($user->role == 'guru') {
            $guru = $user->guru;
            return view('admin.absensi', compact('absensis', 'years', 'year', 'guru'));
        }

        return view('admin.absensi', compact('absensis', 'years', 'year'));
    }

    public function showMonth($year, $month)
    {
        $santris = Santri::where('terverifikasi', true)->get();
        $absensis = Absensi::with('santri')
            ->whereYear('tanggal', $year)
            ->whereMonth('tanggal', $month)
            ->orderBy('tanggal', 'asc')
            ->get();

        $monthName = Carbon::create()->month($month)->format('F');
        $daysInMonth = Carbon::create($year, $month)->daysInMonth;

        $user = Auth::user();

        if ($user->role == 'guru') {
            $guru = $user->guru;
            return view('admin.tampilkan_absensi', compact('santris', 'absensis', 'year', 'month', 'monthName', 'daysInMonth', 'guru'));
        }

        return view('admin.tampilkan_absensi', compact('santris', 'absensis', 'year', 'month', 'monthName', 'daysInMonth'));
    }

    public function updateAll(Request $request, $year, $month, $day)
    {
        try {
            // Debugging output
            \Log::info("Year: $year, Month: $month, Day: $day");

            $date = Carbon::createFromDate($year, $month, $day)->format('Y-m-d');
            \Log::info("Formatted Date: $date");

            $santris = Santri::where('terverifikasi', true)->get();

            foreach ($santris as $santri) {
                Absensi::updateOrCreate(
                    ['santri_id' => $santri->id, 'tanggal' => $date],
                    ['hadir' => $request->input('hadir')[$santri->id]]
                );
            }

            return redirect()->route('absensi.showMonth', ['year' => $year, 'month' => $month])->with('success', 'Absensi berhasil diperbarui.');
        } catch (\Exception $e) {
            \Log::error("Error updating absensi: " . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui absensi.']);
        }
    }


    public function store(Request $request)
    {
        $request->validate([
            'santri_id' => 'required|exists:santris,id',
            'tanggal' => 'required|date',
            'hadir' => 'required|integer|in:1,2,3,0', // 1: Hadir, 2: Sakit, 3: Izin, 0: Alpha
        ]);

        Absensi::create($request->all());

        return redirect()->back()->with('success', 'Absensi berhasil disimpan.');
    }

    public function showDay($year, $month, $day)
    {
        // Validasi nilai bulan
        if ($month < 1 || $month > 12) {
            return redirect()->back()->withErrors('Month must be between 1 and 12');
        }

        $santris = Santri::where('terverifikasi', true)->get();
        $date = Carbon::createFromDate($year, $month, $day)->format('Y-m-d');
        $absensis = Absensi::with('santri')
            ->whereDate('tanggal', $date)
            ->get();

        $dayName = Carbon::create($year, $month, $day)->format('l');

        $user = Auth::user();

        if ($user->role == 'guru') {
            $guru = $user->guru;
            return view('admin.tampilkan_absensi_harian', compact('santris', 'absensis', 'year', 'month', 'day', 'date', 'dayName', 'guru'));
        }

        return view('admin.tampilkan_absensi_harian', compact('santris', 'absensis', 'year', 'month', 'day', 'date', 'dayName'));
    }

    public function updateDay(Request $request, $year, $month, $day)
    {
        $date = Carbon::createFromDate($year, $month, $day)->format('Y-m-d');
        $santris = Santri::where('terverifikasi', true)->get();

        foreach ($santris as $santri) {
            Absensi::updateOrCreate(
                ['santri_id' => $santri->id, 'tanggal' => $date],
                ['hadir' => $request->input('hadir')[$santri->id]]
            );
        }

        return redirect()->route('absensi.showMonth', ['year' => $year, 'month' => $month])->with('success', 'Absensi berhasil diperbarui.');
    }

    public function cetakpdf(Request $request)
    {
        $year = $request->input('year');
        $month = $request->input('month');

        $monthName = Carbon::createFromDate($year, $month)->translatedFormat('F');

        $periode = $monthName . ' ' . $year;

        $rekapAbsensi = Absensi::select(
            'santri_id',
            DB::raw('SUM(hadir = 1) as hadir_count'),
            DB::raw('SUM(hadir = 2) as sakit_count'),
            DB::raw('SUM(hadir = 3) as izin_count'),
            DB::raw('SUM(hadir = 0) as alpha_count')
        )
            ->whereYear('tanggal', $year)
            ->when($month, function ($query, $month) {
                return $query->whereMonth('tanggal', $month);
            })
            ->groupBy('santri_id')
            ->with('santri')
            ->get();

        $pdf = Pdf::loadView('admin.pdf_absensi', compact('rekapAbsensi', 'periode'));

        return $pdf->download("rekap_absensi_{$month}_{$year}.pdf");
    }

}
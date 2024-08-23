<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SantriController;
use App\Http\Controllers\TpqController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HafalanController;
use App\Http\Controllers\Hafalan2Controller;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\SurahController;
use App\Http\Controllers\DoaController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\ProfilGuruController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\HomeSantriController;
use Illuminate\Support\Facades\Route;


Route::get("/", [HomeController::class, "index"]);
Route::get("/tpq-baitijannati", [HomeController::class, "umum"]);
Route::get("/login", [HomeController::class, "login"])->name('login');
Route::post("/loginproses", [HomeController::class, "loginproses"])->name('loginproses');
Route::get("/daftar", [HomeController::class, "register"])->name('register');
Route::post('/register', [HomeController::class, 'store'])->name('santri.store');

Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

Route::get('/kegiatan-tpq/{id}', [HomeController::class, 'show'])->name('kegiatan-tpq.show');
Route::post('/kegiatan/{id}/register', [HomeController::class, 'registerkeg'])->name('kegiatan-tpq.register');


Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get("/pengajar", [AdminController::class, "guru"])->name('guru');
    Route::get("/user", [AdminController::class, "user"])->name('user');

    Route::post('/santri', [SantriController::class, 'store'])->name('santri.store');
    Route::get('/unverified', [SantriController::class, 'unverified'])->name('santri.unverified');
    Route::post('/santri/verify/{id}', [SantriController::class, 'verify'])->name('santri.verify');
    Route::get('/deleteverifikasi', [HomeController::class, 'deleteverifikasi'])->name('deleteverifikasi');

    Route::get('/pengajar/create', [GuruController::class, 'create'])->name('guru.create');
    Route::post('/insertguru', [GuruController::class, 'insertguru'])->name('guru.insert');
    Route::get('/pengajar/tampilkanguru/{id}', [GuruController::class, 'tampilkanguru'])->name('tampilkanguru');
    Route::patch('/updateguru/{id}', [GuruController::class, 'updateguru'])->name('updateguru');
    Route::get('/deleteguru/{id}', [GuruController::class, 'deleteguru'])->name('deleteguru');

    Route::get('/santri/create', [SantriController::class, 'create'])->name('santri.create');
    Route::post('/insertsantri', [SantriController::class, 'insertsantri'])->name('santri.insert');
    Route::get('/santri/tampilkansantri/{id}', [SantriController::class, 'tampilkansantri'])->name('tampilkansantri');
    Route::patch('/updatesantri/{id}', [SantriController::class, 'updatesantri'])->name('updatesantri');
    Route::get('/deletesantri/{id}', [SantriController::class, 'deletesantri'])->name('deletesantri');

    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/insertuser', [UserController::class, 'insertuser'])->name('user.insert');
    Route::get('/user/tampilkanuser/{id}', [UserController::class, 'tampilkanuser'])->name('tampilkanuser');
    Route::patch('/updateuser/{id}', [UserController::class, 'updateuser'])->name('updateuser');
    Route::get('/deleteuser/{id}', [UserController::class, 'deleteuser'])->name('deleteuser');

    Route::resource('profile/galeri', GaleriController::class);

    Route::get('profile/about', [TpqController::class, 'index'])->name('about.index');
    Route::get('profile/about/create', [TpqController::class, 'create'])->name('about.create');
    Route::post('profile/about', [TpqController::class, 'store'])->name('about.store');
    Route::get('profile/about/{tpq}/edit', [TpqController::class, 'edit'])->name('about.edit');
    Route::put('profile/about/{tpq}', [TpqController::class, 'update'])->name('about.update');
    Route::delete('profile/about/{tpq}', [TpqController::class, 'destroy'])->name('about.destroy');

    Route::resource('profile/prestasi', PrestasiController::class);

    Route::resource('kegiatan', KegiatanController::class);

    Route::get('/daftar/kegiatan', [AdminController::class, 'daftarkegiatan'])->name('kegiatan-tpq.index');
    Route::get('/kegiatan-tpq/{id}/registrations', [AdminController::class, 'showRegistrations'])->name('kegiatan-tpq.registrations');
    Route::delete('/kegiatan-tpq/registrations/{id}', [AdminController::class, 'destroyRegistration'])->name('kegiatan-tpq.registrations.destroy');

    Route::get('/akun', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/akun/update-password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');

});


Route::group(['middleware' => ['auth', 'role:santri']], function () {

    Route::get("/home-santri", [HomeSantriController::class, "Home"]);
    Route::get('/kegiatan-santri/{id}', [HomeSantriController::class, 'show'])->name('kegiatan-santri.show');
    Route::post('/kegiatan-santri/{id}/register', [HomeSantriController::class, 'registerkeg'])->name('kegiatan-santri.register');

    Route::get('/santri/{id}', [HomeSantriController::class, 'profil'])->name('profil.santri');

    Route::get('/ubah-password', [HomeSantriController::class, 'pwberubah'])->name('ubah');
    Route::post('/ubah-password', [HomeSantriController::class, 'changePassword'])->name('santri.changePassword');

    Route::get('/aktivitas/santri-hafalan', [HomeSantriController::class, 'showHafalan'])->name('hafalan');
    Route::get('/aktivitas/santi-nilai', [HomeSantriController::class, 'showNilai'])->name('nilai');
    Route::get('/absensi-santri', [HomeSantriController::class, 'showAbsensi'])->name('absensi.santri');
    Route::get('/aktivitas/santri-absensi', [HomeSantriController::class, 'showAbsensi'])->name('absensi');

});


Route::group(['middleware' => ['auth', 'role:admin,guru']], function () {

    Route::get("/admin", [AdminController::class, "admin"])->name('admin');
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get("/santri", [AdminController::class, "santri"])->name('santri');

    Route::resource('hafalan', HafalanController::class);
    Route::get('/hafalan/{santri}/pdf', [HafalanController::class, 'exportPdf'])->name('hafalan.pdf');

    Route::resource('hafalan2', Hafalan2Controller::class);
    Route::get('/hafalan-doa/{santri}/pdf', [Hafalan2Controller::class, 'exportPdf'])->name('hafalan2.pdf');

    Route::resource('penilaian', PenilaianController::class);
    Route::get('/penilaian/{santri}/export-pdf', [PenilaianController::class, 'exportPdf'])->name('penilaian.exportPdf');

    Route::resource('surahs', SurahController::class);

    Route::resource('doas', DoaController::class);

    Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi.index');
    Route::get('/absensi/{year}/{month}', [AbsensiController::class, 'showMonth'])->name('absensi.showMonth');
    Route::get('/absensi/{year}/{month}/{day}', [AbsensiController::class, 'showDay'])->name('absensi.showDay');
    Route::post('/absensi/{year}/{month}/{day}', [AbsensiController::class, 'updateDay'])->name('absensi.updateDay');
    Route::post('/absensi', [AbsensiController::class, 'store'])->name('absensi.store');

    Route::get('/absensi/cetakpdf', [AbsensiController::class, 'cetakpdf'])->name('absensi.exportPdf');


    Route::post('/logout', function () {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect('/login');
    })->name('logout');
});

Route::group(['middleware' => ['auth', 'role:guru']], function () {
    Route::get('/profileguru', [ProfilGuruController::class, 'showProfile'])->name('profile');

    Route::get('/profile/password', [ProfilGuruController::class, 'changePasswordForm'])->name('change-password');
    Route::post('/profile/change-password', [ProfilGuruController::class, 'changePassword'])->name('update-password');

});

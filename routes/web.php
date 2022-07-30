<?php

// use App\Http\Controllers\ProfileController;

use App\Http\Controllers\kemahasiswaan\KemahasiswaanDashboardController;
use App\Http\Controllers\kemahasiswaan\UserKemahasiswaanController;
use App\Http\Controllers\kemahasiswaan\UserMahasiswaController;
use App\Http\Controllers\kemahasiswaan\TenagaKesehatanController;
use App\Http\Controllers\kemahasiswaan\UserPengurusUKMTekkesController;
use App\Http\Controllers\kemahasiswaan\JenisPenangananController;
use App\Http\Controllers\kemahasiswaan\KemahasiswaanPermohonanController;
use App\Http\Controllers\kemahasiswaan\ProdiController;
use App\Http\Controllers\kemahasiswaan\StatusController;
use App\Http\Controllers\mahasiswa\MahasiswaDashboardController;
use App\Http\Controllers\mahasiswa\MahasiswaPermohonanController;
use App\Http\Controllers\dokter\DokterDashboardController;
use App\Http\Controllers\dokter\DokterPermohonanController;
use App\Http\Controllers\dokter\DokterHasilPemeriksaanController;
use App\Http\Controllers\psikolog\PsikologDashboardController;
use App\Http\Controllers\psikolog\PsikologPermohonanController;
use App\Http\Controllers\pengurus_tekkes\PengurusUKMDashboardController;
use App\Http\Controllers\pengurus_tekkes\PengurusUKMInformasiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\Auth\RegisterController;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/storagelink', function () {
    Artisan::call('storage:link');
    return redirect()->back();
});

Route::get('/optimize', function () {
    Artisan::call('optimize');
    return redirect()->back();
});

Route::get('/', [LandingPageController::class, 'index'])->name('landingpage');

Route::get('/login', function () {
    return view('auth.login');
})->name("login");

Route::get('/register', function (){
    return redirect()->route('register');
});

Route::post('/register', [RegisterController::class, 'create'])->name('register');
Route::get('/verify', [RegisterController::class, 'verifyUser'])->name('verify.user');

Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth')->name('profile');
Route::post('/profile/update/{id}', [ProfileController::class, 'updatePass'])->middleware('auth')->name('profile.update');

Route::group([
    'prefix' => '/kemahasiswaan',
    'middleware' => [
        'auth',
        'role:kemahasiswaan',
    ]
], function () {
//Kemahasiswaan Dashboard
Route::get('/', [KemahasiswaanDashboardController::class, 'index'])->name('kemahasiswaan');

//User Kemahasiswaan
Route::get('/user/kemahasiswaan', [UserKemahasiswaanController::class, 'index'])->name('kemahasiswaan.user.kemahasiswaan');
Route::get('/user/kemahasiswaan/detail/{id}', [UserKemahasiswaanController::class, 'show'])->name('kemahasiswaan.user.kemahasiswaan.detail');
Route::get('/user/kemahasiswaan/add', [UserKemahasiswaanController::class, 'add'])->name('kemahasiswaan.user.kemahasiswaan.add');
Route::post('/user/kemahasiswaan/save', [UserKemahasiswaanController::class, 'store'])->name('kemahasiswaan.user.kemahasiswaan.save');
Route::get('/user/kemahasiswaan/edit/{id}', [UserKemahasiswaanController::class, 'edit'])->name('kemahasiswaan.user.kemahasiswaan.edit');
Route::post('/user/kemahasiswaan/update/{id}', [UserKemahasiswaanController::class, 'update'])->name('kemahasiswaan.user.kemahasiswaan.update');
Route::get('/user/kemahasiswaan/delete/{id}', [UserKemahasiswaanController::class, 'destroy'])->name('kemahasiswaan.user.kemahasiswaan.delete');

Route::get('/user/mahasiswa', [UserMahasiswaController::class, 'index'])->name('kemahasiswaan.user.mahasiswa');
Route::get('/user/mahasiswa/detail/{id}', [UserMahasiswaController::class, 'show'])->name('kemahasiswaan.user.mahasiswa.detail');
Route::get('/user/mahasiswa/add', [UserMahasiswaController::class, 'add'])->name('kemahasiswaan.user.mahasiswa.add');
Route::post('/user/mahasiswa/save', [UserMahasiswaController::class, 'store'])->name('kemahasiswaan.user.mahasiswa.save');
Route::get('/user/mahasiswa/edit/{id}', [UserMahasiswaController::class, 'edit'])->name('kemahasiswaan.user.mahasiswa.edit');
Route::post('/user/mahasiswa/update/{id}', [UserMahasiswaController::class, 'update'])->name('kemahasiswaan.user.mahasiswa.update');
Route::get('/user/mahasiswa/delete/{id}', [UserMahasiswaController::class, 'destroy'])->name('kemahasiswaan.user.mahasiswa.delete');

//User Tenaga Kesehatan
Route::get('/tenaga-kesehatan', [TenagaKesehatanController::class, 'index'])->name('kemahasiswaan.tenaga-kesehatan');
Route::get('/tenaga-kesehatan/detail/{id}', [TenagaKesehatanController::class, 'show'])->name('kemahasiswaan.tenaga-kesehatan.detail');
Route::get('/tenaga-kesehatan/add', [TenagaKesehatanController::class, 'add'])->name('kemahasiswaan.tenaga-kesehatan.add');
Route::post('/tenaga-kesehatan/save', [TenagaKesehatanController::class, 'store'])->name('kemahasiswaan.tenaga-kesehatan.save');
Route::get('/tenaga-kesehatan/edit/{id}', [TenagaKesehatanController::class, 'edit'])->name('kemahasiswaan.tenaga-kesehatan.edit');
Route::post('/tenaga-kesehatan/update/{id}', [TenagaKesehatanController::class, 'update'])->name('kemahasiswaan.tenaga-kesehatan.update');
Route::get('/tenaga-kesehatan/delete/{id}', [TenagaKesehatanController::class, 'destroy'])->name('kemahasiswaan.tenaga-kesehatan.delete');

//User Pengurus UKM Tekkes
Route::get('/user/pengurus-ukm-tekkes', [UserPengurusUKMTekkesController::class, 'index'])->name('kemahasiswaan.pengurus-ukm-tekkes');
Route::get('/user/pengurus-ukm-tekkes/detail/{id}', [UserPengurusUKMTekkesController::class, 'show'])->name('kemahasiswaan.pengurus-ukm-tekkes.detail');
Route::get('/user/pengurus-ukm-tekkes/add', [UserPengurusUKMTekkesController::class, 'add'])->name('kemahasiswaan.pengurus-ukm-tekkes.add');
Route::post('/user/pengurus-ukm-tekkes/save', [UserPengurusUKMTekkesController::class, 'store'])->name('kemahasiswaan.pengurus-ukm-tekkes.save');
Route::get('/user/pengurus-ukm-tekkes/edit/{id}', [UserPengurusUKMTekkesController::class, 'edit'])->name('kemahasiswaan.pengurus-ukm-tekkes.edit');
Route::post('/user/pengurus-ukm-tekkes/update/{id}', [UserPengurusUKMTekkesController::class, 'update'])->name('kemahasiswaan.pengurus-ukm-tekkes.update');
Route::get('/user/pengurus-ukm-tekkes/delete/{id}', [UserPengurusUKMTekkesController::class, 'destroy'])->name('kemahasiswaan.pengurus-ukm-tekkes.delete');

//Jenis Layanan
Route::get('/jenis-penanganan', [JenisPenangananController::class, 'index'])->name('kemahasiswaan.jenis-penanganan');
Route::get('/jenis-penanganan/detail/{id}', [JenisPenangananController::class, 'show'])->name('kemahasiswaan.jenis-penanganan.detail');
Route::get('/jenis-penanganan/add', [JenisPenangananController::class, 'add'])->name('kemahasiswaan.jenis-penanganan.add');
Route::post('/jenis-penanganan/save', [JenisPenangananController::class, 'store'])->name('kemahasiswaan.jenis-penanganan.save');
Route::get('/jenis-penanganan/edit/{id}', [JenisPenangananController::class, 'edit'])->name('kemahasiswaan.jenis-penanganan.edit');
Route::post('/jenis-penanganan/update/{id}', [JenisPenangananController::class, 'update'])->name('kemahasiswaan.jenis-penanganan.update');
Route::get('/jenis-penanganan/delete/{id}', [JenisPenangananController::class, 'destroy'])->name('kemahasiswaan.jenis-penanganan.delete');

//Prodi
Route::get('/prodi', [ProdiController::class, 'index'])->name('kemahasiswaan.prodi');
Route::get('/prodi/detail/{id}', [ProdiController::class, 'show'])->name('kemahasiswaan.prodi.detail');
Route::get('/prodi/add', [ProdiController::class, 'add'])->name('kemahasiswaan.prodi.add');
Route::post('/prodi/save', [ProdiController::class, 'store'])->name('kemahasiswaan.prodi.save');
Route::get('/prodi/edit/{id}', [ProdiController::class, 'edit'])->name('kemahasiswaan.prodi.edit');
Route::post('/prodi/update/{id}', [ProdiController::class, 'update'])->name('kemahasiswaan.prodi.update');
Route::get('/prodi/delete/{id}', [ProdiController::class, 'destroy'])->name('kemahasiswaan.prodi.delete');

//Permohonan di Kemahasiswaan
Route::get('/permohonan-layanan', [KemahasiswaanPermohonanController::class, 'index'])->name('kemahasiswaan.permohonan-layanan');
Route::get('/riwayat/permohonan-layanan', [KemahasiswaanPermohonanController::class, 'indexRiwayat'])->name('kemahasiswaan.riwayat.permohonan-layanan');
Route::get('/permohonan-layanan/add', [KemahasiswaanPermohonanController::class, 'add'])->name('kemahasiswaan.permohonan-layanan.add');
Route::post('/permohonan-layanan/store', [KemahasiswaanPermohonanController::class, 'store'])->name('kemahasiswaan.permohonan-layanan.store');
Route::get('/permohonan-layanan/detail/{id}', [KemahasiswaanPermohonanController::class, 'detail'])->name('kemahasiswaan.permohonan-layanan.detail');
Route::get('/permohonan-layanan/approve/{id}', [KemahasiswaanPermohonanController::class, 'approve'])->name('kemahasiswaan.permohonan-layanan.approve');
Route::get('/permohonan-layanan/view/{id}', [KemahasiswaanPermohonanController::class, 'viewFile'])->name('kemahasiswaan.permohonan-layanan.view');
Route::get('/permohonan-layanan/file/{id}', [KemahasiswaanPermohonanController::class, 'generateFile'])->name('kemahasiswaan.permohonan-layanan.download');
Route::get('/permohonan-layanan/reject', [KemahasiswaanPermohonanController::class, 'updateStatus'])->name('kemahasiswaan.permohonan-layanan.reject');    
Route::get('/pedoman', [KemahasiswaanDashboardController::class, 'pedoman'])->name('kemahasiswaan.pedoman');    
});

Route::group([
    'prefix' => '/mahasiswa',
    'middleware' => [
        'auth',
        'role:mahasiswa',
    ]
], function () {
//Mahasiswa Dashboard
Route::get('/', [MahasiswaDashboardController::class, 'index'])->name('mahasiswa');

//Permohonan di Mahasiswa
Route::get('/permohonan-layanan', [MahasiswaPermohonanController::class, 'index'])->name('mahasiswa.permohonan-layanan');
Route::get('/permohonan-layanan/add', [MahasiswaPermohonanController::class, 'add'])->name('mahasiswa.permohonan-layanan.add');
Route::post('/permohonan-layanan/store', [MahasiswaPermohonanController::class, 'store'])->name('mahasiswa.permohonan-layanan.store');
Route::get('/permohonan-layanan/detail/{id}', [MahasiswaPermohonanController::class, 'detail'])->name('mahasiswa.permohonan-layanan.detail');
Route::get('/permohonan-layanan/edit/{id}', [MahasiswaPermohonanController::class, 'edit'])->name('mahasiswa.permohonan-layanan.edit');
Route::post('/permohonan-layanan/update/{id}', [MahasiswaPermohonanController::class, 'update'])->name('mahasiswa.permohonan-layanan.update');
Route::get('/permohonan-layanan/delete/{id}', [MahasiswaPermohonanController::class, 'destroy'])->name('mahasiswa.permohonan-layanan.delete');
Route::get('/permohonan-layanan/send/{id}', [MahasiswaPermohonanController::class, 'apply'])->name('mahasiswa.permohonan-layanan.send');
Route::get('/permohonan-layanan/view/{id}', [MahasiswaPermohonanController::class, 'viewFile'])->name('mahasiswa.permohonan-layanan.view');
Route::get('/permohonan-layanan/file/{id}', [MahasiswaPermohonanController::class, 'generateFile'])->name('mahasiswa.permohonan-layanan.download');
Route::get('/informasi-kesehatan', [MahasiswaDashboardController::class, 'informasi'])->name('mahasiswa.informasi-kesehatan');
Route::get('/informasi-kesehatan/detail/{id}', [MahasiswaDashboardController::class, 'informasidetail'])->name('mahasiswa.informasi-kesehatan.detail');
Route::get('/pedoman', [MahasiswaDashboardController::class, 'pedoman'])->name('mahasiswa.pedoman');
Route::get('/download-berkas', [MahasiswaDashboardController::class, 'downloadBerkas'])->name('mahasiswa.download-berkas');
});

Route::group([
    'prefix' => '/dokter',
    'middleware' => [
        'auth',
        'role:dokter',
    ]
], function () {
//Dokter Dashboard
Route::get('/', [DokterDashboardController::class, 'index'])->name('dokter');

//Permohonan di Dokter
Route::get('/permohonan-layanan-dikonfirmasi', [DokterPermohonanController::class, 'index'])->name('dokter.permohonan-layanan-dikonfirmasi');
Route::get('/permohonan-layanan-ditangani', [DokterPermohonanController::class, 'indexDitangani'])->name('dokter.permohonan-layanan-ditangani');
Route::get('/permohonan-layanan-ditangani-selesai', [DokterPermohonanController::class, 'indexSelesai'])->name('dokter.permohonan-layanan-ditangani-selesai');
Route::get('/permohonan-layanan-hasil-pemeriksaan-langsung', [DokterPermohonanController::class, 'indexHasil'])->name('dokter.permohonan-layanan-hasil-pemeriksaan-langsung');
Route::get('/permohonan-layanan/add', [DokterPermohonanController::class, 'add'])->name('dokter.permohonan-layanan.add');
Route::post('/permohonan-layanan/store', [DokterPermohonanController::class, 'store'])->name('dokter.permohonan-layanan.store');
Route::get('/permohonan-layanan/detail/{id}', [DokterPermohonanController::class, 'detail'])->name('dokter.permohonan-layanan.detail');
Route::get('/permohonan-layanan/finish', [DokterPermohonanController::class, 'updateStatus'])->name('dokter.permohonan-layanan.finish');
Route::get('/permohonan-layanan/view/{id}', [DokterPermohonanController::class, 'viewFile'])->name('dokter.permohonan-layanan.view');
Route::get('/permohonan-layanan/file/{id}', [DokterPermohonanController::class, 'generateFile'])->name('dokter.permohonan-layanan.download');
Route::get('/permohonan-layanan/online/{id}', [DokterPermohonanController::class, 'online'])->name('dokter.permohonan-layanan.online');
Route::get('/permohonan-layanan/offline/{id}', [DokterPermohonanController::class, 'offline'])->name('dokter.permohonan-layanan.offline');
Route::get('/permohonan-layanan/reject', [DokterPermohonanController::class, 'reject'])->name('dokter.permohonan-layanan.reject');
Route::get('/permohonan-layanan/rekam-medis', [DokterPermohonanController::class, 'rekamMedis'])->name('dokter.permohonan-layanan.rekam-medis');
Route::get('/permohonan-layanan/rekam-medis/{id}', [DokterPermohonanController::class, 'detailMedis'])->name('dokter.permohonan-layanan.rekam-medis.detail-mahasiswa');
Route::get('/pedoman', [DokterDashboardController::class, 'pedoman'])->name('dokter.pedoman');    

});

Route::group([
    'prefix' => '/psikolog',
    'middleware' => [
        'auth',
        'role:psikolog',
    ]
], function () {
//Psikolog Dashboard
Route::get('/', [PsikologDashboardController::class, 'index'])->name('psikolog');
Route::get('/pedoman', [PsikologDashboardController::class, 'pedoman'])->name('psikolog.pedoman');    

//Permohonan di Psikolog
Route::get('/permohonan-layanan-dikonfirmasi', [PsikologPermohonanController::class, 'index'])->name('psikolog.permohonan-layanan-dikonfirmasi');
Route::get('/permohonan-layanan-ditangani', [PsikologPermohonanController::class, 'indexDitangani'])->name('psikolog.permohonan-layanan-ditangani');
Route::get('/permohonan-layanan-ditangani-selesai', [PsikologPermohonanController::class, 'indexSelesai'])->name('psikolog.permohonan-layanan-ditangani-selesai');
Route::get('/permohonan-layanan-hasil-pemeriksaan-langsung', [PsikologPermohonanController::class, 'indexHasil'])->name('psikolog.permohonan-layanan-hasil-pemeriksaan-langsung');
Route::get('/permohonan-layanan/add', [PsikologPermohonanController::class, 'add'])->name('psikolog.permohonan-layanan.add');
Route::post('/permohonan-layanan/store', [PsikologPermohonanController::class, 'store'])->name('psikolog.permohonan-layanan.store');
Route::get('/permohonan-layanan/detail/{id}', [PsikologPermohonanController::class, 'detail'])->name('psikolog.permohonan-layanan.detail');
Route::get('/permohonan-layanan/finish', [PsikologPermohonanController::class, 'updateStatus'])->name('psikolog.permohonan-layanan.finish'); 
Route::get('/permohonan-layanan/view/{id}', [PsikologPermohonanController::class, 'viewFile' ])->name('psikolog.permohonan-layanan.view');
Route::get('/permohonan-layanan/file/{id}', [PsikologPermohonanController::class, 'generateFile'])->name('psikolog.permohonan-layanan.download');
Route::get('/permohonan-layanan/online/{id}', [PsikologPermohonanController::class, 'online'])->name('psikolog.permohonan-layanan.online'); 
Route::get('/permohonan-layanan/offline/{id}', [PsikologPermohonanController::class, 'offline'])->name('psikolog.permohonan-layanan.offline'); 
Route::get('/permohonan-layanan/reject', [PsikologPermohonanController::class, 'reject'])->name('psikolog.permohonan-layanan.reject');
Route::get('/permohonan-layanan/rekam-medis', [PsikologPermohonanController::class, 'rekamMedis'])->name('psikolog.permohonan-layanan.rekam-medis');
Route::get('/permohonan-layanan/rekam-medis/{id}', [PsikologPermohonanController::class, 'detailMedis'])->name('psikolog.permohonan-layanan.rekam-medis.detail-mahasiswa');
});

Route::group([
    'prefix' => '/pengurus-tekkes',
    'middleware' => [
        'auth',
        'role:pengurus_tekkes',
    ]
], function () {
//Psikolog Dashboard
Route::get('/', [PengurusUKMDashboardController::class, 'index'])->name('pengurus-tekkes');
Route::get('/pedoman', [PengurusUKMDashboardController::class, 'pedoman'])->name('pengurus-tekkes.pedoman');    

Route::get('/kelola-informasi', [PengurusUKMInformasiController::class, 'index'])->name('pengurus-tekkes.kelola-informasi');
Route::get('/kelola-informasi/add', [PengurusUKMInformasiController::class, 'add'])->name('pengurus-tekkes.kelola-informasi.add');
Route::post('/kelola-informasi/store', [PengurusUKMInformasiController::class, 'store'])->name('pengurus-tekkes.kelola-informasi.store');
Route::get('/kelola-informasi/delete/{id}', [PengurusUKMInformasiController::class, 'destroy'])->name('pengurus-tekkes.kelola-informasi.delete');
Route::get('/kelola-informasi/send/{id}', [PengurusUKMInformasiController::class, 'apply'])->name('pengurus-tekkes.kelola-informasi.send');
Route::get('/kelola-informasi/detail/{id}', [PengurusUKMInformasiController::class, 'detail'])->name('pengurus-tekkes.kelola-informasi.detail');
Route::get('/kelola-informasi/edit/{id}', [PengurusUKMInformasiController::class, 'edit'])->name('pengurus-tekkes.kelola-informasi.edit');
Route::post('/kelola-informasi/update/{id}', [PengurusUKMInformasiController::class, 'update'])->name('pengurus-tekkes.kelola-informasi.update');
Route::get('/kelola-informasi/view/{id}', [PengurusUKMInformasiController::class, 'viewFile' ])->name('pengurus-tekkes.kelola-informasi.view');
Route::get('/kelola-informasi/file/{id}', [PengurusUKMInformasiController::class, 'generateFile'])->name('pengurus-tekkes.kelola-informasi.download');
Route::get('/informasi-kesehatan', [PengurusUKMInformasiController::class, 'informasi'])->name('pengurus-tekkes.informasi-kesehatan');
Route::get('/informasi-kesehatan/detail/{id}', [PengurusUKMInformasiController::class, 'informasiDetail'])->name('pengurus-tekkes.informasi-kesehatan.detail');
});
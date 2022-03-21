<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\RombelController;
use App\Http\Controllers\RayonController;
use App\Http\Controllers\KodeController;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\OrtuController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PrayonController;
use App\Http\Controllers\KontrolController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\PelanggaranController;
use App\Http\Controllers\KeseluruhanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LaporanPieController as laporanpiecontroller;
use App\Http\Controllers\FrontendController as frontend;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * --------------------------------
 * frontend
 * --------------------------------
 * bk script and rout active
 */
// Route::get('/', function () {
//     return view('index');
// });
Route::get('/',[frontend::class,'getIndex'])->name('/');
Route::get('/grafik',[frontend::class,'getGrafik'])->name('frontend.grafik');
Route::get('/prestasi/tertinggi/',[frontend::class,'highestAchievement'])->name('frontend.prestasi.tertinggi');



/**
 * ------------------------------------------------------------------------
 * login 
 * ------------------------------------------------------------------------
 */
Route::get('login/guru',[GuruController::class,'getLoginGuru'])->name('guru.login');
Route::post('login/guru/action',[GuruController::class,'getGuruAction'])->name('guru.post');
Route::get('dashboard/guru',[GuruController::class,'getGuruDashboard'])->name('guru.dashboard');
Route::get('logout/guru',[GuruController::class,'guruLogout'])->name('guru.logout');

Route::get('login/ortu',[OrtuController::class,'getLoginOrtu'])->name('ortu.login');
Route::post('login/ortu/action',[OrtuController::class,'getOrtuAction'])->name('ortu.post');
Route::get('dashboard/ortu',[OrtuController::class,'getOrtuDashboard'])->name('ortu.dashboard');
Route::get('logout/ortu',[OrtuController::class,'ortuLogout'])->name('ortu.logout');

Route::get('login/siswa',[SiswaController::class,'getLoginSiswa'])->name('siswa.login');
Route::post('login/siswa/action',[SiswaController::class,'getSiswaAction'])->name('siswa.post');
Route::get('dashboard/siswa',[SiswaController::class,'getSiswaDashboard'])->name('siswa.dashboard');
Route::get('logout/siswa',[SiswaController::class,'siswaLogout'])->name('siswa.logout');

Route::get('login/rayon',[RayonController::class,'getLoginRayon'])->name('rayon.login');
Route::post('login/rayon/action',[RayonController::class,'getRayonAction'])->name('rayon.post');
Route::get('dashboard/rayon',[RayonController::class,'getRayonDashboard'])->name('rayon.dashboard');
Route::get('logout/rayon',[RayonController::class,'rayonLogout'])->name('rayon.logout');

Route::get('login/admin',[UserController::class,'getLoginAdmin'])->name('admin.login');
Route::post('login/admin/action',[UserController::class,'getAdminAction'])->name('admin.post');
Route::get('dashboard/admin',[UserController::class,'getAdminDashboard'])->name('admin.dashboard');
Route::get('logout/admin',[UserController::class,'adminLogout'])->name('admin.logout');



Route::get('/simos', [DashboardController::class, 'index'])->name('simos');
//Route Guru
route::get('guru', [GuruController::class, 'index'])->name('guru.index');
route::get('guru/create', [GuruController::class, 'create'])->name('guru.create');
route::post('guru/store', [GuruController::class, 'store'])->name('guru.store');
route::get('guru/edit/{id}', [GuruController::class, 'edit'])->name('guru.edit');
route::post('guru/update/{id}', [GuruController::class, 'update'])->name('guru.update');
route::get('guru/delete/{id}', [GuruController::class, 'destroy'])->name('guru.delete');

//Route Rombel
route::get('rombel',[RombelController::class, 'index'])->name('rombel.index');
route::get('rombel/create', [RombelController::class, 'create'])->name('rombel.create');
route::post('rombel/store', [RombelController::class, 'store'])->name('rombel.store');
route::get('rombel/edit/{id}', [RombelController::class, 'edit'])->name('rombel.edit');
route::post('rombel/update/{id}', [RombelController::class, 'update'])->name('rombel.update');
route::get('rombel/delete/{id}', [RombelController::class, 'destroy'])->name('rombel.delete');

//Route Rayon
route::get('rayon',[RayonController::class, 'index'])->name('rayon.index');
route::get('rayon/create', [RayonController::class, 'create'])->name('rayon.create');
route::post('rayon/store', [RayonController::class, 'store'])->name('rayon.store');
route::get('rayon/edit/{id}', [RayonController::class, 'edit'])->name('rayon.edit');
route::post('rayon/update/{id}', [RayonController::class, 'update'])->name('rayon.update');
route::get('rayon/delete/{id}', [RayonController::class, 'destroy'])->name('rayon.delete');

//Route Kode
route::get('kode',[KodeController::class, 'index'])->name('kode.index');
route::get('kode/create', [KodeController::class, 'create'])->name('kode.create');
route::post('kode/store', [KodeController::class, 'store'])->name('kode.store');
route::get('kode/edit/{id}', [KodeController::class, 'edit'])->name('kode.edit');
route::post('kode/update/{id}', [KodeController::class, 'update'])->name('kode.update');
route::get('kode/delete/{id}', [KodeController::class, 'destroy'])->name('kode.delete');
route::get('kode/data/{id?}', [KodeController::class, 'kode'])->name('kode.data');
route::get('kode/editdata/{id?}', [KodeController::class, 'kodedata'])->name('editdata.kodedata');


//Route Orang tua
route::get('ortu',[OrtuController::class, 'index'])->name('ortu.index');
route::get('ortu/create', [OrtuController::class, 'create'])->name('ortu.create');
route::post('ortu/store', [OrtuController::class, 'store'])->name('ortu.store');
route::get('ortu/edit/{id}', [OrtuController::class, 'edit'])->name('ortu.edit');
route::post('ortu/update/{id}', [OrtuController::class, 'update'])->name('ortu.update');
route::get('ortu/delete/{id}', [OrtuController::class, 'destroy'])->name('ortu.delete');

//Route Siswa
route::get('siswa',[SiswaController::class, 'index'])->name('siswa.index');
route::get('siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
route::post('siswa/store', [SiswaController::class, 'store'])->name('siswa.store');
route::get('siswa/edit/{id}', [SiswaController::class, 'edit'])->name('siswa.edit'); 
route::post('siswa/update/{id}', [SiswaController::class, 'update'])->name('siswa.update');
route::get('siswa/delete/{id}', [SiswaController::class, 'destroy'])->name('siswa.delete');
route::get('siswa/data/{id?}', [SiswaController::class, 'monitoring'])->name('siswa.data');
route::post('siswa/import', [SiswaController::class, 'import'])->name('siswa.import');
route::get('siswa/export', [SiswaController::class, 'export'])->name('siswa.export');


//Route Monitoring
route::get('monitoring',[MonitoringController::class, 'index'])->name('monitoring.index');
route::get('monitoring/create', [MonitoringController::class, 'create'])->name('monitoring.create');
route::post('monitoring/store', [MonitoringController::class, 'store'])->name('monitoring.store');
route::get('monitoring/edit/{id}', [MonitoringController::class, 'edit'])->name('monitoring.edit'); 
route::post('monitoring/update/{id}', [MonitoringController::class, 'update'])->name('monitoring.update');
route::get('monitoring/delete/{id}', [MonitoringController::class, 'destroy'])->name('monitoring.delete');
route::get('monitoring/detail/{nis}/pelanggaran', [MonitoringController::class, 'show'])->name('monitoring.detail');
route::get('monitoring/detail/{nis}/prestasi', [MonitoringController::class, 'show2'])->name('monitoring.detail2');
route::get('monitoring/data/{tgl}', [MonitoringController::class, 'monitoring'])->name('monitoring.data');
Route::post('monitoring/fetch_data', [MonitoringController::class, 'fetch_data'])->name('monitoring.fetch_data');

//Route prayon
route::get('prayon',[PrayonController::class, 'index'])->name('prayon.index');
route::get('prayon/create', [PrayonController::class, 'create'])->name('prayon.create');
route::post('prayon/store', [PrayonController::class, 'store'])->name('prayon.store');
route::get('prayon/edit/{id}', [PrayonController::class, 'edit'])->name('prayon.edit'); 
route::post('prayon/update/{id}', [PrayonController::class, 'update'])->name('prayon.update');
route::get('prayon/delete/{id}', [PrayonController::class, 'destroy'])->name('prayon.delete');

//Route User
route::get('user',[UserController::class, 'index'])->name('user.index');
route::get('user/create', [UserController::class, 'create'])->name('user.create');
route::post('user/store', [UserController::class, 'store'])->name('user.store');
route::get('user/edit/{id}', [UserController::class, 'edit'])->name('user.edit'); 
route::post('user/update/{id}', [UserController::class, 'update'])->name('user.update');
route::get('user/delete/{id}', [UserController::class, 'destroy'])->name('user.delete');

//Route kontrol
route::get('kontrol',[KontrolController::class, 'index'])->name('kontrol.index');
route::get('kontrol/create', [KontrolController::class, 'create'])->name('kontrol.create');
route::post('kontrol/store', [KontrolController::class, 'store'])->name('kontrol.store');
route::get('kontrol/edit/{id}', [KontrolController::class, 'edit'])->name('kontrol.edit'); 
route::post('kontrol/update/{id}', [KontrolController::class, 'update'])->name('kontrol.update');
route::get('kontrol/delete/{id}', [KontrolController::class, 'destroy'])->name('kontrol.delete');
route::get('kontrol/data/{id?}', [KontrolController::class, 'kontrol'])->name('kontrol.data');

/**
 * --------------------------------
 * laporan
 * --------------------------------
 */

//Route laporan prestasi
route::get('laporan/prestasi',[PrestasiController::class, 'index'])->name('laporan.prestasi.index');
//Route laporan Pelanggaran
route::get('laporan/pelanggaran',[PelanggaranController::class, 'index'])->name('laporan.pelanggaran.index');
//Route laporan Keseluruhan
route::get('laporan/keseluruhan',[KeseluruhanController::class, 'index'])->name('laporan.keseluruhan.index');
// route::get('laporan/keseluruhan',[KeseluruhanController::class, 'serchtgl'])->name('laporan.keseluruhan.serchtgl');
// laporan pie 
Route::get('laporan/pie',[laporanpiecontroller::class,'getIndex'])->name('laporan.pie.index');
Route::get('laporan/pie/cari',[LaporanPieController::class,'searchData'])->name('laporan.search.pie');


// example
Route::get('/test',[DashboardController::class,'test'])->name('script.dashboard.test');
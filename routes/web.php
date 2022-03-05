<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\RombelController;
use App\Http\Controllers\RayonController;
use App\Http\Controllers\KodeController;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\OrtuController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PrayonController;


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

Route::get('/', function () {
    return view('index');
});
Route::get('/simos', function () {
    return view('backend.dashboard');
})->name('simos');
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


//Route Monitoring
route::get('monitoring',[MonitoringController::class, 'index'])->name('monitoring.index');
route::get('monitoring/create', [MonitoringController::class, 'create'])->name('monitoring.create');
route::post('monitoring/store', [MonitoringController::class, 'store'])->name('monitoring.store');
route::get('monitoring/edit/{id}', [MonitoringController::class, 'edit'])->name('monitoring.edit'); 
route::post('monitoring/update/{id}', [MonitoringController::class, 'update'])->name('monitoring.update');
route::get('monitoring/delete/{id}', [MonitoringController::class, 'destroy'])->name('monitoring.delete');

//Route prayon
route::get('prayon',[PrayonController::class, 'index'])->name('prayon.index');
route::get('prayon/create', [PrayonController::class, 'create'])->name('prayon.create');
route::post('prayon/store', [PrayonController::class, 'store'])->name('prayon.store');
route::get('prayon/edit/{id}', [PrayonController::class, 'edit'])->name('prayon.edit'); 
route::post('prayon/update/{id}', [PrayonController::class, 'update'])->name('prayon.update');
route::get('prayon/delete/{id}', [PrayonController::class, 'destroy'])->name('prayon.delete');


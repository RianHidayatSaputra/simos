<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\RombelController;
use App\Http\Controllers\RayonController;
use App\Http\Controllers\KodeController;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\OrtuController;
use App\Http\Controllers\SiswaController;


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



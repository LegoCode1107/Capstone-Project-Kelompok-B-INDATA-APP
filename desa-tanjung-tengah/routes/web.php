<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KependudukanSosialController;
use App\Http\Controllers\EkonomiPekerjaanController;
use App\Http\Controllers\ExportsController;
use App\Http\Controllers\ProduksiPanganController;
use App\Http\Controllers\PerikananAsetController;
use App\Http\Controllers\InfrastrukturApbdesController;
use App\Http\Controllers\UserController;




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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {

    Route::get(
        '/dashboard',
        [DashboardController::class, 'dashboard']
    )->name('dashboard');

});

Route::resource('users', UserController::class);

Route::resource(
    'kependudukan',
    KependudukanSosialController::class
);

Route::resource(
    'ekonomi',
    EkonomiPekerjaanController::class
);

Route::resource(
    'produksi',
    ProduksiPanganController::class
);

Route::resource(
    'perikanan',
    PerikananAsetController::class
);

Route::resource(
    'infrastruktur',
    InfrastrukturApbdesController::class
);

Route::get('/laporan/grafik', function () {
    return view('laporan.grafik');
})->name('laporan.grafik');

Route::get('/laporan/excel', function () {
    return 'Export Excel';
})->name('laporan.excel');

Route::get('/laporan/pdf', function () {
    return 'Export PDF';
})->name('laporan.pdf');

Route::get('export-master-sektor', [ExportsController::class, 'exportSemuaSektor'])->name('export.all.sectors');

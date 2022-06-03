<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Laporan;

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

Route::prefix('laporan')->group(function () {
    Route::redirect('/', 'laporan/bulanan');
    Route::get('bulanan', [Laporan\BulananController::class, 'index'])->name('laporan.bulanan');
    Route::get('iuran', [Laporan\IuranController::class, 'index'])->name('laporan.iuran');
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

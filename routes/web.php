<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\c_karyawan;
use App\Http\Controllers\c_training;
use App\Http\Controllers\c_trainingkaryawan;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('data-karyawan.index');
});

Route::controller(c_karyawan::class)->group(function () {
    Route::get('karyawan/', 'index')->name('karyawan.index');
    Route::get('karyawan/create', 'create')->name('karyawan.create');
    Route::post('karyawan/store', 'store')->name('karyawan.store');

    // js
    Route::get('karyawan/getdata', 'getData')->name('karyawan.getdata');
});

Route::controller(c_training::class)->group(function () {
    Route::get('jenistraining/', 'index')->name('jenistraining.index');
    Route::get('jenistraining/create', 'create')->name('jenistraining.create');
    Route::post('jenistraining/store', 'store')->name('jenistraining.store');
     // js
     Route::get('jenistraining/getdata', 'getData')->name('jenistraining.getdata');
});

Route::controller(c_trainingkaryawan::class)->group(function () {
    Route::get('training-karyawan/', 'index')->name('training-karyawan.index');
    Route::get('training-karyawan/create', 'create')->name('training-karyawan.create');
    Route::post('training-karyawan/store', 'store')->name('training-karyawan.store');
     // js
     Route::get('training-karyawan/getdata', 'getData')->name('training-karyawan.getdata');
});

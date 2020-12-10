<?php

use Illuminate\Support\Facades\Route;
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
    return view('welcome');
});

//siswa route
Route::get('/siswa', [SiswaController::class, 'index']);
Route::post('/siswa/store', [SiswaController::class, 'store']);
Route::get('/siswa/edit/{id}', [SiswaController::class, 'edit'])->name('edit.siswa');
Route::post('/siswa/update/{id}', [SiswaController::class, 'update'])->name('update.siswa');
Route::get('/siswa/delete/{id}', [SiswaController::class, 'delete'])->name('delete.siswa');
Route::get('/siswa/profile/{id}', [SiswaController::class, 'profile'])->name('profile.siswa');

//ajax dynamic select route
// Route::get('/ajax-autocomplete-search', [SiswaController::class, 'selectSearch']);

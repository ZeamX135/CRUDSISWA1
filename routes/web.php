<?php

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Auth::routes();

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
Route::get('/siswas', function () {
    return view('siswas.index');
});
Route::get('/siswas', [App\Http\Controllers\SiswaController::class,'siswaSiswa']);

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
});
Route::get('/siswa', function () {
    return view('siswa.index');
});
Route::resource('/siswa', SiswaController::class);

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:guru'])->group(function () {

    Route::get('/guru/home', [HomeController::class, 'guruHome'])->name('guru.home');
});
Route::get('/siswag', function () {
    return view('siswag.index');
});
Route::get('/siswag', [App\Http\Controllers\SiswaController::class,'siswaGuru']);

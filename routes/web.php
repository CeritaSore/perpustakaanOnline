<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\PengarangController;
use Illuminate\Support\Facades\Route;

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

/* front end */

Route::get('/', [FrontendController::class, 'index']);
Route::get('/feature', [FrontendController::class, 'feature']);
Route::get('/popular', [FrontendController::class, 'popular']);
Route::get('/about', [FrontendController::class, 'about']);

/* back end */
Route::get('/dashboard', function () {
    return view('backend.home');
});
Route::get('/dashboard',[HomeController::class,'countBuku']);

// buku CRUD
Route::get('/buku', [BukuController::class,'index']);
Route::post('/buku', [BukuController::class,'store'])->name('up3');
Route::put('/buku/{id}', [BukuController::class,'update'])->name('edit3');
Route::delete('/buku/{id}', [BukuController::class,'destroy'])->name('delete3');
// pengarang CRUD
Route::get('/pengarang', [PengarangController::class, 'index']);
Route::post('/pengarang', [PengarangController::class, 'store'])->name('up');
Route::put('/pengarang/{id}', [PengarangController::class, 'update'])->name('edit');
Route::delete('/pengarang/{id}', [PengarangController::class, 'destroy'])->name('delete');

// penerbit CRUD
Route::get('/penerbit', [PenerbitController::class,'index']);
Route::post('/penerbit', [PenerbitController::class, 'store'])->name('up1');
Route::put('/penerbit/{id}', [PenerbitController::class, 'update'])->name('edit1');
Route::delete('/penerbit/{id}', [PenerbitController::class, 'destroy'])->name('delete1');

// kategori CRUD 
Route::get('/kategori', [KategoriController::class,'index']);
Route::post('/kategori', [KategoriController::class,'store'])->name('up2');
Route::put('/kategori/{id}', [KategoriController::class,'update'])->name('edit2');
Route::delete('/kategori/{id}', [KategoriController::class,'destroy'])->name('delete2');
Route::get('/login', function () {
    return view('backend.login');
});
Route::get('/register', function () {
    return view('backend.register');
});
Route::get('/kelola', function(){
    return view('backend.user.index');
});


Route::get('/status', [PeminjamanController::class,'status']);
Route::get('/pinjam', [PeminjamanController::class,'index']);
Route::post('/pinjam', [PeminjamanController::class,'store'])->name('up4');
Route::put('/status/{id}', [PeminjamanController::class,'update'])->name('edit4');
Route::delete('/status/{id}', [PeminjamanController::class,'destroy'])->name('delete4');

<?php

use App\Http\Controllers\FrontendController;
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
Route::get('/buku', function () {
    return view('backend.buku');
});
Route::get('/pengarang', function () {
    return view('backend.pengarang');
});
Route::get('/penerbit', function () {
    return view('backend.penerbit');
});
Route::get('/kategori', function () {
    return view('backend.kategori');
});
Route::get('/pinjam', function () {
    return view('backend.pinjam');
});
Route::get('/login', function () {
    return view('backend.login');
});
Route::get('/register', function () {
    return view('backend.register');
});

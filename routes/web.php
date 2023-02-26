<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'login'])->name('login');
Route::post('ceklogin', [HomeController::class, 'ceklogin'])->name('ceklogin');

Route::get('daftar', [HomeController::class, 'register'])->name('register');
Route::post('daftar/post-act', [HomeController::class, 'daftar_akun'])->name('daftar_akun');

Route::get('page/dashboard-admin', [AdminController::class, 'dashboard_admin'])->name('dashboard_admin');
Route::get('page/postingan-saya', [UserController::class, 'postingan_saya'])->name('postingan_saya');

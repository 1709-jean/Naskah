<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'login'])->name('login');
Route::post('userlogin', [HomeController::class, 'userlogin'])->name('userlogin');

Route::get('daftar', [HomeController::class, 'register'])->name('register');
Route::post('daftar/post-act', [HomeController::class, 'daftar_akun'])->name('daftar_akun');
Route::get('postingan/keyword/{tipe}-{kategori}', [HomeController::class, 'postingan'])->name('postingan');

Route::get('logout', [HomeController::class, 'logout'])->name('logout');



Route::get('page/dashboard-admin', [AdminController::class, 'dashboard_admin'])->name('dashboard_admin');
Route::get('page/data-kategori', [AdminController::class, 'data_kategori'])->name('data_kategori');
Route::get('page/data-user', [AdminController::class, 'data_user'])->name('data_user');
Route::get('page/data-user/hapus-act-post-{id}', [AdminController::class, 'hapus_user'])->name('hapus_user');
Route::post('page/data-kategori/tambah', [AdminController::class, 'addkategori'])->name('addkategori');
Route::post('page/data-kategori/update/{id_kategori}', [AdminController::class, 'updatekategori'])->name('updatekategori');



Route::get('page/postingan-saya', [UserController::class, 'postingan_saya'])->name('postingan_saya');
Route::post('page/profil-admin/update', [UserController::class, 'ubah_user'])->name('ubah_user');
Route::get('page/form-tambah-postingan', [UserController::class, 'tambah_postingan'])->name('tambah_postingan');
Route::post('page/form-tambah-postingan/post-act-postingan', [UserController::class, 'add_postingan'])->name('add_postingan');

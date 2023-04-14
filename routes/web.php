<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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
Route::get('clear_cache', function () {
	\Artisan::call('cache:clear');
	\Artisan::call('config:cache');
	dd("Sudah Bersih nih!, Silahkan Kembali ke Halaman Login");
});

Route::get('/',[HomeController::class,'login'])->name('login');
Route::post('ceklogin',[HomeController::class,'ceklogin'])->name('ceklogin');

Route::get('daftar',[HomeController::class,'register'])->name('register');
Route::post('daftar/post-act',[HomeController::class,'daftar_akun'])->name('daftar_akun');

Route::get('logout',[HomeController::class,'logout'])->name('logout');

Route::group(['middleware'=>['auth','ceklevel:Admin']],function()
{
// Admin
	Route::get('page/dashboard-admin',[AdminController::class,'dashboard_admin'])->name('dashboard_admin');

	Route::get('page/data-user',[AdminController::class,'data_user'])->name('data_user');
	Route::get('page/data-user/hapus-act-post-{id}',[AdminController::class,'hapus_user'])->name('hapus_user');

	Route::get('page/data-kategori',[AdminController::class,'data_kategori'])->name('data_kategori');
	Route::post('page/data-kategori/tambah', [AdminController::class,'addkategori'])->name('addkategori');
	Route::post('page/data-kategori/update/{id_kategori}', [AdminController::class,'updatekategori'])->name('updatekategori');
	Route::get('page/data-kategori/hapus/{id_kategori}', [AdminController::class,'deletekategori'])->name('deletekategori');

	Route::get('page/data-postingan-di-laporkan/user-report', [AdminController::class,'postingan_report'])->name('postingan_report');
});

Route::group(['middleware'=>['auth','ceklevel:User,Admin']],function()
{
// User
	Route::get('page/postingan-saya',[UserController::class,'postingan_saya'])->name('postingan_saya');
	Route::get('page/form-tambah-postingan',[UserController::class,'tambah_postingan'])->name('tambah_postingan');
	Route::post('page/form-tambah-postingan/post-act-postingan',[UserController::class,'add_postingan'])->name('add_postingan');
	Route::get('page/form-ubah-postingan/keyword-{id_postingan}',[UserController::class,'ubah_postingan'])->name('ubah_postingan');
	Route::post('page/form-ubah-postingan/post-update/{id_postingan}',[UserController::class,'update_postingan'])->name('update_postingan');
	Route::get('page/hapus-postingan/act-del-{id_postingan}',[UserController::class,'delete_postingan'])->name('delete_postingan');

	Route::post('page/laporan-postingan/act',[UserController::class,'add_lapor'])->name('add_lapor');
	Route::get('page/klaim-berita/berita/{id_postingan}',[UserController::class,'klaim'])->name('klaim');
	Route::post('page/klaim-berita/ajukan/act-found-{id_postingan}',[UserController::class,'ajukan_klaim'])->name('ajukan_klaim');
	Route::get('page/ajuan-klaim-saya',[UserController::class,'klaim_saya'])->name('klaim_saya');
	Route::get('page/ubah-klaim-saya/keyword-{id_klaim}',[UserController::class,'ubah_klaim'])->name('ubah_klaim');
	Route::post('page/ubah-klaim-saya/act-post/keyword-{id_klaim}',[UserController::class,'update_klaim'])->name('update_klaim');

	Route::get('page/data-klaim-postingan',[UserController::class,'data_klaim'])->name('data_klaim');
	Route::get('page/lihat-klaim/{id_postingan}',[UserController::class,'lihat_klaim'])->name('lihat_klaim');
	Route::post('page/verifikasi-klaim/keyword-verif{id_klaim}',[UserController::class,'verifikasi_klaim'])->name('verifikasi_klaim');

	Route::post('page/profil-admin/update',[UserController::class,'ubah_user'])->name('ubah_user');
});

// Home
Route::get('postingan/keyword/{tipe}-{kategori}',[HomeController::class,'postingan'])->name('postingan');
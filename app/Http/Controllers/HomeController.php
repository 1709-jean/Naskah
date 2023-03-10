<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Postingan;


class HomeController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function ceklogin(Request $request)
    {
        if (!empty($request->email) or !empty($request->password)) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                if (Auth::user()->level == "Admin") {
                    return response()->json([
                        'masuk_admin' => '-'
                    ]);
                } elseif (Auth::user()->level == "User") {
                    return response()->json([
                        'masuk_user' => '-'
                    ]);
                }
            } else {
                return response()->json([
                    'notmasuk' => '-'
                ]);
            }
        } else {
            return response()->json([
                'kosong' => '-'
            ]);
        }
    }

    public function register()
    {
        return view('register');
    }

    public function daftar_akun(Request $request)
    {
        $cek = User::join('biodata', 'biodata.id_user', '=', 'users.id')
            ->where('biodata.nik', $request->nik)
            ->orWhere('users.email', $request->email)
            ->first();
        if ($cek == NULL) {
            if ($request->hasFile('foto')) {
                $request->validate(
                    [
                        'email' => 'required|email',
                        'telepon' => 'required|min:10',
                        'nik' => 'required|min:16|max:16',
                    ],
                    [
                        'email.email' => 'Input berupa format Email',
                        'telepon.min' => 'Nomor Handphone minimal 10 angka',
                        'nik.min' => 'NIK minimal dan maksimal 16 angka',
                        'nik.max' => 'NIK minimal dan maksimal 16 angka',
                    ]
                );
                $ambil = $request->file('foto');
                $name = $ambil->getClientOriginalName();
                $namaFileBaru = uniqid();
                $namaFileBaru .= $name;
                $ambil->move(\base_path() . "/public/ktp", $namaFileBaru);
                $user = new User();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = hash::make($request->password);
                $user->level = 'User';
                $user->save();
                DB::table('biodata')->insert([
                    'id_user' => $user->id,
                    'nik' => $request->nik,
                    'telepon' => $request->telepon,
                    'ktp' => $namaFileBaru,
                ]);
            }
        } else {
            return back()->with('sama', '-');
        }
        return redirect(route('login'))->with('berhasil_register', 'Akun berhasil terdaftar. Silahkan Login dan Password yang didaftarkan');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function postingan(Request $request, $tipe, $kategori)
    {
        if (empty($request->tanggal)) {
            if ($tipe == "semua" and $kategori == "semua") {
                $data = Postingan::join('users', 'users.id', '=', 'postingan.id_user')
                    ->join('kategori', 'kategori.id_kategori', '=', 'postingan.id_kategori')
                    ->where('postingan.status_postingan', 'true')
                    ->orderBy('postingan.tanggal_berita', 'DESC')
                    ->get();
            } elseif ($tipe == "semua" and $kategori !== "semua") {
                $data = Postingan::join('users', 'users.id', '=', 'postingan.id_user')
                    ->join('kategori', 'kategori.id_kategori', '=', 'postingan.id_kategori')
                    ->where('kategori.nama_kategori', $kategori)
                    ->where('postingan.status_postingan', 'true')
                    ->orderBy('postingan.tanggal_berita', 'DESC')
                    ->get();
            } elseif ($tipe !== "semua" and $kategori == "semua") {
                $data = Postingan::join('users', 'users.id', '=', 'postingan.id_user')
                    ->join('kategori', 'kategori.id_kategori', '=', 'postingan.id_kategori')
                    ->where('postingan.jenis_berita', $tipe)
                    ->where('postingan.status_postingan', 'true')
                    ->orderBy('postingan.tanggal_berita', 'DESC')
                    ->get();
            } elseif ($tipe !== "semua" and $kategori !== "semua") {
                $data = Postingan::join('users', 'users.id', '=', 'postingan.id_user')
                    ->join('kategori', 'kategori.id_kategori', '=', 'postingan.id_kategori')
                    ->where('postingan.jenis_berita', $tipe)
                    ->where('kategori.nama_kategori', $kategori)
                    ->where('postingan.status_postingan', 'true')
                    ->orderBy('postingan.tanggal_berita', 'DESC')
                    ->get();
            }
        } else {
            if ($tipe == "semua" and $kategori == "semua") {
                $data = Postingan::join('users', 'users.id', '=', 'postingan.id_user')
                    ->join('kategori', 'kategori.id_kategori', '=', 'postingan.id_kategori')
                    ->where('postingan.status_postingan', 'true')
                    ->where('postingan.tanggal_berita', $request->tanggal)
                    ->orderBy('postingan.tanggal_berita', 'DESC')
                    ->get();
            } elseif ($tipe == "semua" and $kategori !== "semua") {
                $data = Postingan::join('users', 'users.id', '=', 'postingan.id_user')
                    ->join('kategori', 'kategori.id_kategori', '=', 'postingan.id_kategori')
                    ->where('kategori.nama_kategori', $kategori)
                    ->where('postingan.status_postingan', 'true')
                    ->where('postingan.tanggal_berita', $request->tanggal)
                    ->orderBy('postingan.tanggal_berita', 'DESC')
                    ->get();
            } elseif ($tipe !== "semua" and $kategori == "semua") {
                $data = Postingan::join('users', 'users.id', '=', 'postingan.id_user')
                    ->join('kategori', 'kategori.id_kategori', '=', 'postingan.id_kategori')
                    ->where('postingan.jenis_berita', $tipe)
                    ->where('postingan.status_postingan', 'true')
                    ->where('postingan.tanggal_berita', $request->tanggal)
                    ->orderBy('postingan.tanggal_berita', 'DESC')
                    ->get();
            } elseif ($tipe !== "semua" and $kategori !== "semua") {
                $data = Postingan::join('users', 'users.id', '=', 'postingan.id_user')
                    ->join('kategori', 'kategori.id_kategori', '=', 'postingan.id_kategori')
                    ->where('postingan.jenis_berita', $tipe)
                    ->where('kategori.nama_kategori', $kategori)
                    ->where('postingan.status_postingan', 'true')
                    ->where('postingan.tanggal_berita', $request->tanggal)
                    ->orderBy('postingan.tanggal_berita', 'DESC')
                    ->get();
            }
        }
        return view('page.home.index', compact('data', 'tipe', 'kategori'));
    }
}

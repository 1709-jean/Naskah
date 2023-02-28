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
        $cek = User::where('email', $request->email)->first();
        if ($cek == NULL) {
            if ($request->hasFile('foto')) {
                $customMessages = [
                    'required' => 'Email harus di isi',
                    'min' => 'Nomor Handphone minimal 10 angka',
                    'email' => 'Harus dalam format Email',
                ];
                $validate = [
                    'email' => 'required|email',
                    'telepon' => 'required|min:10',
                ];
                $this->validate($request, $validate, $customMessages);
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
        return redirect(route('login'))->with('add', 'Akun berhasil terdaftar. Silahkan login sesuai Email dan Password yang kamu daftarkan');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}

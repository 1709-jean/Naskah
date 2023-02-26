<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


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
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard_admin()
    {
        $user = User::where('level', 'User')->count();
        $lost = Postingan::where('jenis_berita', 'lost')->count();
        $found = Postingan::where('jenis_berita', 'found')->count();
        $postingan = Postingan::join('users', 'users.id', '=', 'postingan.id_user')
            ->select(
                'postingan.tanggal_berita as tanggal',
                \DB::RAW('count(postingan.id_user) as jml')
            )
            ->groupBy('postingan.tanggal_berita')
            ->whereMonth('postingan.tanggal_berita', date('m'))
            // ->where('cuti.status_cuti','true')
            ->get();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Postingan;

class AdminController extends Controller
{
    public function dashboard_admin()
    {
        //$user = User::where('level', 'User')->count();
        //$lost = Postingan::where('jenis_berita', 'lost')->count();
        //$found = Postingan::where('jenis_berita', 'found')->count();
        //$postingan = Postingan::join('users', 'users.id', '=', 'postingan.id_user')
        //  ->select(
        //    'postingan.tanggal_berita as tanggal',
        //  \DB::RAW('count(postingan.id_user) as jml')
        ///)
        //->groupBy('postingan.tanggal_berita')
        //->whereMonth('postingan.tanggal_berita', date('m'))
        // ->where('cuti.status_cuti','true')
        //->get();
        //$data = [];

        //foreach ($postingan as $row) {
        ///  $data['label'][] = $row->tanggal;
        //$data['data'][] = $row->jml;
        //}

        //$data['chart_data'] = json_encode($data);
        //return view('page.admin.home.index', $data, compact('user', 'lost', 'found'));
    }
}

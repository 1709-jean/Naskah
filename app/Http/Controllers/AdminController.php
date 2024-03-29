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
		$user = User::where('level', 'User')->count();
		$lost = Postingan::where('jenis_berita', 'lost')->count();
		$found = Postingan::where('jenis_berita', 'found')->count();
		$foundop = Postingan::where('jenis_berita', 'found')->where('status_postingan', 'true')->count();
		$lostop = Postingan::where('jenis_berita', 'lost')->where('status_postingan', 'true')->count();
		$founddone = Postingan::where('jenis_berita', 'found')->where('status_postingan', 'clear')->count();
		$lostdone = Postingan::where('jenis_berita', 'lost')->where('status_postingan', 'clear')->count();

		$postingan = Postingan::join('users', 'users.id', '=', 'postingan.id_user')
			->select(
				'postingan.tanggal_berita as tanggal',
				\DB::RAW('count(postingan.id_user) as jml')
			)
			->groupBy('postingan.tanggal_berita')
			->whereMonth('postingan.tanggal_berita', date('m'))
			->get();
		$data = [];

		foreach ($postingan as $row) {
			$data['label'][] = $row->tanggal;
			$data['data'][] = $row->jml;
		}

		$data['chart_data'] = json_encode($data);
		return view('page.admin.home.index', $data, compact('user', 'lost', 'found', 'foundop', 'lostop', 'lostdone', 'founddone'));
	}

	public function data_kategori()
	{
		$data = DB::table('kategori')->where('nama_kategori', '!=', 'HRD')->get();
		return view('page/admin/kategori/index', compact('data'));
	}
	public function addkategori(Request $request)
	{
		foreach ($request->nama_kategori as $key => $value) {
			DB::table('kategori')->insert([
				'nama_kategori' => $request->nama_kategori[$key],
			]);
		}
		return redirect()->back()->with('add', 'Kategori Berhasil di tambahkan');
	}
	public function deletekategori($id_kategori)
	{
		DB::table('kategori')->where('id_kategori', $id_kategori)->delete();
		return redirect()->back()->with('del', 'Kategori berhasil di hapus');
	}
	public function updatekategori(Request $request, $id_kategori)
	{
		DB::table('kategori')->where('id_kategori', $id_kategori)->update([
			'nama_kategori' => $request->nama_kategori
		]);
		return redirect()->back()->with('up', 'Berhasil ubah Data Kategori');
	}

	// public function postingan_report()
	// {
	// 	$data = Postingan::join('users', 'users.id', '=', 'postingan.id_user')
	// 		->join('kategori', 'kategori.id_kategori', '=', 'postingan.id_kategori')
	// 		->join('lapor', 'lapor.id_postingan', '=', 'postingan.id_postingan')
	// 		->select(
	// 			\DB::RAW('count(lapor.id_postingan) as jml'),
	// 			'postingan.jenis_berita',
	// 			'kategori.nama_kategori',
	// 			'postingan.detail_berita',
	// 			'postingan.status_postingan'
	// 		)
	// 		->groupBy('postingan.jenis_berita', 'postingan.status_postingan', 'kategori.nama_kategori', 'postingan.detail_berita')
	// 		->where('postingan.status_postingan', 'true')
	// 		->get();
	// 	return view('page.admin.report.index', compact('data'));
	// }

	public function data_user()
	{
		$data = user::join('biodata', 'biodata.id_user', 'users.id')
			->get();
		return view('page/admin/user/index', compact('data'));
	}
	public function hapus_user($id)
	{
		DB::table('biodata')->where('id_user', $id)->delete();
		User::where('id', $id)->delete();
		return back()->with('del', 'Data user Berhasil di hapus');
	}
}

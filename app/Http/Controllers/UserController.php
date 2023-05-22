<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Postingan;

date_default_timezone_set('Asia/Jakarta');

class UserController extends Controller
{
	public function postingan_saya()
	{
		$data = Postingan::join('users', 'users.id', '=', 'postingan.id_user')
			->join('kategori', 'kategori.id_kategori', '=', 'postingan.id_kategori')
			->where('users.id', Auth::user()->id)
			->orderBy('postingan.tanggal_berita', 'DESC')
			->orderBy('postingan.status_postingan', 'ASC')
			->get();
		return view('page.user.postingan.index', compact('data'));
	}
	public function tambah_postingan()
	{
		$kategori = DB::table('kategori')->get();
		return view('page.user.postingan.tambah', compact('kategori'));
	}
	public function add_postingan(Request $request)
	{
		$karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		$shuffle  = substr(str_shuffle($karakter), 0, 6);
		$postingan = new Postingan();
		$postingan->id_user = Auth::user()->id;
		$postingan->id_kategori = $request->id_kategori;
		$postingan->jenis_berita = $request->jenis_berita;
		$postingan->detail_berita = $request->detail_berita;
		$postingan->tanggal_berita = date('Y-m-d');
		$postingan->waktu_berita = date('H:i:s');
		$postingan->kode = $shuffle;
		$postingan->save();
		if ($request->jenis_berita == "lost") {
			$customMessages = [
				'required' => 'Form harus di isi secara lengkap',
			];
			$validate = [
				'lokasi' => 'required',
			];
			foreach ($request->lokasi as $key => $value) {
				DB::table('postingan_lost')->insert([
					'id_postingan' => $postingan->id_postingan,
					'lokasi' => $request->lokasi[$key],
				]);
			}
		} else {
			$customMessages = [
				'required' => 'Form harus di isi secara lengkap',
			];
			$validate = [
				'pertanyaan' => 'required',
				'penemuan' => 'required',
			];
			DB::table('postingan_found')->insert([
				'id_postingan' => $postingan->id_postingan,
				'pertanyaan' => $request->pertanyaan,
				'penemuan' => $request->penemuan,
			]);
		}
		foreach ($request->gambar as $key => $value) {
			$ambil = $request->file('gambar')[$key];
			$namaFileBaru = md5($ambil->getClientOriginalName());
			$namafoto = $ambil->move(\base_path() . "/public/gambar", $namaFileBaru);
			DB::table('postingan_gambar')->insert([
				'id_postingan' => $postingan->id_postingan,
				'gambar' => $namaFileBaru,
				'path' => $namafoto,
			]);
		}
		$this->validate($request, $validate, $customMessages);
		return redirect(route('postingan_saya'))->with('add', 'Postingan berhasil di Tambahkan!');
	}
	public function ubah_postingan($id_postingan)
	{
		$kategori = DB::table('kategori')->get();
		$data = Postingan::join('users', 'users.id', '=', 'postingan.id_user')
			->join('kategori', 'kategori.id_kategori', '=', 'postingan.id_kategori')
			// ->where('users.id',Auth::user()->id)
			->where('postingan.id_postingan', $id_postingan)
			->first();
		$lost = Postingan::join('users', 'users.id', '=', 'postingan.id_user')
			->join('kategori', 'kategori.id_kategori', '=', 'postingan.id_kategori')
			->join('postingan_lost', 'postingan_lost.id_postingan', '=', 'postingan.id_postingan')
			// ->where('users.id',Auth::user()->id)
			->where('postingan_lost.id_postingan', $id_postingan)
			->get();
		$found = Postingan::join('users', 'users.id', '=', 'postingan.id_user')
			->join('kategori', 'kategori.id_kategori', '=', 'postingan.id_kategori')
			->join('postingan_found', 'postingan_found.id_postingan', '=', 'postingan.id_postingan')
			// ->where('users.id',Auth::user()->id)
			->where('postingan_found.id_postingan', $id_postingan)
			->first();
		$gambar = Postingan::join('users', 'users.id', '=', 'postingan.id_user')
			->join('kategori', 'kategori.id_kategori', '=', 'postingan.id_kategori')
			->join('postingan_gambar', 'postingan_gambar.id_postingan', '=', 'postingan.id_postingan')
			// ->where('users.id',Auth::user()->id)
			->where('postingan_gambar.id_postingan', $id_postingan)
			->get();
		return view('page.user.postingan.ubah', compact('kategori', 'data', 'lost', 'gambar', 'found'));
	}
	public function update_postingan(Request $request, $id_postingan)
	{
		Postingan::where('id_postingan', $id_postingan)->update([
			'id_kategori' => $request->id_kategori,
			'jenis_berita' => $request->jenis_berita,
			'detail_berita' => $request->detail_berita,
			// 'tanggal_berita' => date('Y-m-d'),
			// 'waktu_berita' => date('H:i:s'),
		]);
		if ($request->jenis_berita == "lost") {
			$pilih = $request->pilih;
			foreach ($request->lokasi_at as $key => $value) {
				if (in_array($request->lokasi_at[$key], $request->pilih)) {
					$id_lost = $request->id_lost[$key];
					DB::table('postingan_lost')->where('id_lost', $id_lost)->update([
						'lokasi' => $request->lokasi[$key],
					]);
				}
			}
		} else {
			DB::table('postingan_found')->where('id_found', $request->id_found)->update([
				'pertanyaan' => $request->pertanyaan,
				'penemuan' => $request->penemuan,
			]);
		}
		return redirect(route('postingan_saya'))->with('up', 'Postingan berhasil di Ubah!');
	}
	public function delete_postingan(Request $request, $id_postingan)
	{
		if (!empty($request->act)) {
			Postingan::where('id_postingan', $id_postingan)->update([
				'status_postingan' => 'false',
			]);
		} elseif (!empty($request->clear_first)) {
			$cek_klaim = DB::table('klaim')->where('id_postingan', $id_postingan)->first();
			if ($cek_klaim) {
				DB::table('klaim')->where('id_postingan', $id_postingan)->update([
					'status_klaim' => 'false',
				]);
			}
			Postingan::where('id_postingan', $id_postingan)->update([
				'status_postingan' => 'clear first',
			]);
		} else {
			$cek = Postingan::where('id_postingan', $id_postingan)->first();
			Postingan::where('id_postingan', $id_postingan)->delete();
			if ($cek->jenis_berita == "lost") {
				DB::table('postingan_lost')->where('id_postingan', $id_postingan)->delete();
			} else {
				DB::table('postingan_found')->where('id_postingan', $id_postingan)->delete();
			}
			DB::table('postingan_gambar')->where('id_postingan', $id_postingan)->delete();
		}
		return back()->with('del', 'Postingan Anda berhasil di Hapus!');
	}

	// public function add_lapor(Request $request)
	// {
	// 	$cek = DB::table('lapor')
	// 		->where('id_user', Auth::user()->id)
	// 		->where('id_postingan', $request->id_postingan)
	// 		->first();
	// 	if (!empty($request->keterangan_lapor)) {
	// 		if ($cek == NULL) {
	// 			DB::table('lapor')->insert([
	// 				'id_user' => Auth::user()->id,
	// 				'id_postingan' => $request->id_postingan,
	// 				'keterangan_lapor' => $request->keterangan_lapor,
	// 			]);
	// 			return response()->json([
	// 				'yes' => '-'
	// 			]);
	// 		} else {
	// 			return response()->json([
	// 				'not' => '-'
	// 			]);
	// 		}
	// 	} else {
	// 		return response()->json([
	// 			'kosong' => '-'
	// 		]);
	// 	}
	// }

	public function klaim($id_postingan)
	{
		$postingan = Postingan::where('id_postingan', $id_postingan)->where('id_user', '!=', Auth::user()->id)->get();
		$found = DB::table('postingan')->join('users', 'users.id', '=', 'postingan.id_user')
			->join('kategori', 'kategori.id_kategori', '=', 'postingan.id_kategori')
			->join('postingan_found', 'postingan_found.id_postingan', '=', 'postingan.id_postingan')
			->where('postingan_found.id_postingan', $id_postingan)
			->first();
		$lost = DB::table('postingan')->join('users', 'users.id', '=', 'postingan.id_user')
			->join('kategori', 'kategori.id_kategori', '=', 'postingan.id_kategori')
			->join('postingan_lost', 'postingan_lost.id_postingan', '=', 'postingan.id_postingan')
			->where('postingan_lost.id_postingan', $id_postingan)
			->get();
		$cek = DB::table('klaim')
			->where('id_user', Auth::user()->id)
			->where('id_postingan', $id_postingan)
			->first();
		return view('page.user.klaim.tambah', compact('found', 'id_postingan', 'cek', 'lost', 'postingan'));
	}
	public function ajukan_klaim(Request $request, $id_postingan)
	{
		$cek = DB::table('klaim')
			->where('id_user', Auth::user()->id)
			->where('id_postingan', $id_postingan)
			->first();
		if ($request->hasFile('foto')) {
			$ambil = $request->file('foto');
			$name = $ambil->getClientOriginalName();
			$namaFileBaru = uniqid();
			$namaFileBaru .= $name;
			$ambil->move(\base_path() . "/public/klaim", $namaFileBaru);
		} else {
			$namaFileBaru = NULL;
		}
		if ($cek == NULL) {
			DB::table('klaim')->insert([
				'id_user' => Auth::user()->id,
				'id_postingan' => $id_postingan,
				'jawaban_klaim' => $request->jawaban_klaim,
				'gambar_klaim' => $namaFileBaru,
			]);
			return redirect(route('klaim_saya'))->with('add', 'Anda berhasil mengajukan Klaim, mohon menunggu Pembuat Berita untuk Verifikasi');
		} else {
			return back()->with('del', 'Anda sudah mengajukan Klaim!');
		}
	}
	public function klaim_saya()
	{
		$data = DB::table('postingan')
			->join('klaim', 'klaim.id_postingan', '=', 'postingan.id_postingan')
			->join('users', 'users.id', '=', 'postingan.id_user')
			->where('klaim.id_user', Auth::user()->id)
			->get();
		$namaPembuat = User::join('biodata', 'biodata.id_user', '=', 'users.id')->get();
		return view('page.user.klaim.index', compact('data', 'namaPembuat'));
	}
	public function ubah_klaim($id_klaim)
	{
		$data = DB::table('postingan')->join('users', 'users.id', '=', 'postingan.id_user')
			->join('kategori', 'kategori.id_kategori', '=', 'postingan.id_kategori')
			->join('klaim', 'klaim.id_postingan', '=', 'postingan.id_postingan')
			->where('klaim.id_klaim', $id_klaim)
			->where('klaim.id_user', Auth::user()->id)
			->where('klaim.status_klaim', 'pending')
			->first();
		$found = DB::table('postingan')->join('users', 'users.id', '=', 'postingan.id_user')
			->join('kategori', 'kategori.id_kategori', '=', 'postingan.id_kategori')
			->join('klaim', 'klaim.id_postingan', '=', 'postingan.id_postingan')
			->join('postingan_found', 'postingan_found.id_postingan', '=', 'postingan.id_postingan')
			->where('klaim.id_klaim', $id_klaim)
			->where('klaim.id_user', Auth::user()->id)
			->where('klaim.status_klaim', 'pending')
			->first();
		$lost = DB::table('postingan')->join('users', 'users.id', '=', 'postingan.id_user')
			->join('kategori', 'kategori.id_kategori', '=', 'postingan.id_kategori')
			->join('klaim', 'klaim.id_postingan', '=', 'postingan.id_postingan')
			->join('postingan_lost', 'postingan_lost.id_postingan', '=', 'postingan.id_postingan')
			->where('klaim.id_klaim', $id_klaim)
			->where('klaim.id_user', Auth::user()->id)
			->where('klaim.status_klaim', 'pending')
			->first();
		// $gambar = Postingan::join('klaim','klaim.id_postingan','=','postingan.id_postingan')
		// ->join('kategori','kategori.id_kategori','=','postingan.id_kategori')
		// ->join('users','users.id','=','klaim.id_user')
		// ->join('klaim_gambar','postingan_gambar.id_postingan','=','postingan.id_postingan')
		// ->where('klaim.id_klaim',$id_klaim)
		// ->where('klaim.id_user',Auth::user()->id)
		// ->where('klaim.status_klaim','pending')
		// ->get();
		return view('page.user.klaim.ubah', compact('data', 'id_klaim', 'found', 'lost'));
	}
	public function update_klaim(Request $request, $id_klaim)
	{
		DB::table('klaim', $id_klaim)->update([
			'jawaban_klaim' => $request->jawaban_klaim,
		]);
		return redirect(route('klaim_saya'))->with('up', 'Klaim Anda berhasil di ubah');
	}
	public function data_klaim()
	{
		$data = Postingan::join('users', 'users.id', '=', 'postingan.id_user')
			->join('kategori', 'kategori.id_kategori', '=', 'postingan.id_kategori')
			->where('postingan.id_user', Auth::user()->id)
			// ->where('postingan.status_postingan','true')
			->get();
		return view('page.user.postingan_klaim.index', compact('data'));
	}
	public function lihat_klaim($id_postingan)
	{
		$data = DB::table('postingan')
			->join('kategori', 'kategori.id_kategori', '=', 'postingan.id_kategori')
			->join('klaim', 'klaim.id_postingan', '=', 'postingan.id_postingan')
			->join('users', 'users.id', '=', 'klaim.id_user')
			->join('biodata', 'users.id', '=', 'biodata.id_user')
			->where('klaim.id_postingan', $id_postingan)
			->where('postingan.id_user', Auth::user()->id)
			->where('postingan.status_postingan', '!=', 'false')
			// ->where('klaim.status_klaim','pending')
			->get();
		return view('page.user.postingan_klaim.lihat', compact('data'));
	}

	public function verifikasi_klaim(Request $request, $id_klaim)
	{
		DB::table('klaim')->where('id_klaim', $id_klaim)->update([
			'status_klaim' => 'true',
		]);
		DB::table('klaim')
			->where('id_postingan', $request->id_postingan)
			->where('status_klaim', 'pending')
			->update([
				'status_klaim' => 'false',
			]);
		Postingan::where('id_postingan', $request->id_postingan)->update([
			'status_postingan' => 'clear',
		]);
		return back()->with('up', 'Anda berhasil melakukan Verifikasi Klaim/Pengajuan Informasi');
	}

	public function ubah_user(Request $request)
	{
		if ($request->password == "") {
			$password = $request->passwordLama;
		} else {
			$password = hash::make($request->password);
		}
		DB::table('users')->where('id', Auth::user()->id)->update([
			'name' => $request->name,
			'email' => $request->email,
			'password' => $password,
		]);
		if (Auth::user()->level == "User") {
			DB::table('biodata')->where('id_user', Auth::user()->id)->update([
				'nik' => $request->nik,
				'telepon' => $request->telepon,
			]);
		}
		return redirect()->back()->with('up', 'Anda berhasil memperbarui Profil');
	}
}

<?php

namespace App\Http\Controllers;

use App\GolonganModel;
use App\JenisModel;
use App\KategoriModel;
use Illuminate\Http\Request;
use DB;
use Session;

class KategoriController extends Controller
{
    private $kategori;
    private $jenis;
    private $golongan;

    function __construct()
    {
        $this->kategori         = new KategoriModel();
        $this->jenis            = new JenisModel();
        $this->golongan         = new GolonganModel();
    }

    public function index()
    {
        $data['kategori'] = $this->kategori->getKategori();
        return view('kategori.index', $data);
    }

    public function create()
    {
        $data['kategori']   = $this->kategori->getKategori();
        $data['jenis']      = $this->jenis->getJenis();
        $data['golongan']   = $this->golongan->getGolongan();
        return view('kategori.create', $data);
    }

    public function store(Request $request)
    {
        $this->validate ($request, [
            'kode_kategori'    => 'required',
            'nama_kategori'    => 'required',
            'nama_jenis'       => 'required',
        ]);

        try {
            $this->kategori->save_kategori($request);
            Session::flash('success','Kategori berhasil di tambahkan');
            return redirect('/kategori');
        } catch (\Throwable $th) {
            Session::flash('error','Kategori gagal di tambahkan');
            return redirect('/kategori');
        }
    }

    public function delete(Request $request)
    {
        try {
            $this->kategori->delete_kategori($request->id_kategori);
            Session::flash('success','Kategori berhasil di hapus');
            return redirect('/kategori');
        } catch (\Throwable $th) {
            Session::flash('error','Kategori gagal di hapus');
            return redirect('/kategori');
        }
    }

    public function edit($id_kategori)
    {
        $data['kategori']        = $this->kategori->getKategori($id_kategori);
        $data['jenis']           = DB::table('tb_jenis')->get();
        $data['golongan']        = DB::table('tb_golongan')->get();
        return view('kategori.edit',$data);
    }

    public function update(Request $request)
    {
        try {
            $this->kategori->update_kategori($request);
            Session::flash('success','Kategori berhasil di update');
            return redirect('/kategori');
        } catch (\Throwable $th) {
            Session::flash('error','Kategori gagal di update');
            return redirect('/kategori');
        }
    }
}

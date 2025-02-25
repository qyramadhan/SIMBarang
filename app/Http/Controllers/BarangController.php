<?php

namespace App\Http\Controllers;

use App\GolonganModel;
use App\JenisModel;
use App\BarangModel;
use Illuminate\Http\Request;
use DB;
use Session;

class BarangController extends Controller
{
    private $barang;
    private $jenis;
    private $golongan;

    function __construct()
    {
        $this->barang           = new BarangModel();
        $this->jenis            = new JenisModel();
        $this->golongan         = new GolonganModel();
    }

    public function index()
    {
        $data['barang'] = $this->barang->getBarang();
        return view('barang.index', $data);
    }

    public function create()
    {
        $data['barang']     = $this->barang->getBarang();
        $data['jenis']      = $this->jenis->getJenis();
        $data['golongan']   = $this->golongan->getGolongan();
        return view('barang.create', $data);
    }

    public function store(Request $request)
    {
        $this->validate ($request, [
            'kode_barang'    => 'required',
            'nama_barang'    => 'required',
            'nama_jenis'       => 'required',
        ]);

        try {
            $this->barang->save_barang($request);
            Session::flash('success','Barang berhasil di tambahkan');
            return redirect('/barang');
        } catch (\Throwable $th) {
            Session::flash('error','Barang gagal di tambahkan');
            return redirect('/barang');
        }
    }

    public function delete(Request $request)
    {
        try {
            $this->barang->delete_barang($request->id_barang);
            Session::flash('success','Barang berhasil di hapus');
            return redirect('/barang');
        } catch (\Throwable $th) {
            Session::flash('error','Barang gagal di hapus');
            return redirect('/barang');
        }
    }

    public function edit($id_barang)
    {
        $data['barang']        = $this->barang->getBarang($id_barang);
        $data['jenis']           = DB::table('tb_jenis')->get();
        $data['golongan']        = DB::table('tb_golongan')->get();
        return view('barang.edit',$data);
    }

    public function update(Request $request)
    {
        try {
            $this->barang->update_barang($request);
            Session::flash('success','Barang berhasil di update');
            return redirect('/barang');
        } catch (\Throwable $th) {
            Session::flash('error','Barang gagal di update');
            return redirect('/barang');
        }
    }
}

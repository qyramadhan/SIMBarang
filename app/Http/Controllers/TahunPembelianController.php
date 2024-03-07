<?php

namespace App\Http\Controllers;

use App\TahunPembelianModel;
use Illuminate\Http\Request;
use DB;
use Session;

class TahunPembelianController extends Controller
{
    private $tahunpembelian;

    function __construct()
    {
        $this->tahunpembelian = new TahunPembelianModel;
    }

    public function index()
    {
        $data['tahunpembelian']= $this->tahunpembelian->getTahun();
        return view('tahunpembelian.index', $data);
    }

    public function create()
    {
        $data['tahunpembelian']    = DB::table('tb_tahunpembelian')->get();
        return view('tahunpembelian.create',$data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'tahun'   => 'required',

        ]);

        try {
            $this->tahunpembelian->save_tahun($request);
            Session::flash('success','Tahun Pembelian berhasil di tambahkan');
            return redirect('/tahun');
        } catch (\Throwable $th) {
            Session::flash('failed','Tahun Pembelian gagal di tambahkan');
            return redirect('/tahun');
        }
    }

    public function edit($id_tahun)
    {
        $data['tahunpembelian']= $this->tahunpembelian->getTahun($id_tahun);
        return view('tahunpembelian.edit', $data);
    }

    public function update(Request $request)
    {
        try {
            $this->tahunpembelian->update_tahun($request);
            Session::flash('success','Tahun Pembelian berhasil di ubah');
            return redirect('/tahun');
        } catch (\Throwable $th) {
            Session::flash('failed','Tahun Pembelian gagal di ubah');
            return redirect('/tahun');
        }
    }
}

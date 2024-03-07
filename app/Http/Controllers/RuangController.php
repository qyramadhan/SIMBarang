<?php

namespace App\Http\Controllers;

use App\GedungModel;
use App\LantaiModel;
use App\RuangModel;
use Session;
use DB;
use Illuminate\Http\Request;

class RuangController extends Controller
{
    private $ruang;
    private $lantai;
    private $gedung;

    function __construct()
    {
        $this->ruang        = new RuangModel();
        $this->lantai       = new LantaiModel();
        $this->gedung       = new GedungModel();
    }

    public function index()
    {
        $data['ruang'] = $this->ruang->getRuang();
        return view('ruang.index', $data);
    }

    public function create()
    {
        $data['ruang']    = $this->ruang->getRuang();
        $data['lantai']   = $this->lantai->getLantai();
        $data['gedung']   = $this->gedung->getGedung();
        return view('ruang.create', $data);
    }

    public function store(Request $request)
    {
        $this->validate ($request, [
            'kode_ruang'    => 'required',
            'nama_ruang'    => 'required',
            'nama_lantai'   => 'required',
            'nama_gedung'   => 'required',
        ]);

        try {
            $this->ruang->save_ruang($request);
            Session::flash('success','Ruang berhasil di tambahkan');
            return redirect('/ruang');
        } catch (\Throwable $th) {
            Session::flash('error','Ruang gagal di tambahkan');
            return redirect('/ruang');
        }
    }

    public function delete(Request $request)
    {
        try {
            $this->ruang->delete_ruang($request->id_ruang);
            Session::flash('success','Ruang berhasil di hapus');
            return redirect('/ruang');
        } catch (\Throwable $th) {
            Session::flash('error','Ruang gagal di hapus');
            return redirect('/ruang');
        }
    }

    public function edit($id_ruang)
    {
        $data['ruang']         = $this->ruang->getRuang($id_ruang);
        $data['lantai']        = $this->lantai->getLantai();
        $data['gedung']        = $this->gedung->getGedung();
        return view('ruang.edit',$data);
    }

    public function update(Request $request)
    {
        try {
            $this->ruang->update_ruang($request);
            Session::flash('success','Ruang berhasil di update');
            return redirect('/ruang');
        } catch (\Throwable $th) {
            Session::flash('failed','Ruang gagal di update');
            return redirect('/ruang');
        }
    }

    public function cetak()
    {
        $data['ruang'] = $this->ruang->getRuang();
        return view('ruang.cetak', $data);
    }
}

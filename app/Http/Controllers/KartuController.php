<?php

namespace App\Http\Controllers;

use App\KartuModel;
use App\RuangModel;
use Illuminate\Http\Request;
use Session;

class KartuController extends Controller
{
    private $kartu;
    private $ruang;

    function __construct()
    {
        $this->kartu         = new KartuModel();
        $this->ruang         = new RuangModel();
    }

    public function index()
    {
        $data['kartu'] = $this->kartu->getKartu();
        return view('kartu.index', $data);
    }

    public function create()
    {
        $data['kartu']   = $this->kartu->getKartu();
        $data['ruang']   = $this->ruang->getRuang();
        return view('kartu.create', $data);
    }

    public function store(Request $request)
    {
        $this->validate ($request, [
            'nama_ruang'        => 'required',
            'keterangan'        => 'required',
        ]);

        try {
            $this->kartu->save_kartu($request);
            Session::flash('success','Kartu berhasil di tambahkan');
            return redirect('/kartu');
        } catch (\Throwable $th) {
            Session::flash('error','Kartu gagal di tambahkan');
            return redirect('/kartu');
        }
    }

    public function delete(Request $request)
    {
        try {
            $this->kartu->delete_kartu($request->id_kartu);
            Session::flash('success','Kartu berhasil di hapus');
            return redirect('/kartu');
        } catch (\Throwable $th) {
            Session::flash('error','Kartu gagal di hapus');
            return redirect('/kartu');
        }
    }

    public function edit($id_kartu)
    {
        $data['kartu']        = $this->kartu->getKartu($id_kartu);
        $data['ruang']        = $this->ruang->get();
        return view('kartu.edit',$data);
    }

    public function update(Request $request)
    {
        try {
            $this->kartu->update_kartu($request);
            Session::flash('success','Kartu berhasil di update');
            return redirect('/kartu');
        } catch (\Throwable $th) {
            Session::flash('error','Kartu gagal di update');
            return redirect('/kartu');
        }
    }

    public function cetak()
    {
        $data['kartu'] = $this->kartu->getKartu();
        return view('kartu.cetak', $data);
    }
}

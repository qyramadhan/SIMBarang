<?php

namespace App\Http\Controllers;

use App\DetailKartuModel;
use App\KartuModel;
use App\RuangModel;
use Illuminate\Http\Request;
use Session;

class DetailKartuController extends Controller
{
    private $detail;
    private $kartu;
    private $ruang;

    function __construct()
    {
        $this->detail   = new DetailKartuModel();
        $this->kartu    = new KartuModel();
        $this->ruang    = new RuangModel();
    }

    public function index()
    {
        $data['detail'] = $this->detail->getDetail();
        return view('detail.index', $data);
    }

    public function create()
    {
        $data['detail'] = $this->detail->getDetail();
        return view('detail.create', $data);
    }

    public function store(Request $request)
    {
        $this->validate ($request, [
            'id_ruang'          => 'required',
            'jumlah_barang'     => 'required',
            'kondisi_barang'    => 'required',
            'keterangan'        => 'required',
        ]);

        try {
            $this->detail->save_detail($request);
            Session::flash('success','Detail Kartu Barang berhasil di tambahkan');
            return redirect('/detail');
        } catch (\Throwable $th) {
            Session::flash('failed','Detail Kartu Barang gagal di tambahkan');
            return redirect('/detail');
        }
    }

    public function delete(Request $request)
    {
        try {
            $this->detail->delete_detail($request->id_detailkartu);
            Session::flash('success','Detail Kartu Barang berhasil di hapus');
            return redirect('/detail');
        } catch (\Throwable $th) {
            Session::flash('failed','Detail Kartu Barang gagal di hapus');
            return redirect('/detail');
        }
    }

    public function edit($id_detailkartu)
    {
        $data['detail']         = $this->detail->getDetail($id_detailkartu);
        $data['kartu']          = $this->kartu->getKartu();
        return view('detail.edit',$data);
    }

    public function update(Request $request)
    {
        try {
            $this->detail->update_detail($request);
            Session::flash('success','Detail Kartu Barang berhasil di update');
            return redirect('/detail');
        } catch (\Throwable $th) {
            Session::flash('failed','Detail Kartu Barang gagal di update');
            return redirect('/detail');
        }
    }
}

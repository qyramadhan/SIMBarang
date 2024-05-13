<?php

namespace App\Http\Controllers;

use App\BarangModel;
use App\DetailKartuModel;
use App\KartuModel;
use App\RuangModel;
use Illuminate\Http\Request;
use Session;

class DetailKartuController extends Controller
{
    
    private $detail;
    private $kartu;
    private $barang;

    function __construct()
    {
        $this->detail   = new DetailKartuModel();
        $this->kartu    = new KartuModel();
        $this->barang   = new BarangModel();
    }

    public function index($id_kartu)
    {
        $data['detail'] = $this->detail->getDetail($id_kartu);
        $data['barang'] = $this->detail->getDataBarang();
        $data['id_kartu'] = $id_kartu;
        return view('detail.index', $data);
    }

    public function create()
    {
        $data['detail'] = $this->detail->getDetail();
        return view('detail.index', $data);
    }

    public function store(Request $request)
    {
        
        $this->validate ($request, [
            'jumlah_barang'     => 'required',
            'kondisi_barang'    => 'required',
            'keterangan'        => 'required',
        ]);

        $save=$this->detail->save_detail($request);
        if($save == TRUE){
            Session::flash('success','Detail Kartu Barang berhasil di tambahkan');
            return redirect('detail/'.$request->id_kartu);
        }
        Session::flash('failed','Detail Kartu Barang gagal di tambahkan');
        return redirect('detail/'.$request->id_kartu);
        
    }

    public function delete(Request $request)
    {
        try {
            $this->detail->delete_detail($request->id_detailkartu);
            Session::flash('success','Detail Kartu Barang berhasil di hapus');
            return redirect('detail/'.$request->id_kartu);
        } catch (\Throwable $th) {
            Session::flash('failed','Detail Kartu Barang gagal di hapus');
            return redirect('detail/'.$request->id_kartu);
        }
    }

    public function edit($id_detailkartu)
    {
        $data['detail'] = $this->detail->getDetailByID($id_detailkartu);
        $data['barang'] = $this->detail->getDataBarang();
        return view('detail.edit',$data);
    }

    public function update(Request $request)
    {
        try {
            $this->detail->update_detail($request);
            Session::flash('success','Detail Kartu Barang berhasil di update');
            return redirect('detail/'.$request->id_kartu);
        } catch (\Throwable $th) {
            Session::flash('failed','Detail Kartu Barang gagal di update');
            return redirect('detail/'.$request->id_kartu);
        }
    }

    public function cetak($id_detailkartu)
    {
        $data['detail'] = $this->detail->getDetailByID($id_detailkartu);
        return view('detail.cetak',$data);
    }
}
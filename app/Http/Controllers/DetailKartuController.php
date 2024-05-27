<?php

namespace App\Http\Controllers;

use App;
use App\AnggaranModel;
use App\BarangModel;
use App\DetailKartuModel;
use App\KartuModel;
use App\TahunPembelianModel;
use Dompdf\Dompdf;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Mpdf\Mpdf;
use Session;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class DetailKartuController extends Controller
{
    
    private $detail;
    private $kartu;
    private $barang;
    private $tahun;
    private $anggaran;
   

    function __construct()
    {
        $this->detail   = new DetailKartuModel();
        $this->kartu    = new KartuModel();
        $this->barang   = new BarangModel();
        $this->tahun    = new TahunPembelianModel();
        $this->anggaran = new AnggaranModel();
    }

    public function index($id_kartu)
    {
        $data['detail']     = $this->detail->getDetail($id_kartu);
        $data['barang']     = $this->detail->getDataBarang();
        $data['tahun']      = $this->tahun->getTahun();
        $data['anggaran']   = $this->anggaran->getAnggaran();
        $data['id_kartu']   = $id_kartu;
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
        $data['tahun']  = $this->tahun->getTahun();
        $data['anggaran']   = $this->anggaran->getAnggaran();
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

    public function cetak($id_kartu)
    {
        $data['detail'] = $this->detail->getDetail($id_kartu);
        $pdf = PDF::loadView('detail.cetakpdf',$data);
    	return $pdf->stream('cetak_label.php');
        // return view('detail.cetakpdf',$data);
    }
    public function cetakkartu($id_kartu)
    {
        $data['detail'] = $this->detail->getDetail($id_kartu);  
        $pdf = PDF::loadView('detail.cetakkartu',$data)->setPaper('a4', 'landscape');
    	return $pdf->stream('cetak_kartu.pdf');
        // $data['detail'] = $this->detail->getDetail($id_kartu);
        // return view('detail.cetakkartu',$data);
    }
}
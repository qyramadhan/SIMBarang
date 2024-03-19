<?php

namespace App\Http\Controllers;

use App\GolonganModel;
use App\JenisModel;
use Illuminate\Http\Request;
use Session;
use DB;

class JenisController extends Controller
{
   private $jenis;
   private $golongan;

   function __construct()
   {
        $this->jenis        = new JenisModel();
        $this->golongan     = new GolonganModel();
   }

   public function index()
   {
        $data['jenis']  = $this->jenis->getJenis();
        return view('jenis.index', $data);
   }

   public function create()
   {
        $data['jenis']      = $this->jenis->getJenis();
        $data['golongan']   = $this->golongan->getGolongan();
        return view('jenis.create', $data);
   }

   public function store(Request $request)
   {
        $this->validate ($request, [
            'kode_jenis'    => 'required',
            'nama_jenis'    => 'required',
            'id_golongan'   => 'required',
        ]);

        try {
            $this->jenis->save_jenis($request);
            Session::flash('success','Jenis berhasil di tambahkan');
            return redirect('/jenis');
        } catch (\Throwable $th) {
            Session::flash('error','Jenis gagal di tambahkan');
            return redirect('/jenis');
        }
    }

    public function delete(Request $request)
    {
        try {
            $this->jenis->delete_jenis($request->id_jenis);
            Session::flash('success','Jenis berhasil di hapus');
            return redirect('/jenis');
        } catch (\Throwable $th) {
            Session::flash('failed','Jenis gagal di hapus');
            return redirect('/jenis');
        }
    }

    public function edit($id_jenis)
    {
        $data['jenis']         = $this->jenis->getJenis($id_jenis);
        $data['golongan']      = DB::table('tb_golongan')->get();
        return view('jenis.edit',$data);
    }

    public function update(request $request)
    {
        try {
            $this->jenis->update_jenis($request);
            Session::flash('success','Jenis berhasil di update');
            return redirect('/jenis');
        } catch (\Throwable $th) {
            Session::flash('failed','Jenis gagal di update');
            return redirect('/jenis');
        }
    }
}
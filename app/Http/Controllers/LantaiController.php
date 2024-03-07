<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LantaiModel;
use App\GedungModel;
use Session;
use DB;

class LantaiController extends Controller
{
   private $lantai;
   private $gedung;
   
   function __construct()
   {
        $this->lantai = new LantaiModel;
        $this->gedung = new GedungModel;
   }

   public function index()
   {
        $data['lantai'] = $this->lantai->getLantai();
        return view('lantai.index', $data);
   }

   public function create()
   {
        $data['gedung'] = $this->gedung->getGedung();
        return view('lantai.create',$data);
   }

   public function store(Request $request)
   {
        $this->validate ($request, [
            'kode_lantai'       => 'required',
            'nama_lantai'       => 'required',
            'id_gedung'         => 'required',
        ]);

        try {
            $this->lantai->save_lantai($request);
            Session::flash('success','Lantai berhasil di tambahkan');
            return redirect('/lantai');
        } catch (\Throwable $th) {
            Session::flash('failed','Lantai gagal di tambahkan');
            return redirect('/lantai');
        }
    }

    public function delete(Request $request)
    {
        try {
            $this->lantai->delete_lantai($request->id_lantai);
            Session::flash('success','Lantai berhasil di hapus');
            return redirect('/lantai');
        } catch (\Throwable $th) {
            Session::flash('failed','Lantai gagal di hapus');
            return redirect('/lantai');
        }
    }

    public function edit($id_lantai)
    {
        $data['lantai']         = $this->lantai->getLantai($id_lantai);
        $data['gedung']         = $this->gedung->getGedung();
        return view('lantai.edit',$data);
    }

    public function update(Request $request)
    {
        try {
            $this->lantai->update_lantai($request);
            Session::flash('success','Lantai berhasil di update');
            return redirect('/lantai');
        } catch (\Throwable $th) {
            Session::flash('failed','Lantai gagal di update');
            return redirect('/lantai');
        }
    }
}
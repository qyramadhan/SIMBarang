<?php

namespace App\Http\Controllers;
use App\GedungModel;
use Session;
use DB;

use Illuminate\Http\Request;

class GedungController extends Controller
{
    private $gedung;

    function __construct()
    {
        $this->gedung = new GedungModel;
    }

    public function index()
    {
        $data['gedung']= $this->gedung->getGedung();
        return view('gedung.index', $data);
    }

    public function create()
    {
        $data['gedung']    = DB::table('tb_gedung')->get();
        $data['lantai']    = DB::table('tb_lantai')->get();
        return view('gedung.create',$data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kode_gedung'   => 'required',
            'nama_gedung'   => 'required',

        ]);

        try {
            $this->gedung->save_gedung($request);
            Session::flash('success','Gedung berhasil di tambahkan');
            return redirect('/gedung');
        } catch (\Throwable $th) {
            Session::flash('failed','Gedung gagal di tambahkan');
            return redirect('/gedung');
        }
    }

    public function edit($id_gedung)
    {
        $data['gedung']= $this->gedung->getGedung($id_gedung);
        return view('gedung.edit', $data);
    }

    public function update(Request $request)
    {
        try {
            $this->gedung->update_gedung($request);
            Session::flash('success','Gedung berhasil di ubah');
            return redirect('/gedung');
        } catch (\Throwable $th) {
            Session::flash('failed','Gedung gagal di ubah');
            return redirect('/gedung');
        }
    }

    public function delete(Request $request)
    {
        try {
            $this->gedung->delete_gedung($request->id_gedung);
            Session::flash('success','Gedung berhasil di hapus');
            return redirect('/gedung');
        } catch (\Throwable $th) {
            Session::flash('failed','Gedung gagal di hapus');
            return redirect('/gedung');
        }
    }

}
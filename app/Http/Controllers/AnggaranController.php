<?php

namespace App\Http\Controllers;

use App\AnggaranModel;
use Illuminate\Http\Request;
use Session;
use DB;

class AnggaranController extends Controller
{
    private $anggaran;

    function __construct()
    {
        $this->anggaran = new AnggaranModel;
    }

    public function index()
    {
        $data['anggaran']=$this->anggaran->getAnggaran();
        return view('anggaran.index',$data);
    }

    public function create()
    {
        $data['anggaran']   = DB::table('tb_sumberanggaran')->get();
        return view ('anggaran.create',$data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kode_anggaran'     => 'required',
            'nama_anggaran'     => 'required',
        ]);

        try {
            $this->anggaran->save_anggaran($request);
            Session::flash('success','Sumber Anggaran berhasil di tambahkan');
            return redirect('/anggaran');
        } catch (\Throwable $th) {
            Session::flash('failed','Sumber Anggaran berhasil di tambahkan');
            return redirect('/anggaran');
        }
    }

    public function edit($id_anggaran)
    {
        $data['anggaran']= $this->anggaran->getAnggaran($id_anggaran);
        return view('anggaran.edit', $data);
    }

    public function update(Request $request)
    {
        try {
            $this->anggaran->update_anggaran($request);
            Session::flash('success','Sumber Anggaran berhasil di update');
            return redirect('/anggaran');
        } catch (\Throwable $th) {
            Session::flash('failed','Sumber Anggaran gagal di update');
            return redirect('/anggaran');
        }
    }

    public function delete(Request $request)
    {
        try {
            $this->anggaran->delete_anggaran($request->id_anggaran);
            Session::flash('success','Sumber Anggaran berhasil di hapus');
            return redirect('/anggaran');
        } catch (\Throwable $th) {
            Session::flash('failed','Sumber Anggaran gagal di hapus');
            return redirect('/anggaran');
        }
    }
}

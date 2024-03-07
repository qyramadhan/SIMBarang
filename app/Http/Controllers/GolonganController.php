<?php

namespace App\Http\Controllers;

use App\GolonganModel;
use Illuminate\Http\Request;
use DB;
use Session;

class GolonganController extends Controller
{
    private $golongan;

    function __construct()
    {
        $this->golongan = new GolonganModel;
    }

    public function index()
    {
        $data['golongan']=$this->golongan->getGolongan();
        return view('golongan.index',$data);
    }

    public function create()
    {
        $data['golongan']   = DB::table('tb_golongan')->get();
        $data['jenis']      = DB::table('tb_jenis')->get();
        return view ('golongan.create',$data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kode_golongan'     => 'required',
            'nama_golongan'     => 'required',
        ]);

        try {
            $this->golongan->save_golongan($request);
            Session::flash('success','Golongan berhasil di tambahkan');
            return redirect('/golongan');
        } catch (\Throwable $th) {
            Session::flash('failed','Golongan berhasil di tambahkan');
            return redirect('/golongan');
        }
    }

    public function edit($id_golongan)
    {
        $data['golongan']= $this->golongan->getGolongan($id_golongan);
        return view('golongan.edit', $data);
    }

    public function update(Request $request)
    {
        try {
            $this->golongan->update_golongan($request);
            Session::flash('success','Golongan berhasil di ubah');
            return redirect('/golongan');
        } catch (\Throwable $th) {
            Session::flash('failed','Golongan gagal di ubah');
            return redirect('/golongan');
        }
    }

    public function delete(Request $request)
    {
        try {
            $this->golongan->delete_golongan($request->id_golongan);
            Session::flash('success','Golongan berhasil di ubah');
            return redirect('/golongan');
        } catch (\Throwable $th) {
            Session::flash('failed','Golongan gagal di ubah');
            return redirect('/golongan');
        }
    }
}
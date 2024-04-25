<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use DB;

class DetailKartuModel extends Model
{
    protected $table = "tb_detailkartu";

    public $timestamps = true;

    public function save_detail($request)
    {
        try {
            $sv                 = new DetailKartuModel();
            $sv->id_kartu       = $request->id_kartu;
            $sv->id_barang      = $request->id_barang;
            $sv->jumlah_barang  = $request->jumlah_barang;
            $sv->kondisi_barang = $request->kondisi_barang;
            $sv->keterangan     = $request->keterangan;
            $sv->soft_delete    = FALSE;
            $sv->log_user1      = Auth::user()->id;
            $sv->log_user2      = Auth::user()->id;
            $sv->last_action    = 1;
            $sv->save();
            return TRUE;
        } catch (\Throwable $th) {
            return FALSE;
        }
    }

    public function getDetail($id = NULL)
    {
        if ($id != NULL) {
            return DB::table('tb_kartubarang')
                ->join("tb_ruangan","tb_ruangan.id_ruang","=","tb_kartubarang.id_ruang")
                ->where('tb_kartubarang.soft_delete', false)
                ->where('tb_ruangan.soft_delete', false)
                ->where('tb_kartubarang.id_kartu',$id)
                ->first();
            
        }
        return DB::table('tb_kartubarang')
                ->join("tb_ruangan","tb_ruangan.id_ruang","=","tb_kartubarang.id_ruang")
                ->where('tb_ruangan.soft_delete', false)
                ->where('tb_kartubarang.soft_delete', false)
                ->get();
    }

    public function getDataBarang($id = NULL)
    {
        if ($id != NULL) {
            return DB::table('tb_barang')
                ->join("tb_kategori","tb_kategori.id_kategori","=","tb_barang.id_kategori")
                ->where('tb_kategori.soft_delete', false)
                ->where('tb_barang.soft_delete', false)
                ->where('tb_barang.id_barang',$id)
                ->first();
            
        }
        return DB::table('tb_barang')
                ->join("tb_kategori","tb_kategori.id_kategori","=","tb_barang.id_kategori")
                ->where('tb_kategori.soft_delete', false)
                ->where('tb_barang.soft_delete', false)
                ->get();
    }

    public function delete_detail($id)
    {
        try {
            DetailKartuModel::where('id_detailkartu', $id)
            ->update([
                "soft_delete"       => TRUE,
                "log_user2"         => Auth::user()->id,
                "last_action"       => 3,
            ]);
            return TRUE;
        } catch (\Throwable $th) {
            return FALSE;
        }
    }

    public function update_detail($request)
    {
        try {
            DetailKartuModel::where('id_detailkartu',$request->id_detailkartu)
            ->update([
                "id_barang"             => $request->nama_barang,
                "jumlah_barang"         => $request->jumlah_barang,
                "kondisi_barang"        => $request->kondisi_barang,
                "keterangan"            => $request->keterangan,
                "log_user2"             => Auth::user()->id,
                "last_action"           => 2,
            ]);
            return TRUE;
        } catch (\Throwable $th) {
            return FALSE;
        }
    }
}
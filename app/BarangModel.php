<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class BarangModel extends Model
{
    protected $table    = "tb_barang";
    public $timestamps  = true;

    public function save_barang($request)
    {
        try {
            $sv                         = new BarangModel();
            $sv->nama_barang            = $request->nama_barang;
            $sv->id_kategori            = $request->id_kategori;
            $sv->tgl_pembelian          = $request->tgl_pembelian;
            $sv->soft_delete            = FALSE;
            $sv->log_user1              = Auth::user()->id;
            $sv->log_user2              = Auth::user()->id;
            $sv->last_action            = 1;
            $sv->save();
            return TRUE;
        } catch (\Throwable $th) {
            return FALSE;
        }
    }

    public function getBarang($id = NULL)
    {
        if ($id != NULL) {
            return BarangModel::join("tb_kategori","tb_kategori.id_kategori","=","tb_barang.id_kategori")
                ->join("tb_jenis","tb_jenis.id_jenis","=","tb_kategori.id_jenis")
                ->join("tb_golongan","tb_golongan.id_golongan","=","tb_jenis.id_golongan")
                ->where('tb_barang.soft_delete',false)
                ->where('tb_kategori.soft_delete',false)
                ->where('tb_jenis.soft_delete',false)
                ->where('tb_golongan.soft_delete',false)
                ->where('tb_barang.id_barang',$id)
                ->first();
        }
        return BarangModel::join("tb_kategori","tb_kategori.id_kategori","=","tb_barang.id_kategori")
                ->join("tb_jenis","tb_jenis.id_jenis","=","tb_kategori.id_jenis")
                ->join("tb_golongan","tb_golongan.id_golongan","=","tb_jenis.id_golongan")
                ->where('tb_barang.soft_delete',false)
                ->where('tb_kategori.soft_delete',false)
                ->where('tb_jenis.soft_delete',false)
                ->where('tb_golongan.soft_delete',false)
                ->get();
    }
    
    public function delete_barang($id)
    {
        try {
            BarangModel::where('id_barang',$id)
            ->update([
                "soft_delete"        => TRUE,
                "log_user2"          => Auth::user()->id,
                "last_action"        => 3,
            ]);
            return TRUE;
        } catch (\Throwable $th) {
            return FALSE;
        }
    }

    public function update_barang($request)
    {
        try {
            BarangModel::where('id_barang',$request->id_barang)
            ->update([
                "nama_barang"            => $request->nama_barang,
                "id_kategori"            => $request->id_kategori,
                "tgl_pembelian"          => $request->tgl_pembelian,
                "log_user2"              => Auth::user()->id,
                "last_action"            => 2,
            ]);
            return TRUE;
        } catch (\Throwable $th) {
            return FALSE;
        }
    }
}

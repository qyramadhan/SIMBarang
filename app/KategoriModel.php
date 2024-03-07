<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use DB;

class KategoriModel extends Model
{
    protected $table    = "tb_kategori";
    public $timestamps  = true;

    public function save_kategori($request)
    {
        try {
            $sv                         = new KategoriModel();
            $sv->kode_kategori          = $request->kode_kategori;
            $sv->nama_kategori          = $request->nama_kategori;
            $sv->id_jenis               = $request->nama_jenis;
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

    public function getKategori($id = NULL)
    {
        if ($id != NULL) {
            return KategoriModel::join("tb_jenis","tb_jenis.id_jenis","=","tb_kategori.id_jenis")
                ->join("tb_golongan","tb_golongan.id_golongan","=","tb_jenis.id_golongan")
                ->where('tb_kategori.soft_delete',false)
                ->where('tb_jenis.soft_delete',false)
                ->where('tb_golongan.soft_delete',false)
                ->where('tb_kategori.id_kategori',$id)
                ->first();
        }
        return KategoriModel::join("tb_jenis","tb_jenis.id_jenis","=","tb_kategori.id_jenis")
                ->join("tb_golongan","tb_golongan.id_golongan","=","tb_jenis.id_golongan")
                ->where('tb_kategori.soft_delete',false)
                ->where('tb_jenis.soft_delete',false)
                ->where('tb_golongan.soft_delete',false)
                ->get();
    }
    
    public function delete_kategori($id)
    {
        try {
            KategoriModel::where('id_kategori',$id)
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

    public function update_kategori($request)
    {
        try {
            KategoriModel::where('id_kategori',$request->id_kategori)
            ->update([
                "kode_kategori"          => $request->kode_kategori,
                "nama_kategori"          => $request->nama_kategori,
                "id_jenis"               => $request->nama_jenis,
                "log_user2"              => Auth::user()->id,
                "last_action"            => 2,
            ]);
            return TRUE;
        } catch (\Throwable $th) {
            return FALSE;
        }
    }
}

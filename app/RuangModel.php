<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class RuangModel extends Model
{
    protected $table = "tb_ruangan";

    public $timestamps = true;

    public function save_ruang($request)
    {
        try {
            $sv                         = new RuangModel();
            $sv->kode_ruang             = $request->kode_ruang;
            $sv->nama_ruang             = $request->nama_ruang;
            $sv->id_lantai              = $request->nama_lantai;
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
    
    public function getRuang($id = NULL)
    {
        if($id != NULL) {
            return RuangModel::join("tb_lantai","tb_lantai.id_lantai","=","tb_ruangan.id_lantai")
            ->join("tb_gedung","tb_gedung.id_gedung","=","tb_lantai.id_gedung")
            ->where('tb_ruangan.soft_delete',false)
            ->where('tb_lantai.soft_delete',false)
            ->where('tb_gedung.soft_delete',false)
            ->where('tb_ruangan.id_ruang',$id)
            ->first();
        }
        return RuangModel::join("tb_lantai","tb_lantai.id_lantai","=","tb_ruangan.id_lantai")
            ->join("tb_gedung","tb_gedung.id_gedung","=","tb_lantai.id_gedung")
            ->where('tb_ruangan.soft_delete',false)
            ->where('tb_lantai.soft_delete',false)
            ->where('tb_gedung.soft_delete',false)
            ->get();
    }

    public function delete_ruang($id)
    {
        try {
            RuangModel::where('id_ruang',$id)
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

    public function update_ruang($request)
    {
        try {
            RuangModel::where('id_ruang',$request->id_ruang)
            ->update([
                "kode_ruang"             => $request->kode_ruang,
                "nama_ruang"             => $request->nama_ruang,
                "id_lantai"              => $request->nama_lantai,
                "log_user2"              => Auth::user()->id,
                "last_action"            => 2,
            ]);
            return TRUE;
        } catch (\Throwable $th) {
            dd($th);
            return FALSE;
        }
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class KartuModel extends Model
{
    protected $table = "tb_kartubarang";

    public $timestamps = true;

    public function save_kartu($request)
    {
        try{
            $sv                         = new KartuModel();
            $sv->id_ruang               = $request->nama_ruang;
            $sv->keterangan             = $request->keterangan;
            $sv->soft_delete            = FALSE;
            $sv->log_user1              = Auth::user()->id;
            $sv->log_user2              = Auth::user()->id;
            $sv->last_action            = 1;
            $sv->save();
            return TRUE;
        } catch (\Throwable $th) {
            dd($th);
            return FALSE;
        }
    }

    public function getKartu($id = NULL)
    {
        if($id != NULL){
           return KartuModel::join("tb_ruangan","tb_ruangan.id_ruang","=","tb_kartubarang.id_ruang")
                ->where('tb_kartubarang.soft_delete',false)
                ->where('tb_ruangan.soft_delete',false)
                ->where('tb_kartubarang.id_kartu',$id)
                ->first();
        }
        return KartuModel::join("tb_ruangan","tb_ruangan.id_ruang","=","tb_kartubarang.id_ruang")
                ->where('tb_kartubarang.soft_delete',false)
                ->where('tb_ruangan.soft_delete',false)
                ->get();
    }

    public function update_kartu($request)
    {
        try {
            KartuModel::where('id_kartu',$request->id_kartu)
            ->update([
                'id_ruang'      => $request->nama_ruang,
                'keterangan'    => $request->keterangan,
                'log_user2'     => Auth::user()->id,
                'last_action'   => 2,
            ]);
            return TRUE;
        }catch (\Throwable $th) {
            return FALSE;
        }
    }

    public function delete_kartu($id)
    {
        try {
            KartuModel::where('id_kartu',$id)
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
}
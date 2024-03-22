<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use DB;

class AnggaranModel extends Model
{
    protected $table = "tb_sumberanggaran";

    public $timestamps = true;

    public function save_anggaran($request)
    {
        try {
            $sv                     = new AnggaranModel();
            $sv->kode_anggaran      = $request->kode_anggaran;
            $sv->nama_anggaran      = $request->nama_anggaran;
            $sv->soft_delete        = FALSE;
            $sv->log_user1          = Auth::user()->id;
            $sv->log_user2          = Auth::user()->id;
            $sv->last_action        = 1;
            $sv->save();
            return TRUE;
        } catch (\Throwable $th) {
            return FALSE;
        }
    }

    public function getAnggaran($id = NULL)
    {
        if($id != NULL){
            return AnggaranModel::where('tb_sumberanggaran.soft_delete',false)
                ->where('tb_sumberanggaran.id_anggaran',$id)
                ->first();
        }
        return AnggaranModel::where('tb_sumberanggaran.soft_delete',false)
            ->get();
    }

    public function delete_anggaran($id)
    {
        try {
            AnggaranModel::where('id_anggaran',$id)
            ->update([
                "soft_delete"   => TRUE,
                "log_user2"     => Auth::user()->id,
                "last_action"   => 3,
            ]);
            return TRUE;
        } catch (\Throwable $th) {
            return FALSE;
        }
    }

    public function update_anggaran($request)
    {
        try {
            AnggaranModel::where('id_anggaran',$request->id_anggaran)
            ->update([
                'kode_anggaran'     => $request->kode_anggaran,
                'nama_anggaran'     => $request->nama_anggaran,
                'log_user2'         => Auth::user()->id,
                'last_action'       => 2,
            ]);
            return TRUE;
        } catch (\Throwable $th) {
            return FALSE;
        }
    }
}

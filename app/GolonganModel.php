<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use DB;

class GolonganModel extends Model
{
    protected $table = "tb_golongan";

    public $timestamps = true;

    public function save_golongan($request)
    {
        try {
            $sv                     = new GolonganModel();
            $sv->kode_golongan      = $request->kode_golongan;
            $sv->nama_golongan      = $request->nama_golongan;
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

    public function getGolongan($id = NULL)
    {
        if($id != NULL){
            return GolonganModel::where('tb_golongan.soft_delete',false)
                ->where('tb_golongan.id_golongan',$id)
                ->first();
        }
        return GolonganModel::where('tb_golongan.soft_delete',false)
            ->get();
    }

    public function delete_golongan($id)
    {
        try {
            GolonganModel::where('id_golongan',$id)
            ->update([
                "soft_delete"   => TRUE,
                "log_user2"     => Auth::user()->id,
                "last_action"   => 3,
            ]);
        } catch (\Throwable $th) {
            return FALSE;
        }
    }

    public function update_golongan($request)
    {
        try {
            GolonganModel::where('id_golongan',$request->id_golongan)
            ->update([
                'kode_golongan'     => $request->kode_golongan,
                'nama_golongan'     => $request->nama_golongan,
                'log_user2'         => Auth::user()->id,
                'last_action'       => 2,
            ]);
            return TRUE;
        } catch (\Throwable $th) {
            return FALSE;
        }
    }
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use DB;

class TahunPembelianModel extends Model
{
    protected $table = "tb_tahunpembelian";

    public $timestamps = true;

    public function save_tahun($request)
    {
        try {
            $sv                 = new TahunPembelianModel();
            $sv->tahun          = $request->tahun;
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

    public function getTahun($id = NULL)
    {
        if ($id != NULL){
            return TahunPembelianModel::where('tb_tahunpembelian.soft_delete', false)
                ->where('tb_tahunpembelian.id_tahun',$id)
                ->first();
        }
        return TahunPembelianModel::where('tb_tahunpembelian.soft_delete', false)
            ->get();
    }

    public function delete_tahun($request)
    {
        try {
            TahunPembelianModel::where('id_tahun',$request->id_tahun)
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

    public function update_tahun($request)
    {
        try {
            TahunPembelianModel::where('id_tahun',$request->id_tahun)
            ->update([
                "tahun"         => $request->tahun,
                "log_user2"     => Auth::user()->id,
                "last_action"   => 2,
            ]);
            return TRUE;
        } catch (\Throwable $th) {
            return FALSE;
        }
    }
}

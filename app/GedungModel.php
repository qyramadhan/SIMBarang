<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use DB;

class GedungModel extends Model
{
    protected $table = "tb_gedung";

    public $timestamps = true;

    public function save_gedung($request)
    {
        try {
            $sv                 = new GedungModel();
            $sv->kode_gedung    = $request->kode_gedung;
            $sv->nama_gedung    = $request->nama_gedung;
            $sv->soft_delete    = FALSE;
            $sv->log_user1      = Auth::user()->id;
            $sv->log_user2      = Auth::user()->id;
            $sv->last_action    = 1;
            $sv->save();
            return TRUE;
        }catch (\Throwable $th) {
            return FALSE;
        }
    }

    public function getGedung($id = NULL)
    {
        if ($id != NULL){
            return GedungModel::where('tb_gedung.soft_delete', false)
                ->where('tb_gedung.id_gedung',$id)
                ->first();
        }
        return GedungModel::where('tb_gedung.soft_delete', false)
            ->get();
    }

    public function delete_gedung($id)
    {
        try {
            GedungModel::where('id_gedung',$id)
            ->update([
                "soft_delete"   => TRUE,
                "log_user2"      => Auth::user()->id,
                "last_action"   => 3,
            ]);
            return TRUE;
        } catch (\Throwable $th) {
            return FALSE;
        }
    }

    public function update_gedung($request)
    {
        try {
            GedungModel::where('id_gedung',$request->id_gedung)
            ->update([
                "kode_gedung"   => $request->kode_gedung,
                "nama_gedung"   => $request->nama_gedung,
                "log_user2"     => Auth::user()->id,
                "last_action"   => 2,
            ]);
            return TRUE;
        } catch (\Throwable $th) {
            return FALSE;
        }
    }

    public function getGedungByKode($kode_gedung)
    {
        return GedungModel::join("tb_lantai","tb_lantai.id_gedung","=","tb_gedung.id_gedung")
            ->where('tb_gedung.soft_delete', false)
            ->where('tb_lantai.soft_delete', false)
            ->where('tb_gedung.kode_gedung',$kode_gedung)
            ->first();
    }

    public function getGedungLantai($id_gedung)
    {
        return GedungModel::join("tb_lantai","tb_lantai.id_gedung","=","tb_gedung.id_gedung")
            ->where('tb_gedung.soft_delete', false)
            ->where('tb_lantai.soft_delete', false)
            ->where('tb_lantai.id_gedung',$id_gedung)
            ->first();
    }

    public function getGedungWhere($request)
    {
        return GedungModel::where('soft_delete', false)
            ->where('id_lantai', $request->lantai)
            ->where('id_gedung', $request->gedung)
            ->orderby('nama','ASC')
            ->get();
    }

    public function getLantaiByName($lantai)
    {
        return DB::table('tb_lantai')
            ->where('nama_lantai', $lantai)
            ->first();
    }

}

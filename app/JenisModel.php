<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;

class JenisModel extends Model
{
    protected $table = "tb_jenis";

    public $timestamps = true;

    public function save_jenis($request)
    {
        try {
            $sv                         = new JenisModel();
            $sv->kode_jenis             = $request->kode_jenis;
            $sv->nama_jenis             = $request->nama_jenis;
            $sv->id_golongan            = $request->nama_golongan;
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

    public function getJenis($id = NULL)
    {
        if ($id != NULL) {
            return JenisModel::join("tb_golongan","tb_golongan.id_golongan","=","tb_jenis.id_golongan")
            ->where('tb_jenis.soft_delete', false)
            ->where('tb_golongan.soft_delete', false)
            ->where('tb_jenis.id_jenis', $id)
            ->first();
        } 
        return JenisModel::join("tb_golongan","tb_golongan.id_golongan","=","tb_jenis.id_golongan")
            ->where('tb_jenis.soft_delete', false)
            ->where('tb_golongan.soft_delete', false)
            ->get();
    }

    public function delete_jenis($id)
    {
        try {
            JenisModel::where('id_jenis',$id)
            ->update ([
                "soft_delete"   => TRUE,
                "log_user2"     => Auth::user()->id,
                "last_action"   => 3,
            ]);
            return TRUE;
        } catch (\Throwable $th) {
            return FALSE;
        }
    }

    public function update_jenis($request)
    {
        try {
            JenisModel::where('id_jenis',$request->id_jenis)
            ->update([
                "kode_jenis"           => $request->kode_jenis,
                "nama_jenis"           => $request->nama_jenis,
                "id_golongan"          => $request->id_golongan,
                "log_user2"            => Auth::user()->id,
                "last_action"          => 2,
            ]);
            return TRUE;
        } catch (\Throwable $th) {
            return FALSE;
        }
    }

    public function getJenisByKode($kode_jenis)
    {
        return JenisModel::join("tb_golongan","tb_golongan.id_golongan","=","tb_jenis.id_golongan")
        ->where('tb_jenis.soft_delete',false)
        ->where('tb_golongan.soft_delete',false)
        ->where('tb_jenis.kode_jenis',$kode_jenis)
        ->first();
    }

    public function getJenisGolongan($id_golongan)
    {
        return JenisModel::join("tb_golongan","tb_golongan.id_golongan","=","tb_jenis.id_golongan")
        ->where('tb_jenis.soft_delete',false)
        ->where('tb_golongan.soft_delete',false)
        ->where('tb_jenis.id_golongan',$id_golongan)
        ->get();
    }

    public function getJenisWhere($requets)
    {
        return JenisModel::where('soft_delete',false)
        ->where('id_jenis',false)
        ->where('id_golongan',false)
        ->orderby('nama_golongan','ASC')
        ->get();
    }

    public function getJenisByName($golongan)
    {
        return DB::table('tb_golongan')
                ->where('nama_golongan', $golongan)
                ->first();
    }
}

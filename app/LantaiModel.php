<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use DB;

class LantaiModel extends Model
{
    protected $table = "tb_lantai";

    public $timestamps = true;

    public function save_lantai($request)
    {
        try {
            $sv                         = new LantaiModel();
            $sv->kode_lantai            = $request->kode_lantai;
            $sv->nama_lantai            = $request->nama_lantai;
            $sv->id_gedung              = $request->id_gedung;
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

    public function getLantai($id = NULL)
    {
        if ($id != NULL) {
            return LantaiModel::join("tb_gedung","tb_gedung.id_gedung","=","tb_lantai.id_gedung")
            ->where('tb_lantai.soft_delete', false)
            ->where('tb_gedung.soft_delete', false)
            ->where('tb_lantai.id_lantai',$id)
            ->first();
        }
        return LantaiModel::join("tb_gedung","tb_gedung.id_gedung","=","tb_lantai.id_gedung")
            ->where('tb_lantai.soft_delete',false)
            ->where('tb_gedung.soft_delete',false)
            ->get();
    }

    public function delete_lantai($id)
    {
        try {
            LantaiModel::where('id_lantai', $id)
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

    public function update_lantai($request)
    {
        try {
            LantaiModel::where('id_lantai',$request->id_lantai)
            ->update([
                "kode_lantai"           => $request->kode_lantai,
                "nama_lantai"           => $request->nama_lantai,
                "id_gedung"             => $request->nama_gedung,
                "log_user2"             => Auth::user()->id,
                "last_action"           => 2,
            ]);
            return TRUE;
        } catch (\Throwable $th) {
            return FALSE;
        }
    }

    public function getLantaiByKode($kode_lantai)
    {
        return LantaiModel::join("tb_gedung","tb_gedung.id_gedung","=","tb_lantai.id_gedung")
        ->where('tb_lantai.soft_delete',false)
        ->where('tb_gedung.soft_delete',false)
        ->where('tb_lantai.kode_lantai',$kode_lantai)
        ->first();
    }

    public function getLantaiGedung($id_gedung)
    {
        return LantaiModel::join("tb_gedung","tb_gedung.id_gedung","=","tb_lantai.id_gedung")

        ->where('tb_lantai.soft_delete',false)
        ->where('tb_gedung.soft_delete',false)
        ->where('tb_lantai.id_gedung', $id_gedung)
        ->get();
    }

    public function getLantaiWhere($requets)
    {
        return LantaiModel::where('soft_delete',false)
        ->where('id_lantai',false)
        ->where('id_gedung',false)
        ->orderby('nama_gedung','ASC')
        ->get();
    }

    public function getLantaiByName($gedung)
    {
        return DB::table('tb_gedung')
                ->where('nama_gedung', $gedung)
                ->first();
    }
}
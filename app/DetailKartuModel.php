<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use DB;

class DetailKartuModel extends Model
{
    protected $table = "tb_detailkartu";

    public $timestamps = true;

    public function save_detail($request)
    {
        try {
            $sv                 = new DetailKartuModel();
            $sv->id_kartu       = $request->id_kartu;
            $sv->id_barang      = $request->id_barang;
            $sv->id_tahun       = $request->id_tahun;
            $sv->id_anggaran    = $request->id_anggaran;
            $sv->no_urut        = $request->no_urut;
            $sv->jumlah_barang  = $request->jumlah_barang;
            $sv->kondisi_barang = $request->kondisi_barang;
            $sv->keterangan     = $request->keterangan;
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

    public function getDetail($id)
    {
            return DB::table('tb_detailkartu')
                // ->select("tb_kartubarang.id_kartu","tb_ruangan.nama_ruang","tb_barang.nama_barang","tb_detailkartu.*",'tb_tahunpembelian.tahun')
                
                
                ->join("tb_kartubarang","tb_kartubarang.id_kartu","=","tb_detailkartu.id_kartu")
                ->join("tb_ruangan","tb_ruangan.id_ruang","=","tb_kartubarang.id_ruang")
                ->join("tb_lantai","tb_lantai.id_lantai","=","tb_ruangan.id_lantai")
                ->join("tb_gedung","tb_gedung.id_gedung","=","tb_lantai.id_gedung")

                ->join("tb_barang","tb_barang.id_barang","=","tb_detailkartu.id_barang")
                ->join("tb_jenis","tb_jenis.id_jenis","=","tb_barang.id_jenis")
                ->join("tb_golongan","tb_golongan.id_golongan","=","tb_jenis.id_golongan")

                ->join("tb_tahunpembelian","tb_tahunpembelian.id_tahun","=","tb_detailkartu.id_tahun")
                ->join("tb_sumberanggaran","tb_sumberanggaran.id_anggaran","=","tb_detailkartu.id_anggaran")



                
                ->where('tb_tahunpembelian.soft_delete', false)
                ->where('tb_kartubarang.soft_delete', false)
                ->where('tb_detailkartu.soft_delete', false)          
                ->where('tb_ruangan.soft_delete', false)
                ->where('tb_lantai.soft_delete', false)
                ->where('tb_gedung.soft_delete', false)
                ->where('tb_barang.soft_delete', false)
                ->where('tb_jenis.soft_delete', false)
                ->where('tb_golongan.soft_delete', false)
                ->where('tb_sumberanggaran.soft_delete', false)
                ->where('tb_detailkartu.id_kartu',$id)
                ->get();
            
    }


    public function getDetailByID($id_detailkartu)
    {
            return DB::table('tb_detailkartu')
                ->select("tb_kartubarang.id_kartu","tb_ruangan.nama_ruang","tb_barang.nama_barang","tb_detailkartu.*")
                ->join("tb_kartubarang","tb_kartubarang.id_kartu","=","tb_detailkartu.id_kartu")
                ->join("tb_ruangan","tb_ruangan.id_ruang","=","tb_kartubarang.id_ruang")
                ->join("tb_barang","tb_barang.id_barang","=","tb_detailkartu.id_barang")
                ->join("tb_tahunpembelian","tb_tahunpembelian.id_tahun","=","tb_detailkartu.id_tahun")
                ->where('tb_tahunpembelian.soft_delete', false)
                ->where('tb_kartubarang.soft_delete', false)
                ->where('tb_detailkartu.soft_delete', false)          
                ->where('tb_ruangan.soft_delete', false)
                ->where('tb_detailkartu.id_detailkartu',$id_detailkartu)
                ->first();
    }

    public function getTahun($id = NULL)
    {
        if ($id != NULL) {
        return DB::table('tb_detailkartu')
            ->join("tb_tahunpembelian","tb_tahunpembelian.id_tahun","=","tb_detailkartu.id_tahun")
            ->where('tb_tahunpembelian.soft_delete', false)
            ->where('tb_detailkartu.soft_delete', false)
            ->where('tb_detailkartu.id_tahun',$id)
            ->first();
            
        }
        return DB::table('tb_detailkartu')
            ->join("tb_tahunpembelian","tb_tahunpembelian.id_tahun","=","tb_detailkartu.id_tahun")
            ->where('tb_tahunpembelian.soft_delete', false)
            ->where('tb_detailkartu.soft_delete', false)
            ->get();
    }

    public function getAnggaran($id = NULL)
    {
        if ($id != NULL){
            return DB::table('tb_detailkartu')
            ->join("tb_sumberanggaran","tb_sumberanggaran.id_anggaran","=","tb_detailkartu.id_anggaran")
            ->where('tb_sumberanggaran.soft_delete', false)
            ->where('tb_detailkartu.soft_delete', false)
            ->where('tb_detailkartu.id_anggaran',$id)
            ->first();
            
        }
        return DB::table('tb_detailkartu')
            ->join("tb_sumberanggaran","tb_sumberanggaran.id_anggaran","=","tb_detailkartu.id_anggaran")
            ->where('tb_sumberanggaran.soft_delete', false)
            ->where('tb_detailkartu.soft_delete', false)
            ->get();
    }

    public function getDataBarang($id = NULL)
    {
        if ($id != NULL) {
            return DB::table('tb_barang')
                ->join("tb_jenis","tb_jenis.id_jenis","=","tb_barang.id_jenis")
                ->where('tb_jenis.soft_delete', false)
                ->where('tb_barang.soft_delete', false)
                ->where('tb_barang.id_barang',$id)
                ->first();
            
        }
        return DB::table('tb_barang')
                ->join("tb_jenis","tb_jenis.id_jenis","=","tb_barang.id_jenis")
                ->where('tb_jenis.soft_delete', false)
                ->where('tb_barang.soft_delete', false)
                ->get();
    }

    public function delete_detail($id)
    {
        try {
            DetailKartuModel::where('id_detailkartu',$id)
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

    public function update_detail($request)
    {
        try {
            DetailKartuModel::where('id_detailkartu',$request->id_detailkartu)
            ->update([
                'id_barang'             => $request->id_barang,
                'id_tahun'              => $request->id_tahun,
                'no_urut'               => $request->no_urut,
                "jumlah_barang"         => $request->jumlah_barang,
                "kondisi_barang"        => $request->kondisi_barang,
                "keterangan"            => $request->keterangan,
                "log_user2"             => Auth::user()->id,
                "last_action"           => 2,
            ]);
            return TRUE;
        } catch (\Throwable $th) {
            return FALSE;
        }
    }
}
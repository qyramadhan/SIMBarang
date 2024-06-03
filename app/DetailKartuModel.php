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
        $urut   =   $request->no_urut;
        try {
            if($urut == 0){
                $sv                 = new DetailKartuModel();
                $sv->id_kartu       = $request->id_kartu;
                $sv->id_barang      = $request->id_barang;
                $sv->id_tahun       = $request->id_tahun;
                $sv->id_anggaran    = $request->id_anggaran;
                $sv->no_urut        = $request->tunggal;
                $sv->kondisi_barang = $request->kondisi_barang;
                $sv->keterangan     = $request->keterangan;
                $sv->soft_delete    = FALSE;
                $sv->log_user1      = Auth::user()->id;
                $sv->log_user2      = Auth::user()->id;
                $sv->last_action    = 1;
                $sv->save();

            }else{
                $dari = (int) $request->dari;
                $sampai = (int) $request->sampai;
                
                
                for ($i = $dari; $i <= $sampai; $i++){
                    $txt = $i;
                    $no  = (int) $txt;
                    $number = NULL;

                        if($no <= 9){
                            $number = "00".$no;
                        }elseif($no >= 10 && $no <= 99 ){
                            $number = "0".substr($no,0,1).''.substr($no,1,1);
                        }elseif($no >= 100 && $no <= 999 ){
                            $number = substr($no,0,1).''.substr($no,1,1).''.substr($no,2,1);
                        }elseif($no >= 1000){
                            $number = substr($no,0,1).''.substr($no,1,1).''.substr($no,2,1).''.substr($no,3,1);
                        }

                    $sv                 = new DetailKartuModel();
                    $sv->id_kartu       = $request->id_kartu;
                    $sv->id_barang      = $request->id_barang;
                    $sv->id_tahun       = $request->id_tahun;
                    $sv->id_anggaran    = $request->id_anggaran;
                    $sv->no_urut        = $number;
                    $sv->kondisi_barang = $request->kondisi_barang;
                    $sv->keterangan     = $request->keterangan;
                    $sv->soft_delete    = FALSE;
                    $sv->log_user1      = Auth::user()->id;
                    $sv->log_user2      = Auth::user()->id;
                    $sv->last_action    = 1;
                    $sv->save();
	    	    }
	        }

            return TRUE;
        } catch (\Throwable $th) {
            dd($th);
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
            ->where('tb_detailkartu.id_kartu', $id)

            ->get();    
    }
        public function getCetak($id)
        {
            return DB::table('tb_detailkartu') 
            ->selectRaw('tb_detailkartu.*, tb_tahunpembelian.tahun, tb_ruangan.nama_ruang, tb_barang.nama_barang, tb_barang.kode_barang, tb_golongan.kode_golongan, tb_jenis.kode_jenis, tb_ruangan.kode_ruang, tb_jenis.kode_jenis, tb_lantai.kode_lantai, tb_sumberanggaran.kode_anggaran,
            tb_golongan.nama_golongan, tb_jenis.nama_jenis, tb_ruangan.nama_ruang, tb_lantai.nama_lantai, tb_sumberanggaran.nama_anggaran')

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
            ->where('tb_detailkartu.id_kartu', $id)

            ->groupBy('tb_barang.id_barang','tb_sumberanggaran.id_anggaran','tb_tahunpembelian.id_tahun','tb_detailkartu.kondisi_barang')

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

    public function getInfoDetail($id_kartu){
        return DB::table('tb_kartubarang')
        ->join("tb_ruangan","tb_ruangan.id_ruang","=","tb_kartubarang.id_ruang")
        ->join("tb_lantai","tb_lantai.id_lantai","=","tb_ruangan.id_lantai")
        
        ->where('tb_kartubarang.soft_delete', false)
        ->where('tb_ruangan.soft_delete', false)
        ->where('tb_lantai.soft_delete', false)
        ->where('tb_kartubarang.id_kartu',$id_kartu)
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
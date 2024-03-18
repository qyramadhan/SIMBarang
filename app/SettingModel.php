<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class SettingModel extends Model
{
    protected $table = "tb_setting";

    public $timestamps = true;

    public function save_setting($request)
    {
        try {
            $sv                 = new SettingModel();
            $sv->nama_orang     = $request->nama_orang;
            $sv->posisi         = $request->posisi;
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

    public function getSetting($id = NULL)
    {
        if ($id != NULL){
            return SettingModel::where('tb_setting.soft_delete', false)
                ->where('tb_setting.id_setting',$id)
                ->first();
        }
        return SettingModel::where('tb_setting.soft_delete', false)
            ->get();
    }

    public function delete_setting($id)
    {
        try {
            SettingModel::where('id_setting',$id)
            ->update([
                "soft_delete"   => TRUE,
                "log_user1"      => Auth::user()->id,
                "last_action"   => 3,
            ]);
            return TRUE;
        } catch (\Throwable $th) {
            return FALSE;
        }
    }

    public function update_setting($request)
    {
        try {
            SettingModel::where('id_setting',$request->id_setting)
            ->update([
                "nama_orang"    => $request->nama_orang,
                "posisi"        => $request->posisi,
                "id_atasan"     => $request->id_atasan,
                "log_user2"     => Auth::user()->id,
                "last_action"   => 2,
            ]);
            return TRUE;
        } catch (\Throwable $th) {
            return FALSE;
        }
    }
}

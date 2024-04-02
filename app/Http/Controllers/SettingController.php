<?php

namespace App\Http\Controllers;

use App\SettingModel;
use Illuminate\Http\Request;
use Session;
use DB;

class SettingController extends Controller
{
    private $setting;

    function __construct()
    {
        $this->setting = new SettingModel;
    }

    public function index()
    {
        $data['setting']= $this->setting->getSetting();
        return view('setting.index',$data);
    }

    public function create()
    {
        $data['setting']    = DB::table('tb_setting')->get();
        return view('setting.create',$data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_orang'    => 'required',
            'posisi'        => 'required',

        ]);

        try {
            $this->setting->save_setting($request);
            Session::flash('success','Setting berhasil di tambahkan');
            return redirect('/setting');
        } catch (\Throwable $th) {
            Session::flash('failed','Setting gagal di tambahkan');
            return redirect('/setting');
        }
    }

    public function edit($id_setting)
    {
        $data['setting']= $this->setting->getSetting($id_setting);
        $data['set']= $this->setting->getSetting();
        return view('setting.edit', $data);
    }

    public function update(Request $request)
    {
        try {
            $this->setting->update_setting($request);
            Session::flash('success','Setting berhasil di update');
            return redirect('/setting');
        } catch (\Throwable $th) {
            dd($th);
            Session::flash('failed','Setting gagal di update');
            return redirect('/setting');
        }
    }

    public function delete(Request $request)
    {
        try {
            $this->setting->delete_setting($request->id_setting);
            Session::flash('success','Setting berhasil di hapus');
            return redirect('/setting');
        } catch (\Throwable $th) {
            Session::flash('error','Setting gagal di hapus');
            return redirect('/setting');
        }
    }
}

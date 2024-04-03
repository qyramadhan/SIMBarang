<?php

namespace App\Http\Controllers;

use App\BarangModel;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $count1 = DB::table('tb_barang')->count();
        $count2 = DB::table('tb_ruangan')->count();
        $count3 = DB::table('tb_lantai')->count();
        $count4 = DB::table('users')->count();
        return view('home', compact('count1','count2','count3','count4'));
    }
}

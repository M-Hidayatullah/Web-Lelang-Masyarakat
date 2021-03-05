<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
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

   
    public function index()
    {
        if(Auth::user()->level == 'masyarakat'){
        
        $lelang = DB::table('lelang')->where('status','dibuka')
                ->join('barang',function($join){
                    $join->on('lelang.barang_id','=','barang.id_barang');
                })->get();

        return view('home2',compact('lelang'));
    }
    else{

        $jumlah_petugas=DB::table('tb_petugas')->count();
        $jumlah_barang=DB::table('barang')->count();
        $jumlah_lelang=DB::table('lelang')->count();
        $jumlah_penawar=DB::table('history_lelang')->count();

        $data = DB::table('history_lelang')
                ->join('users',function($join){
                    $join->on('history_lelang.user_id','=','users.id');
                })
                ->join('tb_masyarakat',function($join){
                    $join->on('users.id','=','tb_masyarakat.id_masyarakat');
                })
                ->join('lelang',function($join){
                    $join->on('history_lelang.lelang_id','=','lelang.id_lelang');
                })
                ->join('barang',function($join){
                    $join->on('lelang.barang_id','=','barang.id_barang');
                })->get();


        return view('home',compact('jumlah_petugas','jumlah_barang','jumlah_lelang','jumlah_penawar','data'));
    }
    }
}

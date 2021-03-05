<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Auth;
use Validator;
use File;

class PenawaranController extends Controller
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

        return view('penawaran/index',compact('data'));
    }


    public function status($id)
    {
              
        DB::table('history_lelang')->where('id_history',$id)->update([
            'status_lelang' =>'dipilih'
        ]);

        $cek = DB::table('history_lelang')->where('id_history',$id)->first();
        
        $id_lelang = $cek->lelang_id;

        DB::table('history_lelang')->where('lelang_id',$id_lelang)->where('status_lelang','tunda')->update([
            'status_lelang' =>'tidak_dipilih'
        ]);

        $ceklagi=DB::table('history_lelang')->where('id_history',$id)->first();

        DB::table('lelang')->where('id_lelang',$id_lelang)->update([
            'harga_akhir'=>$ceklagi->penawaran_harga,
            'lelang_masyarakat_id'=>$ceklagi->user_id,
            'status'=>'ditutup'
        ]);

        return redirect()->back()->with('masuk','Data Berhasil Di Rubah');

        
    }

}

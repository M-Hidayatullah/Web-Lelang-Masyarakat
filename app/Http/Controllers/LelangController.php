<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Auth;
use Validator;
use File;

class LelangController extends Controller
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
        
        $lelang = DB::table('lelang')
                ->join('barang',function($join){
                    $join->on('lelang.barang_id','=','barang.id_barang');
                })->get();

        $barang = DB::table('barang')->get();

        $users=DB::table('users')->get();

        return view('lelang/index',compact('lelang','barang','users'));
    }

    public function store(Request $request)
    {
        $cek = DB::table('lelang')->where('barang_id',$request->barang_id)->where('status','dibuka')
                ->join('barang',function($join){
                    $join->on('lelang.barang_id','=','barang.id_barang');
                })->get();
        $cek2=count($cek);
        
        if($cek2 == 1){
        return redirect()->back()->with('gagal','Data tersebut sudah di lelang');

        }else{

        DB::table('lelang')->insert([
            'barang_id'=>$request->barang_id,
            'tgl_lelang'=>$request->tgl_lelang,
            'lelang_petugas_id'=>Auth::user()->id,
        ]);

        return redirect()->back()->with('masuk','Data Berhasil Di Input');
    }
    }

    public function edit($id)
    {

        $lelang = DB::table('lelang')->where('id_lelang',$id)
                ->join('barang',function($join){
                    $join->on('lelang.barang_id','=','barang.id_barang');
                })->first();
        
        $barang = DB::table('barang')->get();

        return view('lelang/edit',compact('barang','lelang'));
    }

    public function show($id)
    {
        $lelang = DB::table('lelang')->where('id_lelang',$id)
            ->join('barang',function($join){
                $join->on('lelang.barang_id','=','barang.id_barang');
            })->first();
        
        $users=DB::table('users')->get();

        $data = DB::table('history_lelang')->where('lelang_id',$id) 
                ->join('users',function($join){
                    $join->on('history_lelang.user_id','=','users.id');
                })
                ->join('tb_masyarakat',function($join){
                    $join->on('users.id','=','tb_masyarakat.id_masyarakat');
                })->get();
        
        return view('lelang/show',compact('lelang','users','data'));
    }

    public function update(Request $request)
    {
        DB::table('lelang')->where('id_lelang',$request->id_lelang)->update([
            'barang_id'=>$request->barang_id,
            'tgl_lelang'=>$request->tgl_lelang,
            'status'=>$request->status,
        ]);

        return redirect('lelang')->with('update','Data Berhasil Di Update');
    }

}

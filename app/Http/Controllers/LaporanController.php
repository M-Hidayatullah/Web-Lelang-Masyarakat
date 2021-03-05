<?php

namespace App\Http\Controllers;

use DB;
use Alert;
use App\Exports\LaporanLelang;
use App\Exports\LaporanHistory;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class LaporanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function lap_lelang(Request $request)
    {
        $lelang = DB::table("lelang")->whereBetween('tgl_lelang',[$request->awal,$request->akhir])
            ->join('barang', function ($join) {
                $join->on('lelang.barang_id', '=', 'barang.id_barang');
            })
            ->join('tb_masyarakat', function ($join) {
                $join->on('lelang.lelang_masyarakat_id', '=', 'tb_masyarakat.id_masyarakat');
            })
            ->join('tb_petugas', function ($join) {
                $join->on('lelang.lelang_petugas_id', '=', 'tb_petugas.id_petugas');
            })->get();

            $hitung=count($lelang);
            $req1=$request->awal;
            $req2=$request->akhir;
        
        $users =DB::table('users')->get();

        return view('laporan.lelang', compact('lelang','req1','req2','hitung','users'));
    }

    public function lap_history(Request $request)
    {
        
        $history_lelang = DB::table("history_lelang")->where('status_lelang',$request->status_lelang)
                        ->join('lelang', function ($join) {
                            $join->on('history_lelang.lelang_id', '=', 'lelang.id_lelang');
                        })
                        ->join('barang', function ($join) {
                            $join->on('lelang.barang_id', '=', 'barang.id_barang');
                        })
                        ->join('users', function ($join) {
                            $join->on('history_lelang.user_id', '=', 'users.id');
                        })
                        ->join('tb_masyarakat', function ($join) {
                            $join->on('history_lelang.user_id', '=', 'tb_masyarakat.id_masyarakat');
                        })->get();

        $hitung=count($history_lelang);
        $req1=$request->status_lelang;

        return view('laporan.history_lelang', compact('history_lelang','hitung','req1'));
    }



    
    public function export_lelang(Request $request)
    {
        $data = DB::table("lelang")->whereBetween('tgl_lelang',[$request->awal,$request->akhir])
            ->join('barang', function ($join) {
                $join->on('lelang.barang_id', '=', 'barang.id_barang');
            }) 
            ->join('tb_masyarakat', function ($join) {
                $join->on('lelang.lelang_masyarakat_id', '=', 'tb_masyarakat.id_masyarakat');
            })
            ->join('tb_petugas', function ($join) {
                $join->on('lelang.lelang_petugas_id', '=', 'tb_petugas.id_petugas');
            })->get();
          

        return Excel::download(new LaporanLelang($data), 'laporan_lelang.xlsx');
    }

    public function export_history(Request $request)
    {
        $data = DB::table("history_lelang")->where('status_lelang',$request->status_lelang)
                ->join('lelang', function ($join) {
                    $join->on('history_lelang.lelang_id', '=', 'lelang.id_lelang');
                })
                ->join('barang', function ($join) {
                    $join->on('lelang.barang_id', '=', 'barang.id_barang');
                })
                ->join('users', function ($join) {
                    $join->on('history_lelang.user_id', '=', 'users.id');
                })
                ->join('tb_masyarakat', function ($join) {
                    $join->on('history_lelang.user_id', '=', 'tb_masyarakat.id_masyarakat');
                })->get();
        return Excel::download(new LaporanHistory($data), 'laporan_history.xlsx');
    }

  
}

<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

use Validator;
use File;

class BarangController extends Controller
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
        
        $barang = DB::table('barang')->get();
        return view('barang/index',compact('barang'));
    }

    public function store(Request $request)
    {
        $cekgambar_barang = Validator::make($request->all(), [
            'gambar_barang' => 'required|file|image|mimes:jpeg,png,jpg|max:10000',
        ]);
        
        if ($cekgambar_barang->fails()) {
            return redirect()->back()->with('gagal', 'Gagal Upload, File harus berbentuk jpg/png/jpeg ');
        }

        $gambar_barang = $request->file('gambar_barang');
        $size = $gambar_barang->getSize();
        $nama_gambar_barang = time() . "_" . $gambar_barang->getClientOriginalName();
        $tujuan_upload_gambar_barang = 'data_file';
        $gambar_barang->move($tujuan_upload_gambar_barang, $nama_gambar_barang);

        DB::table('barang')->insert([
            'nama_barang'=>$request->nama_barang,
            'tgl'=>$request->tgl,
            'harga_awal'=>$request->harga_awal,
            'gambar_barang'=>$nama_gambar_barang,
            'deskripsi_barang'=>$request->deskripsi_barang
        ]);

        return redirect()->back()->with('masuk','Data Berhasil Di Input');
    }

    public function edit($id)
    {
        $barang = DB::table('barang')->where('id_barang',$id)->first();
        return view('barang/edit',compact('barang'));
    }

    public function show($id)
    {
        $barang = DB::table('barang')->where('id_barang',$id)->first();
        return view('barang/show',compact('barang'));
    }

    public function update(Request $request)
    {
        if($request->gambar_barang == null){
            DB::table('barang')->where('id_barang',$request->id_barang)->update([
                'nama_barang'=>$request->nama_barang,
                'tgl'=>$request->tgl,
                'harga_awal'=>$request->harga_awal,
                'deskripsi_barang'=>$request->deskripsi_barang
            ]);
        }
        else
        {
            
            $cekgambar_barang = Validator::make($request->all(), [
                'gambar_barang' => 'required|file|image|mimes:jpeg,png,jpg|max:10000',
            ]);
            
            if ($cekgambar_barang->fails()) {
                return redirect()->back()->with('gagal', 'Gagal Upload, File harus berbentuk jpg/png/jpeg ');
            }
    
            $gambar_barang = $request->file('gambar_barang');
            $size = $gambar_barang->getSize();
            $nama_gambar_barang = time() . "_" . $gambar_barang->getClientOriginalName();
            $tujuan_upload_gambar_barang = 'data_file';
            $gambar_barang->move($tujuan_upload_gambar_barang, $nama_gambar_barang);
        
        DB::table('barang')->where('id_barang',$request->id_barang)->update([
            'nama_barang'=>$request->nama_barang,
            'tgl'=>$request->tgl,
            'harga_awal'=>$request->harga_awal,
            'gambar_barang'=>$nama_gambar_barang,
            'deskripsi_barang'=>$request->deskripsi_barang
        ]);
    }

        return redirect('barang')->with('update','Data Berhasil Di Update');
    }

    
}

<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class UserController extends Controller
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
        
        $user = DB::table('users')->where('level','administrator')->get();
        return view('user/index',compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([

            'name'=> 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required',
            
        ]);

            DB::table('users')->insert([
                'name'=> $request->name,
                'email' => $request->email,
                'password'=>bcrypt($request->password),
                'level' => 'administrator',
            ]);
        
        return redirect()->back()->with('masuk','Data Berhasil Di Input');
    }

    public function edit($id)
    {
        $admin = DB::table('users')->where('id',$id)->first();
        return view('user/edit',compact('admin'));
    }

    public function update(Request $request)
    {
        
        DB::table('users')->where('id',$request->id)->update([
            'name' => $request->name,
        ]);

        return redirect('admin')->with('update','Data Berhasil Di Update');
    }

    #petugas

    public function index2()
    {
        
        $user = DB::table('users')->where('level','petugas')->get();
        return view('petugas/index',compact('user'));
    }

    public function store2(Request $request)
    {
        $request->validate([

            'name'=> 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required',
            
        ]);

            DB::table('users')->insert([
                'name'=> $request->name,
                'email' => $request->email,
                'password'=>bcrypt($request->password),
                'level' => 'petugas',
            ]);
            
            $cek = DB::table('users')->where('id', \DB::raw("(select max(`id`) from users)"))->first();

            DB::table('tb_petugas')->insert([
                'id_petugas'=>$cek->id,
                'nama_petugas'=>$cek->name,
            ]);
        
        return redirect()->back()->with('masuk','Data Berhasil Di Input');
    }

    public function edit2($id)
    {
        $petugas = DB::table('users')->where('id',$id)->first();
        return view('petugas/edit',compact('petugas'));
    }

    public function update2(Request $request)
    {
        
        DB::table('users')->where('id',$request->id)->update([
            'name' => $request->name,
        ]);
        
        DB::table('tb_petugas')->where('id_petugas',$request->id)->update([
            'nama_petugas'=>$request->name,
        ]);

        return redirect('petugas')->with('update','Data Berhasil Di Update');
    }

    #masyarakat

    public function index3()
    {
        
        $user = DB::table('users')->where('level','masyarakat')
                ->join('tb_masyarakat',function($join){
                    $join->on('tb_masyarakat.id_masyarakat','=','users.id');
                })->get();
        return view('masyarakat/index',compact('user'));
    }

    public function store3(Request $request)
    {
        $request->validate([

            'name'=> 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required',
            
        ]);

            DB::table('users')->insert([
                'name'=> $request->name,
                'email' => $request->email,
                'password'=>bcrypt($request->password),
                'level' => 'masyarakat',
            ]);

            $cek = DB::table('users')->where('id', \DB::raw("(select max(`id`) from users)"))->first();

            DB::table('tb_masyarakat')->insert([
                'id_masyarakat'=>$cek->id,
                'nama_lengkap'=>$cek->name,
                'telp'=>$request->telp,
            ]);
        
        return redirect()->back()->with('masuk','Data Berhasil Di Input');
    }

    public function edit3($id)
    {
        $masyarakat = DB::table('users')->where('id',$id)
                    ->join('tb_masyarakat',function($join){
                        $join->on('tb_masyarakat.id_masyarakat','=','users.id');
                    })->first();

        return view('masyarakat/edit',compact('masyarakat'));
    }

    public function update3(Request $request)
    {
        
        DB::table('users')->where('id',$request->id)->update([
            'name' => $request->name,
        ]);

        DB::table('tb_masyarakat')->where('id_masyarakat',$request->id)->update([
            'nama_lengkap'=>$request->name,
            'telp'=>$request->telp
        ]);

        return redirect('masyarakat')->with('update','Data Berhasil Di Update');
    }

    
}

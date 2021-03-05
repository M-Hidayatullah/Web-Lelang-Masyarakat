<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    
public function register()
{
    
    return view('register');
}

public function store4(Request $request)
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
    
    return redirect('login')->with('masuk','Registrasi Berhasil');
}
    
}

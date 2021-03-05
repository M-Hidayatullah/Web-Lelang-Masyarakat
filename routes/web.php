<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/admin','UserController@index');
Route::post('/admin/store','UserController@store');
Route::post('/admin/update','UserController@update');
Route::get('/admin/edit/{id}','UserController@edit');

Route::get('/petugas','UserController@index2');
Route::post('/petugas/store','UserController@store2');
Route::post('/petugas/update','UserController@update2');
Route::get('/petugas/edit/{id}','UserController@edit2');

Route::get('/masyarakat','UserController@index3');
Route::post('/masyarakat/store','UserController@store3');
Route::post('/masyarakat/update','UserController@update3');
Route::get('/masyarakat/edit/{id}','UserController@edit3');

Route::get('/barang','BarangController@index');
Route::post('/barang/store','BarangController@store');
Route::post('/barang/update','BarangController@update');
Route::get('/barang/edit/{id}','BarangController@edit');
Route::get('/barang/show/{id}','BarangController@show');

Route::get('/lelang','LelangController@index');
Route::post('/lelang/store','LelangController@store');
Route::post('/lelang/update','LelangController@update');
Route::get('/lelang/edit/{id}','LelangController@edit');
Route::get('/lelang/show/{id}','LelangController@show');

Route::get('/register','RegisterController@register');
Route::post('/register/store','RegisterController@store4');

Route::get('/menawar/show/{id}','MenawarController@show');
Route::post('/menawar/store','MenawarController@store');
Route::get('/menawar/data','MenawarController@data');

Route::get('/penawaran','PenawaranController@index');
Route::get('/penawaran/status/{id}','PenawaranController@status');

Route::post('/lap_lelang_input','LaporanController@lap_lelang');
Route::get('/lap_lelang','LaporanController@lap_lelang');


Route::post('/lap_history_input','LaporanController@lap_history');
Route::get('/lap_history','LaporanController@lap_history');


Route::get('/lap_lelang/export_excel', 'LaporanController@export_lelang');
Route::get('/lap_history/export_excel', 'LaporanController@export_history');





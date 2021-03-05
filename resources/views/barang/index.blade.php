@extends('layouts.template')
@section('content')
<title>Data Barang | Lelang</title>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Barang</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            @if( Session::get('masuk') !="")
            <div class='alert alert-success'><center><b>{{Session::get('masuk')}}</b></center></div>        
            @endif
            @if( Session::get('update') !="")
            <div class='alert alert-success'><center><b>{{Session::get('update')}}</b></center></div>        
            @endif
            @if( Session::get('gagal') !="")
            <div class='alert alert-danger'><center><b>{{Session::get('gagal')}}</b></center></div>        
            @endif
            <button class="btn btn-success" data-toggle="modal" data-target="#tambah">Tambah Data</button>
            <br>
            <br>
            <table id="dataTable" class="table table-bordered" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Harga Awal</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barang as $i => $u)
                    <tr>
                        <td>{{++$i}}</td>
                        <td>{{$u->nama_barang}}</td>
                        <td>{{$u->tgl}}</td>
                        <td>{{$u->harga_awal}}</td>
                        <td><img src="{{url('data_file/'.$u->gambar_barang)}}" style="width:100px;height:100px"></td>
                        <td><a href="/barang/edit/{{ $u->id_barang}}" class="btn btn-warning btn-sm ml-2">Edit</a>
                        <a href="/barang/show/{{ $u->id_barang}}" class="btn btn-primary btn-sm ml-2">Show</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="tambah" class="modal fade" tabindex="-1" role="dialog">
<div class="modal-dialog" role="document">
    <!-- Modal content-->
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Masukan Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
    <form action="/barang/store" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="">Nama</label>
            <input type="text" name="nama_barang" class="form-control"  required>
        </div>
        <div class="form-group">
            <label for="">Tanggal</label>
            <input type="date" name="tgl" class="form-control"  required>
        </div>
        <div class="form-group">
            <label for="">Harga Awal</label>
            <input type="number" name="harga_awal" class="form-control"  required>
        </div>
        <div class="form-group">
            <label for="">Gambar</label>
            <input type="file" name="gambar_barang" class="form-control"  required>
        </div>
        <div class="form-group">
            <label for="">Deskripsi</label>
            <input type="text" name="deskripsi_barang" class="form-control"  required>
        </div>  
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    </div>
    </div>
</div>
</div>
@endsection
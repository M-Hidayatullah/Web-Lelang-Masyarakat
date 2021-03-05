@extends('layouts.template')
@section('content')
<title>Data Barang | Lelang</title>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
    </div>
    <div class="card-body">
        <form action="/barang/update" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Nama</label>
                <input type="hidden" value="{{$barang->id_barang}}" name="id_barang">
                <input type="text" name="nama_barang" value="{{$barang->nama_barang}}" class="form-control"  required>
            </div>
            <div class="form-group">
                <label for="">Tanggal</label>
                <input type="date" name="tgl" class="form-control"  value="{{$barang->tgl}}"  required>
            </div>
            <div class="form-group">
                <label for="">Harga Awal</label>
                <input type="number" name="harga_awal" class="form-control"  value="{{$barang->harga_awal}}"  required>
            </div>
            <div class="form-group">
                <label for="">Gambar</label>
                <br>
                <img src="{{url('data_file/'.$barang->gambar_barang)}}" style="width:200px;height:200px">
                <br>
                <br>

                <input type="file" name="gambar_barang" class="form-control" >
            </div>
            <div class="form-group">
                <label for="">Deskripsi</label>
                <input type="text" name="deskripsi_barang" class="form-control"  value="{{$barang->deskripsi_barang}}" required>
            </div>  
            <input type="submit" value="Update" class="btn btn-warning">
        </form>
    </div>
</div>


@endsection
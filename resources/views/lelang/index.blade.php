@extends('layouts.template')
@section('content')
<title>Data Lelang | Lelang</title>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Lelang</h6>
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
                        <th>Harga Awal</th>
                        <th>Harga Akhir</th>
                        <th>Pemenang</th>
                        <th>Gambar Barang</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lelang as $i => $u)
                    <tr>
                        <td>{{++$i}}</td>
                        <td>{{$u->nama_barang}}</td>
                        <td>{{$u->harga_awal}}</td>
                        <td>{{$u->harga_akhir}}</td>
                        <td>{{$users->where('id', $u->lelang_masyarakat_id)->first()->name ?? 'Belum Ada' }}</td>
                        <td><img src="{{url('data_file/'.$u->gambar_barang)}}" style="width:100px;height:100px"></td>
                        <td>{{$u->status}}</td>
                        <td><a href="/lelang/edit/{{ $u->id_lelang}}" class="btn btn-warning btn-sm ml-2">Edit</a>
                        <a href="/lelang/show/{{ $u->id_lelang}}" class="btn btn-primary btn-sm ml-2">Show</a>
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
    <form action="/lelang/store" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="">Barang</label>
            <select name="barang_id" class="select2 form-control" style="width:100%" required>
                <option value="" disabled selected>Pilih Barang</option>
                @foreach($barang as $b)
                <option value="{{$b->id_barang}}">{{$b->nama_barang}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Tanggal Lelang</label>
            <input type="date" name="tgl_lelang" class="form-control"  required>
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
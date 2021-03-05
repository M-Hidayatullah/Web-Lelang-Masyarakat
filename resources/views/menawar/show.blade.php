@extends('layouts.template')
@section('content')
<title>Data Lelang | Lelang</title>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Lelang</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <img src="{{url('data_file/'.$lelang->gambar_barang)}}" style="width:300px;height:300px">
            </div>
            <div class="col-md-8">
                <table>
                    <tr>
                        <td>Nama Barang</td>
                        <td>:</td>
                        <td>{{$lelang->nama_barang}}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Lelang</td>
                        <td>:</td>
                        <td>{{$lelang->tgl_lelang}}</td>
                    </tr>
                    <tr>
                        <td>Harga Awal</td>
                        <td>:</td>
                        <td>{{$lelang->harga_awal}}</td>
                    </tr>
                    <tr>
                        <td>Deskripsi barang</td>
                        <td>:</td>
                        <td>{{$lelang->deskripsi_barang}}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td>{{$lelang->status}}</td>
                    </tr>
                    <tr>
                        <td>Pemenang</td>
                        <td>:</td>
                        <td>{{$users->where('id', $lelang->lelang_masyarakat_id)->first()->name ?? null}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>


@if($penawaran == null)
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Penawaran {{$lelang->nama_barang}}</h6>
    </div>
    <form action="/menawar/store" method="post">
    @csrf
    <div class="card-body">
    @if( Session::get('masuk') !="")
            <div class='alert alert-success'><center><b>{{Session::get('masuk')}}</b></center></div>        
    @endif
    @if( Session::get('gagal') !="")
            <div class='alert alert-danger'><center><b>{{Session::get('gagal')}}</b></center></div>        
    @endif
        <div class="form-group">
            <label for="">Tawarkan Harga</label>
            <input type="hidden" name="lelang_id" value="{{$lelang->id_lelang}}">
            <input type="number" class="form-control" name="penawaran_harga" required>
        </div>
        <center><input type="submit" class="btn btn-danger" value="Tawarkan"></center>
    </div>
    </form>
</div>
@else
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Penawaran {{$lelang->nama_barang}}</h6>
    </div>
    <div class="card-body">
        <h5 class="card-title">Anda Telah Menawar Barang Ini dengan harga @if($penawaran->penawaran_harga == null) 0 @else {{$penawaran->penawaran_harga}} @endif</h5>
    </div>
</div>
@endif


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data - data Pelelang {{$lelang->nama_barang}}</h6>
    </div>
    <div class="card-body">
        <table class="table table-bordered"  id="dataTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Pelelang</th>
                    <th>No Telp</th>
                    <th>Harga Penawaran</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($data as $i => $u)
                <tr>
                    <td>{{++$i}}</td>
                    <td>{{$u->name}}</td>
                    <td>{{$u->telp}}</td>
                    <td>{{$u->penawaran_harga}}</td>
                    <td>{{$u->status_lelang}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
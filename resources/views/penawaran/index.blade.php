@extends('layouts.template')
@section('content')
<title>Data Penawaran | Lelang</title>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Penawaran Lelang</h6>
    </div>
    <div class="card-body">
    @if( Session::get('masuk') !="")
            <div class='alert alert-success'><center><b>{{Session::get('masuk')}}</b></center></div>        
            @endif
        <table class="table table-bordered"  id="dataTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Pelelang</th>
                    <th>No Telp</th>
                    <th>Harga Penawaran</th>
                    <th>Status</th>
                    <th>Ubah Status</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($data as $i => $u)
                <tr>
                    <td>{{++$i}}</td>
                    <td>{{$u->nama_barang}}</td>
                    <td>{{$u->name}}</td>
                    <td>{{$u->telp}}</td>
                    <td>{{$u->penawaran_harga}}</td>
                    <td>{{$u->status_lelang}}</td>
                    @if($u->status_lelang == 'tunda')
                    <td><a href="/penawaran/status/{{$u->id_history}}" class="btn btn-success btn-sm" onclick="return confirm('Apakah anda yakin ?')">Pilih Jadi Pemenang</a></td>
                    @elseif($u->status_lelang == 'tidak_dipilih')
                    <td>Tidak Dipilih</td>
                    @else
                    <td>Terpilih</td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
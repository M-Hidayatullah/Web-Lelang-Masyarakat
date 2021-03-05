@extends('layouts.template')
@section('content')
<title>Data Lelang | Lelang</title>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data yang sudah di lelang</h6>
    </div>
    <div class="card-body">
        <table class="table table-bordered"  id="dataTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
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
                    <td>{{$u->nama_barang}}</td>
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
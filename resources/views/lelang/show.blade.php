@extends('layouts.template')
@section('content')
<title>Data Lelang | Lelang</title>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail</h6>
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

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Pelelang {{$lelang->nama_barang}}</h6>
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
                    <th>Ubah Status</th>
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
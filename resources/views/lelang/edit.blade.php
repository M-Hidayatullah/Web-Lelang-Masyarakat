@extends('layouts.template')
@section('content')
<title>Data Lelang | Lelang</title>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
    </div>
    <div class="card-body">
        <form action="/lelang/update" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Barang</label>
                <input type="hidden" name="id_lelang" value="{{$lelang->id_lelang}}">
                <select name="barang_id" class="select2 form-control" style="width:100%" required>
                    <option value="" disabled selected>Pilih Barang</option>
                    @foreach($barang as $b)
                    @if($lelang->barang_id == $b->id_barang)
                    <option value="{{$b->id_barang}}" selected>{{$b->nama_barang}}</option>
                    @else
                    <option value="{{$b->id_barang}}">{{$b->nama_barang}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Tanggal Lelang</label>
                <input type="date" name="tgl_lelang" class="form-control" value="{{$lelang->tgl_lelang}}" required>
            </div>
            <div class="form-group">
                <label for="">Status</label>
                <select name="status" class="form-control">
                    @if($lelang->status == 'dibuka')
                    <option value="{{$lelang->status}}" selected>Dibuka</option>
                    <option value="ditutup" >Ditutup</option>
                    @else
                    <option value="{{$lelang->status}}" >Dibuka</option>
                    <option value="ditutup" selected>Ditutup</option>
                    @endif
                </select>
            </div>
            <input type="submit" value="Update" class="btn btn-warning">
        </form>
    </div>
</div>


@endsection
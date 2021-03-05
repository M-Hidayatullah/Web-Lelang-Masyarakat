@extends('layouts.template')
@section('content')
<title>Dashboard | Lelang</title>
<div class="card shadow mb-4">
<div class="card-body">
<h2 align="center">Barang yang di lelang</h2>
</div>
</div>
@if( Session::get('berhasil') !="")
<div class='alert alert-success'><center><b>{{Session::get('berhasil')}}</b></center></div>        
@endif
<div class="row mb-3">

@foreach($lelang as $l)
<div class="col-md-4">
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="{{url('data_file/'.$l->gambar_barang)}}" style="height:200px">
  <div class="card-body">
    <h5 class="card-title">{{$l->nama_barang}}</h5>
    <h6 class="card-title">Harga : {{$l->harga_awal}}</h6>
    <p class="card-title">{{$l->deskripsi_barang}}</p>
    <a href="/menawar/show/{{$l->id_lelang}}" class="btn btn-danger btn-block">Pesan</a>
  </div>
</div>

</div>

@endforeach
</div>




@endsection

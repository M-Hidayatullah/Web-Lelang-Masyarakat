@extends('layouts.template')
@section('content')
<title>Dashboard | Lelang</title>

@if( Session::get('berhasil') !="")
<div class='alert alert-success'><center><b>{{Session::get('berhasil')}}</b></center></div>        
@endif
<div class="row">

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-primary shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Petugas</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">{{$jumlah_petugas}}</div>
        </div>
        <div class="col-auto">
          <i class="fas fa-users fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-success shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Barang</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">{{$jumlah_barang}}</div>
        </div>
        <div class="col-auto">
          <i class="fas fa-university fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-dark shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Jumlah Lelang</div>
          <div class="h5 mb-0 font-user-circle text-gray-800">{{$jumlah_lelang}}</div>
        </div>
        <div class="col-auto">
          <i class="fas fa-user-circle fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Pending Requests Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-warning shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah Penawar</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">{{$jumlah_penawar}}</div>
        </div>
        <div class="col-auto">
          <i class="fas fa-location-arrow fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Penawaran</h6>
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

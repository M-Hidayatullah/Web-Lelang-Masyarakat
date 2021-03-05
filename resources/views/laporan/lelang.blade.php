@extends('layouts.template')
@section('content')
<title>Laporan Data Lelang</title>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark">Masukan Tanggal</h6>
    </div>
    <div class="card-body">
        <form action="lap_lelang_input" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Dari Tanggal</label>
                        <input type="date" name="awal" required class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Sampai Tanggal</label>
                        <input type="date" name="akhir" required class="form-control">
                    </div>
                </div>
            </div>
            <center><input type="submit" class="btn btn-success"></center>
      </form>
<br>
    </div>
</div>
<div class="card shadow mb-4">
<div class="card-header py-3">
  <h6 class="m-0 font-weight-bold text-dark">Laporan Lelang</h6>
</div>
<div class="card-body">
  <div class="table-responsive">
    @if ($hitung == 0)
        
    @else
    <form action="/lap_lelang/export_excel">
        <input type="hidden" name="awal" value="{{$req1}}">
        <input type="hidden" name="akhir" value="{{$req2}}">
       <input type="submit" class="btn btn-warning" value="EXPORT EXCEL">
       
       </form>
    @endif
       <br>
    @include('laporan.table_lelang', $lelang )

  </div>
</div>

  
@endsection
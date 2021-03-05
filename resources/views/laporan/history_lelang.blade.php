@extends('layouts.template')
@section('content')
<title>Laporan Data History</title>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark">Masukan Status</h6>
    </div>
    <div class="card-body">
        <form action="lap_history_input" method="post">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Status Penawar</label>
                        <select name="status_lelang" class="form-control" required>
                            <option value="" disabled selected>Pilih Status</option>
                            <option value="tunda">Di Tunda</option>
                            <option value="dipilih">Di Pilih</option>
                            <option value="tidak_dipilih">Tidak Di Pilih</option>
                        </select>
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
  <h6 class="m-0 font-weight-bold text-dark">Laporan Data History</h6>
</div>
<div class="card-body">
  <div class="table-responsive">
     @if ($hitung == 0)
        
    @else
    
    <form action="/lap_history/export_excel">
        <input type="hidden" name="status_lelang" value="{{$req1}}">
       <input type="submit" class="btn btn-warning" value="EXPORT EXCEL">
       
       </form>
    @endif
       <br>
    @include('laporan.table_history', $history_lelang )
  </div>
</div>

  
@endsection
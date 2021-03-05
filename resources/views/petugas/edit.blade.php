@extends('layouts.template')
@section('content')
<title>Data Petugas | Lelang</title>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
    </div>
    <div class="card-body">
        <form action="/petugas/update" method="post">
            @csrf
            <div class="form-group">
                <label for="">Nama Petugas</label>
                <input type="hidden" name="id" value="{{$petugas->id}}">
                <input type="text" name="name" class="form-control" value="{{$petugas->name}}">
            </div>
            <input type="submit" value="Update" class="btn btn-warning">
        </form>
    </div>
</div>


@endsection
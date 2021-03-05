@extends('layouts.template')
@section('content')
<title>Data Masyarakat | Lelang</title>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
    </div>
    <div class="card-body">
        <form action="/masyarakat/update" method="post">
            @csrf
            <div class="form-group">
                <label for="">Nama Masyarakat</label>
                <input type="hidden" name="id" value="{{$masyarakat->id}}">
                <input type="text" name="name" class="form-control" value="{{$masyarakat->name}}">
            </div>
            <div class="form-group">
                <label for="">Nama Masyarakat</label>
                <input type="text" name="telp" class="form-control" value="{{$masyarakat->telp}}">
            </div>
            <input type="submit" value="Update" class="btn btn-warning">
        </form>
    </div>
</div>


@endsection
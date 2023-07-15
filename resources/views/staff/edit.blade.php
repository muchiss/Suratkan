@extends('layout/utama')

@section('konten')
<a href="/staff" class="btn btn-dark btn-sm mb-2"><< Kembali </a>
<form method="post" action="{{ '/staff/'.$data->no_staff }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <h4>Nomor Staff : {{ $data->no_staff }}</h4>    
    </div>
    <div class="mb-3">
        <label for="nama_staff" class="form-label">Nama Staff</label>
        <input type="text" class="form-control" id="nama_staff" name="nama_staff" value="{{ $data->nama_staff }}">
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea class="form-control" name="alamat" id="" cols="30" rows="10">{{ $data->alamat }}</textarea>
    </div>
    <div class="mb-3">
    <button type="submit" class="btn btn-info">Ubah</button>
    </div>
</form>
@endsection
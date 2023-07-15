@extends('layout/utama')

@section('konten')
<a href="/staff" class="btn btn-dark btn-sm mb-2"><< Kembali </a>
<p>
    <h2>Tambahkan Data</h2>
</p>
<form method="post" action="/staff">
    @csrf
    <div class="mb-3">
        <label for="no_staff" class="form-label">Nomor Staff</label>
        <input type="text" class="form-control" id="no_staff" name="no_staff" value="{{ Session::get('no_staff') }}">
    </div>
    <div class="mb-3">
        <label for="nama_staff" class="form-label">Nama Staff</label>
        <input type="text" class="form-control" id="nama_staff" name="nama_staff" value="{{ Session::get('nama_staff') }}">
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea class="form-control" name="alamat" id="" cols="30" rows="10">{{ Session::get('alamat') }}</textarea>
    </div>
    <div class="mb-3">
    <button type="submit" class="btn btn-info">Tambah</button>
    </div>
</form>
@endsection
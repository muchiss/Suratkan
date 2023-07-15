@extends('layout/utama')

@section('konten')
<div>
    <a href="/staff" class="btn btn-dark btn-sm"><< Kembali </a>
    <h1>{{ $data->nama_staff }}</h1>
    <p>
        <b>Nomor Staff</b> {{ $data->no_staff }}
    </p>
    <p>
        <b>Alamat</b> {{ $data->alamat }}
    </p>
</div>
@endsection
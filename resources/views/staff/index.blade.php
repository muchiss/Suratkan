@extends('layout/utama')

@section('konten')
<a href="/staff/create" class="btn btn-info">+Tambah Data</a>
<table class="table table-hover">
    <thead>
        <tr>
            <th>Nomor Staff</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            @foreach ($data as $s)
            <tr>
                <td>{{ $s->no_staff }}</td>
                <td>{{ $s->nama_staff }}</td>
                <td>{{ $s->alamat }}</td>
                <td>
                    <a class="btn btn-secondary btn-sm" href="{{ url('/staff/'.$s->no_staff) }}">Detail</a>
                    <a class="btn btn-warning btn-sm" href="{{ url('/staff/'.$s->no_staff.'/edit') }}">Ubah</a>
                    <a class="btn btn-danger btn-sm" href="{{ url('/staff/'.$s->no_staff) }}">Hapus</a>
                </td>
            </tr>
            @endforeach
        </tr>
    </tbody>
</table>
{{ $data->links() }}
@endsection
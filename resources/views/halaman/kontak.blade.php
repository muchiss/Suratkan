@extends('layout.utama')

@section('konten')
<div>
    <h1>{{ $judul}}</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam maxime vero odio repellat qui nobis amet eum aliquid inventore. Provident.</p>
    <p>
        <ul>
            <li> Email : {{ $kontak['email'] }}</li>
            <li> Instagram : {{ $kontak['instagram'] }}</li>
        </ul>
    </p>
</div>
@endsection
    

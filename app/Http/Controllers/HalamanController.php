<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HalamanController extends Controller
{
    function index()
    {
        return view("halaman/index");
    }

    function tentang()
    {
        return view("halaman/tentang");
    }

    function kontak()
    {
        $data = [
            'judul' => 'Halaman Kontak',
            'kontak' => [
                'email' => 'mukhlishsmiler@gmail.com',
                'instagram' => 'mu._.chiss',
            ]
        ];

        return view("halaman/kontak")->with($data);
    }
}

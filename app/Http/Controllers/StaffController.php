<?php

namespace App\Http\Controllers;

use App\Models\staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data = staff::all();
        $data = staff::orderBy('no_staff', 'asc')->paginate(5);
        return view('staff.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('staff.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('no_staff', $request->no_staff);
        Session::flash('nama_staff', $request->nama_staff);
        Session::flash('alamat', $request->alamat);

        $request->validate([
            'no_staff' => 'required|numeric',
            'nama_staff' => 'required',
            'alamat' => 'required'
        ], [
            'no_staff.required' => 'Nomor Staff Belum di isi!',
            'no_staff.numeric' => 'Nomor Staff Yo Kudu Ongko!',
            'nama_staff.required' => 'Nama Staff Belum di isi!',
            'alamat.required' => 'Alamat Belum di isi!'
        ]);

        $data = [
            'no_staff' => $request->input('no_staff'),
            'nama_staff' => $request->input('nama_staff'),
            'alamat' => $request->input('alamat')
        ];

        staff::create($data);
        return redirect('staff')->with('sukses', 'Data Berhasil di tambah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = staff::where('no_staff', $id)->first();
        return view('staff.show')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = staff::where('no_staff', $id)->first();
        return view('staff.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_staff' => 'required',
            'alamat' => 'required'
        ], [
            'nama_staff.required' => 'Nama Staff Belum di isi!',
            'alamat.required' => 'Alamat Belum di isi!'
        ]);

        $data = [
            'nama_staff' => $request->input('nama_staff'),
            'alamat' => $request->input('alamat')
        ];

        staff::where('no_staff', $id)->update($data);
        return redirect('/staff')->with('sukses', 'Data Iso Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        staff::where('no_staff', $id)->delete();
        return redirect('/staff')->with('sukses', 'Data Iso Dihapus!');
    }
}

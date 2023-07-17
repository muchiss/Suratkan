<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    function index()
    {
        return view('sesi/index');
    }

    function login(Request $request)
    {
        Session::flash('email', $request->email);
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email Anda Belum Diisi!',
            'password.required' => 'Password Anda Belum Diisi!'
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($infologin)) {
            // Login berhasil, simpan waktu login terakhir pada session
            session(['last_login_time' => now()]);
            // return 'Sukses';
            return redirect('staff')->with('sukses', Auth::user()->name . ' Iso Login!');
        } else {
            // return 'Gagal';
            return redirect('sesi')->withErrors('Email dan Password Salah!');
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('sesi')->with('sukses', 'Iso Logout!');
    }

    function register()
    {
        return view('sesi.register');
    }

    function create(Request $request)
    {
        Session::flash('name', $request->name);
        Session::flash('email', $request->email);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ], [
            'name.required' => 'Nama Anda Belum Diisi!',
            'email.required' => 'Email Anda Belum Diisi!',
            'email.email' => 'Pake Email Yang Benar!',
            'email.unique' => 'Email ini Sudah Ada!',
            'password.required' => 'Password Anda Belum Diisi!',
            'password.min' => 'Gunakan minimal 6 karakter!'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ];

        User::create($data);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($infologin)) {
            // return 'Sukses';
            return redirect('staff')->with('sukses', Auth::user()->name . ' Iso Login!');
        } else {
            // return 'Gagal';
            return redirect('sesi')->withErrors('Email dan Password Salah!');
        }
    }
}

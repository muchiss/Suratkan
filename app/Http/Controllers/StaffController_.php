<?php

namespace App\Http\Controllers;

use App\Models\staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    function index()
    {
        // $data = staff::all();
        $data = staff::orderBy('no_staff', 'asc')->paginate(1);
        return view('staff.index')->with('data', $data);
    }

    function detail($id)
    {
        $data = staff::where('no_staff', $id)->first();
        return view('staff.show')->with('data', $data);
    }

    function create()
    {
    }
}

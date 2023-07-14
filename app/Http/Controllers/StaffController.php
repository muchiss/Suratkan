<?php

namespace App\Http\Controllers;

use App\Models\staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    function index()
    {
        $data = staff::all();
        return $data;
    }
}

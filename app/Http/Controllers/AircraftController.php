<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AircraftController extends Controller
{
    public function index()
    {
        return view('aircraft.index');
    }
}

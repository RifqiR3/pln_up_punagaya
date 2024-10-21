<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function submit()
    {
        return view('submit');
    }
}

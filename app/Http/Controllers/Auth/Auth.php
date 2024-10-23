<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Auth extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function doLogin(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|string|max:100',
                'password' => 'required|string|max:200'
            ]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function doRegist(Request $request) {}
}

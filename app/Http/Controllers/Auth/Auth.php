<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

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

            $dataUser = Users::where('email', $request->input('email'))->first();

            if (!$dataUser) {
                return back()->with('error', 'Akun tidak ditemukan. Mohon kontak admin.')->withInput();
            }

            $passwordVerify = Hash::check($request->input('password'), $dataUser->password);
            if (!$passwordVerify) {
                return back()->with('error', 'Password yang anda masukkan salah.')->withInput();
            }

            $request->session()->put([
                'id' => $dataUser->id,
                'uuid' => $dataUser->uuid,
                'nama' => $dataUser->nama,
                'foto' => $dataUser->foto,
                'role' => $dataUser->role,
            ]);

            return redirect()->route('dashboard.index')->with('success', 'Berhasil Login');
        } catch (ValidationException) {
            return back()->with('error', 'Terdapat kesalahan pada input form')->withInput();
        } catch (\Exception $err) {
            return back()->with('error', 'Terdapat kesalahan ketika melakukan login')->withInput();
        }
    }

    public function doLogout(Request $request)
    {
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect()->route('login')->with('success', 'Anda berhasil logout!');
    }

    public function doRegist(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|string|unique:data_user,email|max:100',
            'password' => 'required|min:8|confirmed'
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Password wajib diisi.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'password.min' => 'Password minimal harus 8 karakter.',
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Users;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'title' => "Dashboard"
        ]);
    }

    public function submit()
    {
        return view('submit', [
            'title' => 'Submit SPPD'
        ]);
    }

    public function status()
    {
        return view('statusUser', [
            'title' => 'Periksa SPPD Karyawan'
        ]);
    }

    public function profile()
    {
        return view('profile');
    }

    // --------------------------------------------- Start Konfirmasi Akun ---------------------------------------------
    public function konfirmasiAkun()
    {
        $role = Role::where('id', '!=', 1)->get();
        $akunNon = Users::where('is_verified', 0)->get();
        return view('konfirmasiAkun', [
            'title' => "Konfirmasi Akun",
            'akunNon' => $akunNon,
            'role' => $role
        ]);
    }

    public function doKonfirmasiAkun(Request $request)
    {
        try {
            $validated = $request->validate([
                'uuid' => 'required|string',
                'action' => 'required|in:terima,tolak',
                'role' => 'required_if:action,terima|string'
            ]);

            $akun = Users::where('uuid', $validated['uuid'])->firstOrFail();

            if ($validated['action'] === 'terima') {
                $akun->is_verified = 1;
                $akun->role = $validated['role'];
                $akun->save();

                return response()->json([
                    'success' => true,
                    'message' => 'Akun berhasil dikonfirmasi.'
                ]);
            } else {
                $akun->delete();
                return response()->json([
                    'success' => true,
                    'message' => 'Akun berhasil ditolak.'
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }
    // --------------------------------------------- End Konfirmasi Akun ---------------------------------------------

}

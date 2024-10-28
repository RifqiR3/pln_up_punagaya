<?php

namespace App\Http\Controllers;

use App\Models\DataSppd;
use App\Models\Role;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;
use Termwind\Components\Dd;

class Dashboard extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'title' => "Dashboard"
        ]);
    }

    // --------------------------------------------- Start Submit/Review ---------------------------------------------
    public function submit()
    {
        $dataUser = Users::where('uuid', '=', session('uuid'))->get();

        return view('submit', [
            'title' => 'Submit SPPD',
            'dataUser' => $dataUser
        ]);
    }

    public function doSubmit(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama' => 'required|string|max:255',
                'nip' => 'required|numeric|digits_between:5,20',
                'maksud' => 'required|string|max:500',
                'province_name' => 'required|string',
                'tujuanKota' => 'required|string',
                'tanggalMulai' => 'required|date_format:d-m-Y',
                'tanggalSelesai' => 'required|date_format:d-m-Y|after_or_equal:tanggalMulai',
                'suratUndangan' => 'required|file|mimes:pdf,doc,docx|max:5120', // 5MB max
            ]);

            $undanganPath = null;
            if ($request->hasFile('suratUndangan')) {
                $file = $request->file('suratUndangan');
                $fileName = 'SPPD_' . $validated['nama'] . '_' . Str::uuid() . '.' . $file->getClientOriginalExtension();
                $undanganPath = $file->storeAs('sppd', $fileName, 'public');
            }

            $tanggalMulai = \DateTime::createFromFormat('d-m-Y', $validated['tanggalMulai'])->format('Y-m-d');
            $tanggalSelesai = \DateTime::createFromFormat('d-m-Y', $validated['tanggalSelesai'])->format('Y-m-d');

            $sppd = DataSppd::create([
                'uuid' => Str::uuid(),
                'user_uuid' => session('uuid'),
                'nama' => $validated['nama'],
                'nip' => $validated['nip'],
                'maksud' => $validated['maksud'],
                'tujuan_provinsi' => $validated['province_name'],
                'tujuan_kota' => $validated['tujuanKota'],
                'tanggal_mulai' => $tanggalMulai,
                'tanggal_selesai' => $tanggalSelesai,
                'surat_undangan' => $undanganPath,
                'status' => 'Menunggu Asmen untuk meneruskan SPPD ke Manager',
            ]);

            return redirect()
                ->route('dashboard.status')
                ->with('success', 'SPPD berhasil disubmit dan menunggu persetujuan.');
        } catch (\Exception $e) {
            if (isset($undanganPath) && Storage::disk('public')->exists($undanganPath)) {
                Storage::disk('public')->delete($undanganPath);
            }

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function konfirmasiSppd()
    {
        if (session('role') === 'Sekretaris') {
            $sppd = DataSppd::with('user')->get();
        }

        if (session('role') === 'superadmin') {
            $sppd = DataSppd::with('user')->get();
        }

        if (session('role') === 'Manager') {
            $sppd = DataSppd::with('user')->get();
        }

        if (session('role') === 'Asisten Manager') {
            $sppd = DataSppd::with('user')->get();
        }

        return view('konfirmasiSppd', [
            'title' => 'Konfirmasi SPPD',
            'sppd' => $sppd
        ]);
    }

    public function lihatSppd(string $uuid): Response
    {
        try {
            $sppd = DataSppd::where('data_sppd.uuid', $uuid)
                ->join('data_user', 'data_user.uuid', '=', 'data_sppd.user_uuid')
                ->select(
                    'data_sppd.uuid',
                    'data_sppd.user_uuid',
                    'data_sppd.surat_undangan',
                    'data_sppd.status',
                    'data_user.role',
                )
                ->firstOrFail();

            if (session('role') === 'Asisten Manager' && $sppd->status !== 'Menunggu Asmen untuk meneruskan SPPD ke Manager') {
                return response('Unauthorized', 403);
            }

            if (session('role') === 'Manager' && $sppd->status !== 'Menunggu persetujuan Manager') {
                return response('Unauthorized', 403);
            }

            if (session('role') === 'Karyawan' && $sppd->user_uuid !== session('uuid')) {
                return response('Unauthorized', 403);
            }

            if (session('role') === 'Sekretaris' && $sppd->status !== 'Diproses Sekretaris') {
                return response('Unauthorized', 403);
            }
            // Periksa eksistensi file
            if (!Storage::disk('public')->exists($sppd->surat_undangan)) {
                return response('File not found', 404);
            }
            // Ambil ekstensi file
            $extension = pathinfo($sppd->surat_undangan, PATHINFO_EXTENSION);
            // Ambil file
            $fileContent = Storage::disk('public')->get($sppd->surat_undangan);

            return response($fileContent)
                ->header('Content-Type', $this->getContentType($extension))
                ->header('Content-Disposition', 'inline; filename="' . basename($sppd->surat_undangan) . '"')
                ->header('Cache-Control', 'public, max-age=3600')
                ->header('Accept-Range', 'bytes');
        } catch (\Exception $e) {
            return response('Error retrieving file: ' . $e->getMessage(), 500);
        }
    }

    public function doKonfirmSppd(Request $request)
    {
        dd($request);
        $role = session('role');
        dd($role);
    }

    // For User
    public function status()
    {
        $sppd = DataSppd::where('user_uuid', '=', session('uuid'))->with('user')->get();

        return view('statusUser', [
            'title' => 'Periksa SPPD Karyawan',
            'sppd' => $sppd
        ]);
    }

    private function getContentType(string $extension): string
    {
        return match (strtolower($extension)) {
            'pdf' => 'application/pdf',
            'doc' => 'application/msword',
            'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            default => 'application/octet-stream',
        };
    }
    // --------------------------------------------- End Submit/Review ---------------------------------------------



    public function profile()
    {
        return view('profile');
    }

    // --------------------------------------------- Start Konfirmasi Akun ---------------------------------------------
    public function konfirmasiAkun()
    {
        if (session('role') !== 'superadmin') {
            return redirect()->route('dashboard.index')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }

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

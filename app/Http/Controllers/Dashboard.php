<?php

namespace App\Http\Controllers;

use App\Models\DataDriver;
use App\Models\DataSppd;
use App\Models\Role;
use App\Models\Users;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;
use Termwind\Components\Dd;
use Illuminate\Support\Facades\Log;

class Dashboard extends Controller
{
    public function index()
    {
        return redirect(route('dashboard.submit'));
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
                $undanganPath = $file->storeAs('surat_undangan', $fileName, 'public');
            }

            $tanggalMulai = \DateTime::createFromFormat('d-m-Y', $validated['tanggalMulai'])->format('Y-m-d');
            $tanggalSelesai = \DateTime::createFromFormat('d-m-Y', $validated['tanggalSelesai'])->format('Y-m-d');

            if (session('role') === 'superadmin') {
                $status = 'Menunggu persetujuan Manager';
            }

            if (session('role') === 'Manager') {
                $status = 'Diproses Sekretaris';
            }
            if (session('role') === 'Sekretaris') {
                $status = 'Menunggu persetujuan Manager';
            }
            if (session('role') === 'Asisten Manager') {
                $status = 'Menunggu persetujuan Manager';
            }
            if (session('role') === 'Karyawan') {
                $status = 'Menunggu Asmen untuk meneruskan SPPD ke Manager';
            }

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
                'status' => $status,
            ]);

            return redirect()
                ->route('dashboard.status')
                ->with('success', 'Permohonan SPPD berhasil disubmit dan ' . $status);
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
        if (session('role') === 'superadmin') {
            $sppd = DataSppd::with('user')->get();
        }

        if (session('role') === 'Sekretaris') {
            $sppd = DataSppd::where('status', 'Diproses Sekretaris')->get();
        }

        if (session('role') === 'Manager') {
            $sppd = DataSppd::where('status', 'Menunggu persetujuan Manager')->get();
        }

        if (session('role') === 'Asisten Manager') {
            $sppd = DataSppd::where('status', 'Menunggu Asmen untuk meneruskan SPPD ke Manager')->get();
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

    public function lihatSppdStatus(string $uuid): Response
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

            if (session('uuid') !== $sppd->user_uuid) {
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

    public function lihatSppdKonfirm(string $uuid): Response
    {
        try {
            $sppd = DataSppd::where('data_sppd.uuid', $uuid)
                ->join('data_user', 'data_user.uuid', '=', 'data_sppd.user_uuid')
                ->select(
                    'data_sppd.uuid',
                    'data_sppd.user_uuid',
                    'data_sppd.sppd_file',
                    'data_sppd.status',
                    'data_user.role',
                )
                ->firstOrFail();

            if (session('uuid') !== $sppd->user_uuid) {
                return response('Unauthorized', 403);
            }
            // Periksa eksistensi file
            if (!Storage::disk('public')->exists('sppd_konfirm/' . $sppd->sppd_file)) {
                return response('File not found', 404);
            }
            // Ambil ekstensi file
            $extension = pathinfo('sppd_konfirm/' . $sppd->sppd_file, PATHINFO_EXTENSION);
            // Ambil file
            $fileContent = Storage::disk('public')->get('sppd_konfirm/' . $sppd->sppd_file);

            return response($fileContent)
                ->header('Content-Type', $this->getContentType($extension))
                ->header('Content-Disposition', 'inline; filename="' . basename('sppd_konfirm/' . $sppd->sppd_file) . '"')
                ->header('Cache-Control', 'public, max-age=3600')
                ->header('Accept-Range', 'bytes');
        } catch (\Exception $e) {
            return response('Error retrieving file: ' . $e->getMessage(), 500);
        }
    }

    public function doKonfirmSppd(Request $request)
    {
        try {
            $sppd = DataSppd::where('uuid', $request->uuid)->firstOrFail();

            if (session('role') === 'superadmin') {
            }

            if (session('role') === 'Sekretaris') {
                $sppd->status = 'Selesai';
                $pesan = "SPPD akan diteruskan ke pihak yang bersangkutan";
            }

            if (session('role') === 'Manager') {
                $sppd->status = 'Diproses Sekretaris';
                $pesan = "SPPD akan diposes oleh sekretaris";
            }

            if (session('role') === 'Asisten Manager') {
                $sppd->status = 'Menunggu persetujuan Manager';
                $pesan = "Permohonan SPPD berhasil diteruskan ke manager";
            }

            $sppd->save();
            return response()->json([
                'success' => true,
                'message' => $pesan
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e
            ]);
        }
    }

    public function doKonfirmSppdSekretaris(Request $request)
    {
        try {
            $request->validate([
                'file' => 'required|file|mimes:pdf|max:5120',
                'uuid' => 'required|string|exists:data_sppd,uuid'
            ]);

            DB::beginTransaction();

            $sppd = DataSppd::where('uuid', $request->uuid)->firstOrFail();

            $filename = 'sppd_' . $sppd->uuid  . '.pdf';

            if ($sppd->sppd_file) {
                Storage::disk('public')->delete('sppd_konfirm/' . $sppd->sppd_file);
            }

            $path = $request->file('file')->storeAs(
                'sppd_konfirm',
                $filename,
                'public'
            );

            if (!$path) {
                throw new \Exception('Gagal menyimpan file');
            }

            $sppd->update([
                'sppd_file' => $filename,
                'status' => 'Selesai',
                'status_konfirmasi' => 1,
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'SPPD berhasil diupload dan akan diteruskan ke pihak yang bersangkutan',
                'filename' => $filename
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            Log::error('SPPD Upload Validation Error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal: ' . $e->getMessage()
            ], 422);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('SPPD Upload Error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengupload file'
            ], 500);
        }
    }

    public function doTolakSppd(Request $request)
    {
        try {
            $sppd = DataSppd::where('uuid', $request->uuid)->firstOrFail();
            $sppd->status = 'Ditolak';
            $sppd->catatan = 'oleh ' . $request->nama;
            $sppd->save();

            return response()->json([
                'success' => true,
                'message' => 'Permohonan SPPD berhasil ditolak'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e
            ]);
        }
    }

    public function doBatalSppd(Request $request)
    {
        try {
            $sppd = DataSppd::where('uuid', $request->uuid)->firstOrFail();
            $sppd->status = 'Dibatalkan';
            $sppd->save();

            return response()->json([
                'success' => true,
                'message' => 'Permohonan SPPD berhasil dibatalkan'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e
            ]);
        }
    }

    public function doEditSppd(Request $request)
    {
        dd($request);
    }

    public function riwayatSppd()
    {
        $sppd = DataSppd::where('user_uuid', session('uuid'))
            ->whereIn('status', ['Selesai', 'Ditolak', 'Dibatalkan'])
            ->get();
        return view('riwayatSppd', [
            "title" => 'Riwayat SPPD',
            "sppd" => $sppd
        ]);
    }

    // For User
    public function status()
    {
        $sppd = DataSppd::where('user_uuid', '=', session('uuid'))->with('user')
            ->whereNotIn('status', ['Selesai', 'Ditolak', 'Dibatalkan'])
            ->get();

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

    // --------------------------------------------- Start Mobil Dinas ---------------------------------------------
    public function submitMobilDinas()
    {
        $dataUser = Users::where('uuid', '=', session('uuid'))->get();

        return view('submitMobilDinas', [
            'title' => 'Submit Mobil Dinas',
            'dataUser' => $dataUser
        ]);
    }

    public function doSubmitMobilDinas(Request $request)
    {
        dd($request);
    }

    public function statusMobilDinas()
    {
        return view('statusMobilDinas', [
            'title' => 'Status Mobil Dinas'
        ]);
    }

    public function konfirmasiMobilDinas()
    {
        return view('konfirmasiMobilDinas', [
            'title' => 'Konfirmasi Mobil Dinas'
        ]);
    }

    public function manageDriver()
    {
        $dataDriver = DataDriver::all();
        return view('manageDriver', [
            'title' => 'Manage Driver',
            'dataDriver' => $dataDriver
        ]);
    }

    public function doKonfirmasiDriver(Request $request)
    {
        try {
            DataDriver::create([
                'uuid' => Str::uuid(),
                'nama' => $request->nama,
                'plat_mobil' => $request->plat
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Data driver berhasil ditambah!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e
            ]);
        }
    }

    // --------------------------------------------- End Mobil Dinas ---------------------------------------------




    public function profile()
    {
        return view('profile');
    }
}

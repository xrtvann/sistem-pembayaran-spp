<?php

namespace App\Http\Controllers;

use App\Models\PembagianSpp;
use App\Models\Akademik;
use App\Models\Kelas;
use App\Models\Spp;
use App\Models\Siswa;
use Illuminate\Http\Request;

class PembagianSppController extends Controller
{
    // TAMPILAN INDEX UTAMA
    public function index()
    {
        $akademikAktif = Akademik::where('is_active', true)->first();
        $kelas = Kelas::all();
        $sppList = Spp::all();

        // Ambil data pembagian (tanpa siswa)
        $pembagian = PembagianSpp::whereNull('siswa_id')
            ->with(['akademik', 'kelas', 'spp'])
            ->get();

        return view('pembagian_spp.index', compact('akademikAktif', 'kelas', 'sppList', 'pembagian'));
    }

    // SIMPAN PEMBAGIAN SPP (TANPA SISWA)
    public function store(Request $request)
    {
        $request->validate([
            'id_akademik' => 'required|exists:akademik,id_akademik',
            'id_kelas' => 'required|exists:kelas,id_kelas',
            'id_spp' => 'required|exists:spp,id_spp',
        ]);

        // Hindari duplikat entri untuk kombinasi yang sama
        $exists = PembagianSpp::where('id_akademik', $request->id_akademik)
            ->where('id_kelas', $request->id_kelas)
            ->where('id_spp', $request->id_spp)
            ->whereNull('siswa_id')
            ->first();

        if ($exists) {
            return redirect()->back()->with('error', 'Data pembagian sudah ada.');
        }

        PembagianSpp::create([
            'id_akademik' => $request->id_akademik,
            'id_kelas' => $request->id_kelas,
            'id_spp' => $request->id_spp,
            'siswa_id' => null
        ]);

        return redirect()->back()->with('success', 'Data pembagian berhasil ditambahkan.');
    }

    // DETAIL SISWA DALAM KELAS UNTUK TAHUN AKADEMIK
    public function detail($id_akademik)
    {
        $pembagian = PembagianSpp::where('id_akademik', $id_akademik)
            ->whereNotNull('siswa_id')
            ->with(['siswa', 'kelas', 'akademik'])
            ->get();

        return view('pembagian_spp.detail', compact('pembagian'));
    }

    // FORM TAMBAH SISWA KE PEMBAGIAN KELAS (MODAL)
    public function formTambahSiswa(Request $request, $id)
    {
        $pembagian = PembagianSpp::where('id_pembagian', $id)->whereNull('siswa_id')->firstOrFail();

        $siswaTerpakai = PembagianSpp::where('id_akademik', $pembagian->id_akademik)
            ->whereNotNull('siswa_id')
            ->pluck('siswa_id')
            ->toArray();

        $perPage = $request->input('perPage', 20); // default 20
        $search = $request->input('search');

        $siswaQuery = Siswa::whereNotIn('id', $siswaTerpakai);

        if ($search) {
            $siswaQuery->where(function ($query) use ($search) {
                $query->where('nama', 'like', '%' . $search . '%')
                    ->orWhere('nis', 'like', '%' . $search . '%')
                    ->orWhere('nisn', 'like', '%' . $search . '%');
            });
        }

        if ($perPage === 'all') {
            $siswa = $siswaQuery->get();
        } else {
            $siswa = $siswaQuery->paginate($perPage)->appends([
                'perPage' => $perPage,
                'search' => $search,
            ]);
        }

        return view('pembagian_spp.tambah', compact('pembagian', 'siswa'));
    }

    public function tambahSiswa(Request $request, $id)
    {
        $request->validate([
            'siswa_id' => 'required|array',
            'siswa_id.*' => 'exists:siswa,id',
        ]);

        $pembagian = PembagianSpp::where('id_pembagian', $id)->whereNull('siswa_id')->firstOrFail();

        foreach ($request->siswa_id as $siswaId) {
            // Cegah duplikat jika siswa sudah masuk
            $cek = PembagianSpp::where('id_akademik', $pembagian->id_akademik)
                ->where('siswa_id', $siswaId)
                ->first();

            if (!$cek) {
                PembagianSpp::create([
                    'id_akademik' => $pembagian->id_akademik,
                    'id_kelas' => $pembagian->id_kelas,
                    'id_spp' => $pembagian->id_spp,
                    'siswa_id' => $siswaId,
                ]);
            }
        }

        return redirect()->route('pembagian_spp.detail', $pembagian->id_akademik)->with('success', 'Siswa berhasil ditambahkan.');
    }

    // HAPUS SISWA DARI PEMBAGIAN KELAS
    public function hapusSiswa($id)
    {
        $pembagian = PembagianSpp::findOrFail($id);
        if ($pembagian->siswa_id !== null) {
            $pembagian->delete();
            return redirect()->back()->with('success', 'Siswa berhasil dihapus dari kelas.');
        }

        return redirect()->back()->with('error', 'Data tidak valid.');
    }
}

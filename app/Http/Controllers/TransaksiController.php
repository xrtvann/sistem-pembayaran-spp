<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Transaksi;
use App\Models\PembagianSpp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{

    public function formCari()
    {
        return view('transaksi.cari');
    }

    public function konfirmasiPembayaran()
    {

        $transaksi = DB::table('transaksi')
            ->join('siswa', 'transaksi.siswa_id', '=', 'siswa.id')
            ->join('pembagian_spp', 'transaksi.id_pembagian', '=', 'pembagian_spp.id_pembagian')
            ->join('kelas', 'pembagian_spp.id_kelas', '=', 'kelas.id_kelas')
            ->select(
                'transaksi.id_transaksi',
                'siswa.nis',
                'siswa.nama as nama_siswa',
                'kelas.nama_kelas',
                'transaksi.jumlah_tagihan',
                'transaksi.total_bayar',
                'transaksi.sisa',
                'transaksi.status',
                'transaksi.tanggal_bayar'
            )
            ->where('transaksi.status', 'pending')
            ->orderBy('transaksi.tanggal_bayar', 'desc')
            ->get();
        return view('transaksi.konfirmasi', compact('transaksi'));
    }
    public function index2()
    {
        $transaksi = DB::table('transaksi')
            ->join('siswa', 'transaksi.siswa_id', '=', 'siswa.id')
            ->join('pembagian_spp', 'transaksi.id_pembagian', '=', 'pembagian_spp.id_pembagian')
            ->join('kelas', 'pembagian_spp.id_kelas', '=', 'kelas.id_kelas')
            ->select(
                'transaksi.id_transaksi',
                'siswa.nis',
                'siswa.nama as nama_siswa',
                'kelas.nama_kelas',
                'transaksi.jumlah_tagihan',
                'transaksi.total_bayar',
                'transaksi.sisa',
                'transaksi.status',
                'transaksi.tanggal_bayar'
            )
            ->where('transaksi.status', 'sukses')
            ->orderBy('transaksi.tanggal_bayar', 'desc')
            ->get();

        return view('transaksi.index2', compact('transaksi'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,sukses',
        ]);

        DB::table('transaksi')
            ->where('id_transaksi', $id)
            ->update(['status' => $request->status]);

        return back()->with('success', 'Status transaksi berhasil diperbarui.');
    }

    // TAMPILKAN DATA TRANSAKSI BERDASARKAN NIS
    public function index(Request $request)
    {
        $request->validate(['nis' => 'required']);
        $siswa = Siswa::where('nis', $request->nis)->firstOrFail();

        // Ambil pembagian spp siswa
        $pembagian = PembagianSpp::with(['kelas', 'spp'])
            ->where('siswa_id', $siswa->id)
            ->first();

        // Ambil semua transaksi
        $transaksi = Transaksi::where('siswa_id', $siswa->id)->get();

        // Hitung total bayar dan sisa
        $totalSpp = $pembagian?->spp?->nominal ?? 0;
        $totalBayar = $transaksi->sum('total_bayar');
        $sisa = $totalSpp - $totalBayar;

        return view('transaksi.index', compact('siswa', 'pembagian', 'transaksi', 'totalSpp', 'totalBayar', 'sisa'));
    }

    // TAMPILKAN FORM TAMBAH TRANSAKSI
    public function create($nis)
    {
        $siswa = Siswa::where('nis', $nis)->firstOrFail();
        $pembagian = PembagianSpp::with('spp')->where('siswa_id', $siswa->id)->firstOrFail();

        return view('transaksi.create', compact('siswa', 'pembagian'));
    }

    // SIMPAN TRANSAKSI
    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'id_pembagian' => 'required|exists:pembagian_spp,id_pembagian',
            'total_bayar' => 'required|integer|min:0',
            'tanggal_bayar' => 'required|date',
        ]);

        $status = session()->has('siswa') ? 'pending' : 'sukses';

        $pembagian = PembagianSpp::with('spp')->findOrFail($request->id_pembagian);
        $jumlahTagihan = $pembagian->spp->nominal;
        $sisa = $jumlahTagihan - $request->total_bayar;

        Transaksi::create([
            'siswa_id' => $request->siswa_id,
            'id_pembagian' => $request->id_pembagian,
            'jumlah_tagihan' => $jumlahTagihan,
            'total_bayar' => $request->total_bayar,
            'sisa' => $sisa,
            'status' => $status,
            'tanggal_bayar' => $request->tanggal_bayar,
        ]);

        return redirect()->route('transaksi.index', ['nis' => $pembagian->siswa->nis])
            ->with('success', 'Transaksi berhasil disimpan.');
    }
    public function history()
    {
        $history = Transaksi::with([
            'pembagian.siswa',   // untuk nama siswa
            'pembagian.spp'      // untuk nominal SPP
        ])->orderBy('tanggal_bayar', 'desc')->get();

        return view('history_transaksi.index', compact('history'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Akademik;
use Illuminate\Http\Request;

class AkademikController extends Controller
{
    // Tampilkan daftar tahun akademik
    public function index()
    {
        $akademik = Akademik::orderByDesc('mulai')->get();
        return view('akademik.index', compact('akademik'));
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'mulai' => 'required|date',
            'akhir' => 'required|date|after_or_equal:mulai',
        ]);

        // Jika ditandai sebagai aktif, nonaktifkan semua yang lain
        if ($request->has('is_active')) {
            Akademik::where('is_active', true)->update(['is_active' => false]);
        }

        Akademik::create([
            'mulai' => $request->mulai,
            'akhir' => $request->akhir,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('akademik.index')->with('success', 'Tahun akademik berhasil ditambahkan.');
    }

    // Update data tahun akademik
    public function update(Request $request, $id)
    {
        $request->validate([
            'mulai' => 'required|date',
            'akhir' => 'required|date|after_or_equal:mulai',
        ]);

        if ($request->has('is_active')) {
            Akademik::where('is_active', true)->update(['is_active' => false]);
        }

        $akademik = Akademik::findOrFail($id);
        $akademik->update([
            'mulai' => $request->mulai,
            'akhir' => $request->akhir,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('akademik.index')->with('success', 'Tahun akademik berhasil diupdate.');
    }

    // Hapus tahun akademik
    public function destroy($id)
    {
        $akademik = Akademik::findOrFail($id);
        $akademik->delete();

        return redirect()->route('akademik.index')->with('success', 'Tahun akademik berhasil dihapus.');
    }
}

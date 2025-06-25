<?php

namespace App\Http\Controllers;

use App\Models\Akademik;
use App\Models\Spp;
use Illuminate\Http\Request;

class SppController extends Controller
{
    public function index()
    {
        $spp = Spp::all();
    $akademik = Akademik::all(); // Tambahkan ini
    return view('spp.index', compact('spp', 'akademik'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nominal' => 'required|integer|min:0'
        ]);

        Spp::create($request->all());

        return redirect()->route('spp.index')->with('success', 'Data SPP berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nominal' => 'required|integer|min:0'
        ]);

        $spp = Spp::findOrFail($id);
        $spp->update($request->all());

        return redirect()->route('spp.index')->with('success', 'Data SPP berhasil diupdate.');
    }

    public function destroy($id)
    {
        $spp = Spp::findOrFail($id);
        $spp->delete();

        return redirect()->route('spp.index')->with('success', 'Data SPP berhasil dihapus.');
    }
}


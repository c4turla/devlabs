<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materi;
use App\Models\Praktikum;
use Illuminate\Support\Facades\Storage;

class SimulasiController extends Controller
{
    public function index()
    {
        $materiWithSimulasi = Materi::has('praktikum')->with('praktikum')->paginate(10);
        $materiWithoutSimulasi = Materi::doesntHave('praktikum')->paginate(10);

        return view('admin.simulasi.index', compact('materiWithSimulasi', 'materiWithoutSimulasi'));
    }
   
    public function tambah(Materi $materi)
    {
        $kuis = Praktikum::where('materi_id', $materi->id)->get();
        return view('admin.simulasi.tambah',compact('materi', 'kuis'));
    }

    public function storesimulasi(Request $request)
    {
        $request->validate([
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);

        $gambarPath = null;

        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('assets/images/simulasi', 'public');
        }

        Praktikum::create([
            'judul_praktikum' => $request->judul_praktikum,
            'materi_id' => $request->materi_id,
            'gambar' => $gambarPath,
            'simulasi' => $request->simulasi,
            'description' => $request->description,
        ]);
        return back()->with('success', 'Simulasi Latihan berhasil ditambahkan.');
    }

    public function editSimulasi(Request $request, $id)
    {
        $request->validate([
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);

        $kuis = Praktikum::findOrFail($id);

        $gambarPath = $kuis->gambar; // Simpan path gambar yang sudah ada

        if ($request->hasFile('gambar')) {
            // Hapus gambar yang sudah ada jika ada
            if ($gambarPath && Storage::disk('public')->exists($gambarPath)) {
                Storage::disk('public')->delete($gambarPath);
            }

            $gambarPath = $request->file('gambar')->store('assets/images/simulasi', 'public');
        }

        $kuis->update([
            'judul_praktikum' => $request->judul_praktikum,
            'materi_id' => $request->materi_id,
            'gambar' => $gambarPath,
            'simulasi' => $request->simulasi,
            'description' => $request->description,
        ]);

        return back()->with('success', 'Simulasi Praktikum/Latihan berhasil diubah.');
    }

    public function destroy(Praktikum $praktikum)
    {
        $praktikum->delete();
        return back()->with('success', 'Simulasi Latihan Berhasil dihapus');
    }
}

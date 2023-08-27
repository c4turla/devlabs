<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kuis;
use App\Models\Materi;

class KuisController extends Controller
{
    public function index()
    {
        $materiWithKuis = Materi::has('kuis')->with('kuis')->paginate(10);
        $materiWithoutKuis = Materi::doesntHave('kuis')->paginate(10);

        return view('admin.kuis.index', compact('materiWithKuis', 'materiWithoutKuis'));
    }

    public function tambah(Materi $materi)
    {
        $kuis = Kuis::where('materi_id', $materi->id)->get();
        return view('admin.kuis.tambah',compact('materi', 'kuis'));
    }

    public function storekuis(Request $request)
    {
        $request->validate([
            'gambar_soal' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);

        $gambarPath = null;

        if ($request->hasFile('gambar_soal')) {
            $gambarPath = $request->file('gambar_soal')->store('assets/images/soal', 'public');
        }

        Kuis::create([
            'soal' => $request->soal,
            'materi_id' => $request->materi_id,
            'gambar_soal' => $gambarPath,
            'pilihan_a' => $request->pilihan_a,
            'pilihan_b' => $request->pilihan_b,
            'pilihan_c' => $request->pilihan_c,
            'pilihan_d' => $request->pilihan_d,
            'pilihan_e' => $request->pilihan_e,
            'jawaban_benar' => $request->jawaban_benar,
            'skor' => $request->skor,
        ]);
        return back()->with('success', 'Soal Latihan berhasil ditambahkan.');
    }

    public function destroy(Kuis $kuis)
    {
        $kuis->delete();
        return back()->with('success', 'Soal Latihan Berhasil dihapus');
    }
}

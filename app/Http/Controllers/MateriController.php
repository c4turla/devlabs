<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materi;
use App\Models\Kelas;
use Illuminate\Support\Facades\Storage;

class MateriController extends Controller
{
    public function index()
    {
        $materis = Materi::orderBy('id', 'asc')->paginate(10);
        return view('admin.materi.index', compact('materis'));
    }

    public function create()
    {
        $kelass = Kelas::all();
        return view('admin.materi.create', compact('kelass'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'kelas' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
            'isi' => 'required', // Validasi gambar
        ]);

        $gambarPath = null;

        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('assets/images/materi', 'public');
        }

        Materi::create([
            'judul' => $request->judul,
            'kelas' => $request->kelas,
            'gambar' => $gambarPath,
            'isi' => $request->isi,
            'penulis' => $request->penulis,
        ]);
        return redirect()->route('admin.materi')->with('success', 'Materi berhasil ditambahkan.');
    }

    public function show(Materi $materi)
    {
        $kelas = Kelas::all();
        return view('admin.materi.show', compact('materi', 'kelas'));
    }

    public function edit(Materi $materi)
    {
        $kelas = Kelas::all();
        return view('admin.materi.edit', compact('materi', 'kelas'));
    }

    public function update(Materi $materi, Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'kelas' => 'required',
            'isi' => 'required',
        ]);

        // Mendapatkan path gambar lama
        $gambarPath = $materi->gambar;

        if ($request->hasFile('gambar')) {
            // Menghapus gambar lama jika ada
            if ($materi->gambar) {
                Storage::delete('public/' . $materi->gambar);
            }

            // Mengupload gambar baru
            $gambarPath = $request->file('gambar')->store('assets/images/materi', 'public');
        }

        $materi->update([
            'judul' => $request->judul,
            'kelas' => $request->kelas,
            'gambar' => $gambarPath,
            'isi' => $request->isi,
        ]);
        return redirect()->route('admin.materi')->with('success', 'Materi Berhasil diupdate');
    }

    public function destroy(Materi $materi)
    {
        $materi->delete();
        return redirect()->route('admin.materi')->with('success', 'Materi Berhasil dihapus');
    }
}

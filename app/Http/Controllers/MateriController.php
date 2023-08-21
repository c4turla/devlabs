<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materi;
use App\Models\Kelas;

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
            'isi' => 'required', // Validasi gambar
        ]);

        Materi::create([
            'judul' => $request->judul,
            'kelas' => $request->kelas,
            'isi' => $request->isi,
            'penulis' => $request->penulis,
        ]);
        return redirect()->route('admin.materi')->with('success', 'Materi berhasil ditambahkan.');
    }

    public function show(Materi $materi)
    {
        $kelas = Kelas::all();
        return view('admin.materi.show',compact('materi', 'kelas'));
    }

    public function edit(Materi $materi)
    {
        $kelas = Kelas::all();
        return view('admin.materi.edit',compact('materi', 'kelas'));
    }

    public function update(Materi $materi, Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'kelas' => 'required',
            'isi' => 'required', 
        ]);

        $materi->update([
            'judul' => $request->judul,
            'kelas' => $request->kelas,
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

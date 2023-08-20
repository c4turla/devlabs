<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelass = Kelas::orderBy('id', 'desc')->paginate(10);
        return view('admin.kelas.index', compact('kelass'));
    }

    public function create()
    {
        $kelass = Kategori::all();
        return view('admin.kelas.create', compact('kelass'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required',
            'kurikulum' => 'required',
            'description' => 'required',
        ]);

        Kelas::create([
            'nama_kelas' => $request->nama_kelas,
            'kurikulum' => $request->kurikulum,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.kelas')->with('success', 'Kelas berhasil ditambahkan.');
    }

    public function edit(Kelas $kelas)
    {
        $kategori = Kategori::all();
        return view('admin.kelas.edit',compact('kelas', 'kategori'));
    }

    public function update(Kelas $kelas, Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required',
           // 'k' => 'required',
            'description' => 'required',
        ]);
        $kelas->update([
            'nama_kelas' => $request->nama_kelas,
            'kurikulum' => $request->kurikulum,
            'description' => $request->description,
        ]);
        return redirect()->route('admin.kelas')->with('success', 'Kelas Berhasil diupdate');
    }

    public function destroy(Kelas $kelas)
    {
        $kelas->delete();
        alert()->success('Sukses!','Kelas Berhasil dihapus');
        return back();
    }
    
}

<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\KategoriArtikel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

use Alert;

class ArtikelController extends Controller
{
    //
    public function index()
    {
        $artikels = Artikel::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.artikel.index', compact('artikels'));
    }

    public function addartikel()
    {
        $kategoris = KategoriArtikel::all();
        return view('admin.artikel.create', compact('kategoris'));
    }

    public function storeartikel(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'kategori_id' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
            'deskripsi' => 'required',
        ]);

        $gambarPath = null;

        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('assets/images/artikel', 'public');
        }

        Artikel::create([
            'judul' => $request->judul,
            'kategori_id' => $request->kategori_id,
            'gambar' => $gambarPath,
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect()->route('admin.artikel')->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function show(Artikel $artikel)
    {
        $kategori = KategoriArtikel::all();
        return view('admin.artikel.show',compact('artikel', 'kategori'));
    }

    public function edit(Artikel $artikel)
    {
        $kategori = KategoriArtikel::all();
        return view('admin.artikel.edit',compact('artikel', 'kategori'));
    }

    public function update(Artikel $artikel, Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'kategori_id' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
            'deskripsi' => 'required',
        ]);

        // Mendapatkan path gambar lama
        $gambarPath = $artikel->gambar;

        if ($request->hasFile('gambar')) {
            // Menghapus gambar lama jika ada
            if ($artikel->gambar) {
                Storage::delete('public/' . $artikel->gambar);
            }

            // Mengupload gambar baru
            $gambarPath = $request->file('gambar')->store('assets/images/artikel', 'public');
        }

        $artikel->update([
            'judul' => $request->judul,
            'kategori_id' => $request->kategori_id,
            'gambar' => $gambarPath,
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect()->route('admin.artikel')->with('success', 'Artikel Berhasil diupdate');
    }

    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);
        if ($artikel->gambar) {
            Storage::disk('public')->delete($artikel->gambar);
        }
        $artikel->delete();
        alert()->success('Sukses!','Artikel berhasil dihapus.');
        return redirect()->route('admin.artikel');
    }

    public function storekategori(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        KategoriArtikel::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.tambahartikel')->with('success', 'Kategori berhasil ditambahkan.');
    }
}

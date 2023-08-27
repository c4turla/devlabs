<?php

namespace App\Http\Controllers;

use App\Models\Kategori;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $kategoris = Kategori::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.category.index', compact('kategoris'));
    }

    public function add()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        Kategori::create([
            'name' => $request->name,
            'enabled' => $request->enabled,
            'description' => $request->description,
            'sort_order' => '1',
        ]);

        return redirect()->route('admin.category')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit(Kategori $kategori)
    {
        return view('admin.category.edit',compact('kategori'));
    }

    public function destroy($id)
    {
        $artikel = Kategori::findOrFail($id);
        $artikel->delete();

        return redirect()->route('admin.category')->with('success', 'Kategori berhasil dihapus.');
    }
}

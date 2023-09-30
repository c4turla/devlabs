<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Kategori;
use App\Models\Materi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $article = Artikel::take(3)->get();
        $kategori = Kategori::with(['kelas.materi' => function($query) {
            $query->inRandomOrder()->limit(3);
        }])->get();
        $selectedMaterials = [];
        foreach ($kategori as $category) {
            foreach ($category->kelas as $class) {
                $selectedMaterials = array_merge($selectedMaterials, $class->materi->toArray());
            }
        }
        shuffle($selectedMaterials);
        $randomMaterials = array_slice($selectedMaterials, 0, 3);
        return view('site.home', compact('article','kategori','randomMaterials'));
    }

    public function about()
    {
        return view('site.about');
    }

    public function contact()
    {
        return view('site.contact');
    }

    public function category()
    {
        $kategori = Kategori::with('kelas.materi')->get();
        return view('site.category', compact('kategori'));
    }

    public function privacy()
    {
        return view('site.privacy');
    }

    public function blog()
    {
        $artikels = Artikel::orderBy('created_at', 'desc')->paginate(6);
        $randomArticleTitle = Artikel::inRandomOrder()->take(5)->get();
        return view('site.blog', compact('artikels', 'randomArticleTitle'));
    }

    public function showartikel(Artikel $artikel)
    {
       // $artikels = Artikel::findOrFail($id);
        $randomArticleTitle = Artikel::inRandomOrder()->take(5)->get();
        return view('site.blogshow', compact('artikel', 'randomArticleTitle'));
    }

    public function filterKelassep(Request $request)
    {
        $kelasIds = [1, 4]; // Daftar kelas yang ingin di-filter
        $materi = Materi::whereIn('kelas', $kelasIds)->get();

        return view('site.materi10', compact('materi'));
    }

    public function filterKelasseb(Request $request)
    {
        $kelasIds = [2, 5]; // Daftar kelas yang ingin di-filter
        $materi = Materi::whereIn('kelas', $kelasIds)->get();

        return view('site.materi11', compact('materi'));
    }

    public function filterKelasdua(Request $request)
    {
        $kelasIds = [3, 6]; // Daftar kelas yang ingin di-filter
        $materi = Materi::whereIn('kelas', $kelasIds)->get();

        return view('site.materi12', compact('materi'));
    }
}

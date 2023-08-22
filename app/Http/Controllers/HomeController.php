<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $article = Artikel::take(3)->get();
        return view('site.home', compact('article'));
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
        return view('site.category');
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
}

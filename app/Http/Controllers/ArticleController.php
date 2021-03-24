<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    public function create(){
        return view('create');
    }

    public function index()
    {
        $articles = Article::all();
        return view('index', compact('articles'));
    }

    public function store(Request $request)
    {
        // insert
        Article::create([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'jumlah' => $request->jumlah,
            'tahun' => $request->tahun
        ]);

        return redirect('/create');
    }

    public function edit($id)
    {
        $article = Article::find($id);
        return view('edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        Article::where('id', $id)
            ->update([
                'judul' => $request->judul,
                'penulis' => $request->penulis,
                'jumlah' => $request->jumlah,
                'tahun' => $request->tahun
            ]);
        
        return redirect('/');
    }

    public function destroy($id)
    {
        Article::destroy($id);
        return redirect('/');
    }
}

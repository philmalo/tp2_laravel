<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;

class ArticleController extends Controller
{
    public function __construct() {

        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $articles = Article::select()->orderBy('updated_at', 'desc')->paginate(20);
            return view('articles.index', ['articles' => $articles]);
        }
        return redirect(route('login'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validation = $request->validate([
            'titre' => 'required',
            'titre_fr' => 'required',
            'contenu' => 'required',
            'contenu_fr' => 'required'
        ]);

        $article = Article::create([
            'titre' => $request->titre,
            'titre_fr' => $request->titre_fr,
            'contenu' => $request->contenu,
            'contenu_fr' => $request->contenu_fr,
            'user_id' => Auth::user()->id
        ]);

        return redirect(route('articles.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        // var_dump($article);
        return view('articles.edit', ['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $validation = $request->validate([
            'titre' => 'required',
            'titre_fr' => 'required',
            'contenu' => 'required',
            'contenu_fr' => 'required'
        ]);

        $article->update([
            'titre' => $request->titre,
            'titre_fr' => $request->titre_fr,
            'contenu' => $request->contenu,
            'contenu_fr' => $request->contenu_fr
        ]);

        return redirect(route('articles.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect(route('articles.index'));
    }
}

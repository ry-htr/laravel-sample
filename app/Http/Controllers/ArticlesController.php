<?php

namespace App\Http\Controllers;

//use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use App\Http\Requests\ArticleRequest;
use Carbon\Carbon;

class ArticlesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $articles = Article::latest('published_at')->published()->get();
        return view('articles.index', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(ArticleRequest $request)
    {
        \Auth::user()->articles()->create($request->all());

        \Session::flash('flash_message', '記事を追加しました。');

        return redirect()->route('articles.index');
    }

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(Article $article, ArticleRequest $request)
    {
        $article->update($request->all());
        \Session::flash('flash_message', '記事を更新しました。');

        return redirect()->route('articles.show', [$article->id]);
    }

    public function destroy(Article $article)
    {
        $article->delete();
        \Session::flash('flash_message', '記事を削除しました。');

        return redirect()->route('articles.index');
    }
}

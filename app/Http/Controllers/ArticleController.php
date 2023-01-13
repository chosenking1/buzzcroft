<?php

namespace App\Http\Controllers;
use App\Models\Article;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //

    public function create()
    {
        return view('admin.add_article');
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'required|max:255',
        'author' => 'required|max:255',
        'date_published' => 'required|date',
        'article_body' => 'required',
    ]);

    $article = new Article;
    $article->title = $request->title;
    $article->author = $request->author;
    $article->date_published = $request->date_published;
    $article->article_body = $request->article_body;
    $article->save();

    return response()->json([
        'id' => $article->id,
        'title' => $article->title,
        'author' => $article->author,
        'date_published' => $article->date_published,
        'article_body' => $article->article_body,
    ]);
}

public function show(Article $article)
{
    $comments = $article->comments()->get();
    return view('articles.show', compact('article', 'comments'));
}



}

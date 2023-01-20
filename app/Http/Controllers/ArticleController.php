<?php

namespace App\Http\Controllers;
use App\Models\Article;
use App\Models\User;
use Goutte\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

public function search1($query)
{
    $client = new Client();
    $crawler = $client->request('GET', 'https://yourwebsite.com');
    $articles = $crawler->filter('article')->each(function ($node) use ($query) {
        if (strpos($node->text(), $query) !== false) {
            return [
                'title' => $node->filter('h2')->text(),
                'url' => $node->filter('a')->attr('href'),
                'excerpt' => $node->filter('p')->text(),
            ];
        }
    });

    $articles = array_filter($articles);

    return view('search', ['articles' => $articles, 'query' => $query]);
}

public function search(Request $request)
{
    $searchTerm = $request->input('searchTerm');
    $articles = Article::where('title', 'like', '%'.$searchTerm.'%')
        ->orWhere('article_body', 'like', '%'.$searchTerm.'%')
        ->get();
    return view('articles.search-results', compact('articles', 'searchTerm'));
}

public function destroy(Article $article)
{
    if(Auth::user()->isAdmin() || Auth::user()->isAuthor() && auth()->user()->id === $article->author_id) {
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Article deleted successfully');
    }
    else {
        return redirect()->back()->with('error', 'You are not authorized to delete this article');
    }
}

public function update(Request $request, Article $article)
{
    if(auth()->user()->isAdmin() || auth()->user()->isAuthor() && auth()->user()->id === $article->author_id) {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'date_published' => 'required|date',
            'article_body' => 'required',
        ]);
        $article->update($validatedData);
        return redirect()->route('articles.index')->with('success', 'Article updated successfully');
    }
    else {
        return redirect()->back()->with('error', 'You are not authorized to update this article');
    }
}

public function update(Article $article, Request $request)
{
    if(Auth::user()->isAdmin() || Auth::user()->id === $article->user_id){
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'date_published' => 'required|date',
            'article_body' => 'required',
        ]);

        $article->title = $request->title;
        $article->author = $request->author;
        $article->date_published = $request->date_published;
        $article->article_body = $request->article_body;
        $article->save();
        return redirect()->route('admin.articles')->with('status', 'Article updated successfully!');
    }
    return redirect()->back()->with('error', 'You are not authorized to perform this action');
}


}

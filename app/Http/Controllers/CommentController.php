<?php

namespace App\Http\Controllers;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;



class CommentController extends Controller
{
    //

    public function create_comment(Request $request)
    {
        $validatedData = $request->validate([
            'text' => 'required|max:255',
            'article_id' => 'required|exists:articles,id',
        ]);
    
        $article = Article::find($request->article_id);
        $comment = new Comment;
        $comment->text = $request->text;
        $comment->username = $request->username;
        $article->comments()->save($comment);
    
        return redirect('/articles/' . $article->id);
    }
}

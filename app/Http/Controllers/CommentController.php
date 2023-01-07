<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articles;
use App\Comments;


class CommentController extends Controller
{
    //

    public function create_comment(Request $request)
    {
        $validatedData = $request->validate([
            'text' => 'required|max:255',
            'article_id' => 'required|exists:articles,id',
        ]);
    
        $article = Articles::find($request->article_id);
        $comment = new Comments;
        $comment->text = $request->text;
        $comment->username = $request->username;
        $article->comments()->save($comment);
    
        return redirect('/articles/' . $article->id);
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class CommentController extends Controller
{
    //

    public function create_comment(Request $request)
    {
        $validatedData = $request->validate([
            'feedback' => 'required|max:255|min:1',
            'article_id' => 'required|exists:articles,id',
        ]);
    
       
        $comment = new Comment;
        $comment->feedback = $request->feedback;
        $comment->username = $request->username;
        $comment-> article_id = $request -> article_id;
        try{
            $comment->save();
            session()->flash('message', 'Your comment has been added successfully!');
            dd(session()->all());
            return redirect('/articles/' . $comment->article->id);
        }
        catch(\Exception $e){
            session()->flash('error', 'An error occurred while saving your comment. Please try again later.');
            dd(session()->all());
            return redirect()->back();
        }
            // $comment->save();

        // session()->flash('message', 'Comment created successfully!');
        // return redirect('/articles/' . $comment->article->id);
    }
}

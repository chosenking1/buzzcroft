<?php

namespace App\Models;
use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Comment extends Model
{

    protected $guarded = [];
    
    public function article()
    {
        return $this->belongsTo('App\Models\Article', 'article_id','article_id');
        // return $this->belongsTo(Article::class)->withPivot( 'created_by');

    }

    public function user()
    {
        return $this->belongsTo('App\User', 'username', 'username');
    }
    use HasFactory;
}

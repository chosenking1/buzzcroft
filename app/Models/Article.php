<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cohensive\Embed\Facades\Embed;

class Article extends Model
{
    // protected $fillable = [
    //     'title', 'author', 'date_published', 'article_body', 
    // ];

    protected $guarded = [];

    public function comments()
    {
        return $this->belongsToMany('App\Comment');
    }
    
    public function getVideoHtmlAttribute()
    {
        $embed = Embed::make($this->video_url)->parseUrl();

        if (!$embed)
            return '';

        $embed->setAttribute(['width' => 400]);
        return $embed->getHtml();
    }

    use HasFactory;
}

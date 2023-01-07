<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function comments()
    {
        return $this->belongsToMany('App\Comment');
    }
    
    use HasFactory;
}

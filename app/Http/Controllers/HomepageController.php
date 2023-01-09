<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Article;
use DB;


use Illuminate\Http\Request;

class HomepageController extends Controller
{

    public function index(){
    $articles = DB::table('articles')->orderBy('id', 'ASC')->limit(10)->get();
    // dd($articles);
    // echo $articles;
        return view('contents.homepage', compact('articles'));
}

}

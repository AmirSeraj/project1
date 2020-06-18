<?php

namespace App\Http\Controllers\front;

use App\frontmodels\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function index()
    {
        $articles = Article::orderBy('id','desc')->where('status',1)->paginate(8);
        return view('front.articles',compact('articles'));
    }

    public function show(Article $article)
    {
        $article->increment('hit');
        $comments_enteshar = $article->comments()->where('status',1)->orderBy('id','desc')->get();
        $comments_nonenteshar = $article->comments()->where('status',0)->get();
        return view('front.article',compact('article','comments_enteshar','comments_nonenteshar'));
    }

}

<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\Advertise;


class ArticleController extends Controller
{
    public function index(){

    $keyword = request()->keyword;

    if ($keyword) {
        $articles = Article::with('Category')
        ->whereStatus(1)
        ->where('title', 'like', '%' .$keyword. '%')
        ->latest()
        ->simplePaginate(4);
    }else{
        $articles = Article::with('Category')->whereStatus(1)->latest()->simplePaginate(8);
        

    }
        return view('front.article.index', [
            'articles' => $articles ,
            'categories' => Category::latest()->get(),
            'keyword' => $keyword ,
            'advertises' => Advertise::latest()->get(),
            'trendingNews' => Article::with('Category')->whereStatus(1)->orderBy('views')->take(6)->get()
        ]);
    }

    public function show($slug){
        return view('front.article.show', [
            'trendingNews' => Article::with('Category')->whereStatus(1)->orderBy('views')->take(6)->get(),
            'article' => Article::whereSlug($slug)->first(),
            'categories' => Category::latest()->get(),
            'advertises' => Advertise::latest()->get()
        ]);
    }
}


// 'latest_get' => Article::whereSlug($slug)->first(),
//             'latest_post'=> Article::whereSlug($slug)->first(),
//             'popular_article' => Article::whereSlug($slug)->first(),
//             'advertiseArticle' => Article::whereSlug($slug)->first(),
//             'trendingNews' => Article::whereSlug($slug)->first(),

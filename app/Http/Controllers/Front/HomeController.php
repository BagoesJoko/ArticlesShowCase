<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\Advertise;

class HomeController extends Controller
{
    public function index(){
        return view('front.home.index', [
            'latest_post' => Article::with('Category')->whereStatus(1)->latest()->first(),
            'latest_get' => Article::with('Category')->whereStatus(1)->latest()->take(2)->get(),
            'articles' => Article::with('Category')->whereStatus(1)->latest()->simplePaginate(16),
            'categories' => Category::orderBy('name')->get(),
            'popular_article' => Article::with('Category')->whereStatus(1)->orderBy('views')->take(4)->get(),
            'advertiseArticle' => Article::with('Category')->whereStatus(1)->whereCategory_id(3)->take(2)->get(),
            'trendingNews' => Article::with('Category')->whereStatus(1)->orderBy('views')->take(6)->get(),
            'advertises' => Advertise::latest()->get()
        ]);
        
    }
}

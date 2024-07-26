<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;

class DashboardController extends Controller
{
    //
    public function index(){
    	return view('back.dashboard.index',[
    		'total_article' => Article::count(),
    		'total_categories' => Category::count(),
    		'latest_article' => Article::with('Category')->whereStatus(1)->latest()->take(5)->get(),
    		'popular_article' => Article::with('Category')->whereStatus(1)->orderBy('views', 'desc')->take(5)->get()
    	]);
    }
}

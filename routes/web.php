<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\CategoryController;
use App\Http\Controllers\Back\ArticleController;
use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Back\UserController;
use App\Http\Middleware\UserAccess;
use App\Http\Controllers\Back\AdvertiseController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ArticleController as FrontArticleController;


//  Route::get('/', function () {
//      return view('welcome');
// });
Route::get('/', [HomeController::class, 'index']);
Route::get('/p/{slug}', [FrontArticleController::class, 'show']);
Route::get('/articles', [FrontArticleController::class, 'index']);
Route::post('/articles/search', [FrontArticleController::class, 'index'])->name('search');

Route::middleware('auth')->group(function(){
	Route::resource('advertise', AdvertiseController::class);
	Route::get('dashboard', [App\Http\Controllers\Back\DashboardController::class, 'index']);

	Route::resource('/article', ArticleController::class);

	Route::resource('/categories', CategoryController::class)->middleware('userakses:1');

	Route::resource('users', UserController::class)->middleware('userakses:1');


	 Route::group(['prefix' => 'laravel-filemanager'], function () {\UniSharp\LaravelFilemanager\Lfm::routes();
	 });
 
});
Auth::routes();

// route radirect default login dari bootstarpui 
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


	// Route::resource('/categories', CategoryController::class) -> only([
	// 	'index', 'store', 'update', 'destroy'
	// ])->middleware('userakses:1');
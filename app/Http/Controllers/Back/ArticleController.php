<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use App\Request\AdvertiseRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax())
        {
            $article = Article::with('Category')->orderBy('id', 'DESC')->get();
            return DataTables::of($article)

            //custom colum
            ->addColumn('category_id', function($article){
                return $article->Category->name;
            })
            ->addIndexColumn()
            ->addColumn('status', function($article){
                if ($article->status == 0) {
                       return '<span class="badge bg-danger">Private</span>';
                   }
                else {
                       return '<span class="badge bg-success">Published</span>';
                   }
            })   
            ->addColumn('button', function($article){
                return '<div class="text-center">
                        <a href="/article/'.$article->id.'" class="btn btn-secondary">Detail</a>
                        <a href="/article/'.$article->id.'/edit" class="btn btn-primary">Edit</a>
                        <a href="#" onclick="deleteArticle(this)" data-id="'.$article->id.'" class="btn btn-danger">Delete</a>
                </div>';
            })             
            //panggil costum colum
            ->rawColumns(['category_id', 'status', 'button'])
            ->make();
        }
        return view('back.article.index');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.article.create',[
            'categories' => Category::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
       $data = $request -> validated();
        
        $file = $request -> file('img'); //foto
        $filename = uniqid().'.'.$file->getClientOriginalExtension(); //ekstensi png, jpeg dll
        $file -> storeAs('public\back', $filename); //public/back/contoh.jpeg

        $data['img'] = $filename;
        $data['slug'] = Str::slug($data['title']);
        Article::create($data);
        return redirect(url('article'))->with('success', 'Data Article has been created');
        
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('back.article.show', [
            'article'  => Article::find($id)
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('back.article.update',[
            'article'       => Article::find($id),
            'categories'    => Category::get()
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, string $id)
    {
        $data = $request -> validated();
        if ($request->hasFile('img')) {
            $file = $request -> file('img'); //foto
            $filename = uniqid().'.'.$file->getClientOriginalExtension(); //ekstensi png, jpeg dll
            $file -> storeAs('public\back', $filename); //public/back/contoh.jpeg

            //unlink img / delete img
            Storage::delete('public/back'.$request->oldImg);

            $data['img'] = $filename;
        }else {
            $data['img'] = $request->oldImg;
        }
        
        $data['slug'] = Str::slug($data['title']);
        Article::find($id)->update($data);
        return redirect(url('article'))->with('success', 'Data Article has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Article::find($id);
        Storage::delete('public/back/'.$data->img);
        $data->delete();
        return response()->json([
            'message'=> 'data article has been deleted'
        ]);

    }
}

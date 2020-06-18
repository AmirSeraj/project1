<?php

namespace App\Http\Controllers\back;

use \Cviebrock\EloquentSluggable\Services\SlugService;
use App\Article;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $articles = Article::orderBy('id','desc')->paginate(5);
        return view('back.articles.articles',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all()->pluck('title','id');
        return view('back.articles.articleCreate',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $validatedData=$request->validate([
            'title'=>'required',
//            'slug'=>'required|unique:articles',
            'description'=>'required',
        ]);

        $article = new Article();

        if (empty($request->slug)){
            $slug = SlugService::createSlug(Article::class, 'slug', $request->title);
        }else{
            $slug = SlugService::createSlug(Article::class, 'slug', $request->slug);
        }

        $request->merge(['slug'=>$slug]);

        try {
            $article = $article->create($request->all());
            $article->categories()->attach($request->categories);
        }catch (Exception $exception){
            return redirect(route('admin.articles.create'))->with('warning',$exception->getCode());
        }
        $msg = 'ذخیره با موفقیت انجام شد.';
        return redirect(route('admin.articles'))->with('success',$msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
        $categories = Category::all()->pluck('title','id');
        return view('back.articles.articleEdit',compact('article','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
        $validatedData=$request->validate([
            'title'=>'required',
//            'slug'=>'required',
            'description'=>'required',
        ]);


        if (empty($request->slug)){
            $slug = SlugService::createSlug(Article::class, 'slug', $request->title);
        }else{
            $slug = SlugService::createSlug(Article::class, 'slug', $request->slug);
        }

        $request->merge(['slug'=>$slug]);


        try {
            $article->update($request->all());
            $article->categories()->sync($request->categories);
        }catch (Exception $exception){
            return redirect()->back()->with('warning',$exception->getCode());
        }
        $msg = 'ویرایش با موفقیت انجام شد.';
        return redirect(route('admin.articles'))->with('success',$msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
        $article->delete();
        $msg = 'حذف با موفقیت انجام شد.';
        return redirect(route('admin.articles'))->with('success',$msg);
    }

    public function updateStatus(Article $article)
    {
        if ($article->status==1){
            $article->status=0;
        }else{
            $article->status=1;
        }
        $article->save();
        $msg='بروز رسانی با موفقیت انجام شد.';
        return redirect()->back()->with('success',$msg);
    }
}

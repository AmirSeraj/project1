<?php

namespace App\Http\Controllers\back;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::orderBy('id','desc')->paginate(3);
        return view('back.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('back.category.categoryCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Category $category)
    {
        //
        $messages=[
            'title.required'=>'فیلد عنوان را وارد کنید.',
            'slug.required'=>'فیلد نام مستعار را وارد کنید.',
            'slug.unique'=>'فیلد نام مستعار تکراری است.',
        ];
        $validatedData=$request->validate([
            'title'=>'required',
            'slug'=>'required|unique:categories'
        ],$messages);

        $category->title = $request->title;
        $category->slug = $request->slug;

        try {
            $category->save();
        }catch (Exception $exception){
            switch ($exception->getCode()){}
            return redirect()->back()->with('warning',$exception->getCode());
        }
        $msg = 'ذخیره با موفقیت انجام شد.';
        return redirect(route('admin.categories'))->with('success',$msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
        return view('back.category.categoryEdit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
        $messages=[
            'title.required'=>'فیلد عنوان را وارد کنید.',
            'slug.required'=>'فیلد نام مستعار را وارد کنید.',
            'slug.unique'=>'فیلد نام مستعار تکراری است.',
        ];

        $validatedData=$request->validate([
            'title'=>'required',
            'slug'=>'required'
        ],$messages);

        $category->title = $request->title;
        $category->slug = $request->slug;

        try {
            $category->save();
        }catch (Exception $exception){
            return redirect()->back()->with('warning',$exception->getCode());
        }

        $msg='ویرایش با موفقیت انجام شد.';
        return redirect(route('admin.categories'))->with('success',$msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        $category->delete();
        $msg = 'حذف با موفقیت انجام شد.';
        return redirect()->back()->with('success',$msg);
    }
}

<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\portfolio;
use Illuminate\Http\Request;
use Exception;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $portfolios = portfolio::orderBy('id','desc')->paginate(5);
        return view('back.portfolios.portfolios',compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('back.portfolios.createPortfolio');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,portfolio $portfolio)
    {
        //
        $messages=[
            'name.required'=>'فیلد عنوان نمونه کار را وارد کنید.',
            'description.required'=>'فیلد توضیحات را وارد کنید.',
            'link.required'=>'فیلد لینک نمونه کار را وارد کنید.',
            'tag.required'=>'فیلد تگ نمونه کار را وارد کنید.',
            'image.required'=>'فیلد تصویر نمونه کار را وارد کنید.',
        ];
        $validatedData=$request->validate([
            'name'=>'required',
            'description'=>'required',
            'link'=>'required',
            'tag'=>'required',
            'image'=>'required|unique:portfolios'
        ],$messages);

        $portfolio->name = $request->name;
        $portfolio->description = $request->description;
        $portfolio->link = $request->link;
        $portfolio->image = $request->image;
        $portfolio->tag = $request->tag;


        try {
            $portfolio->save();
        }catch (Exception $exception){
            switch ($exception->getCode()){}
            return redirect()->back()->with('warning',$exception->getCode());
        }
        $msg = 'ذخیره نمونه کار جدید با موفقیت انجام شد.';
        return redirect(route('admin.portfolios'))->with('success',$msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function show(portfolio $portfolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit(portfolio $portfolio)
    {
        //
        return view('back.portfolios.editPortfolio',compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, portfolio $portfolio)
    {
        //
        $messages=[
            'name.required'=>'فیلد عنوان نمونه کار را وارد کنید.',
            'description.required'=>'فیلد توضیحات را وارد کنید.',
            'link.required'=>'فیلد لینک نمونه کار را وارد کنید.',
            'tag.required'=>'فیلد تگ نمونه کار را وارد کنید.',
            'image.required'=>'فیلد تصویر نمونه کار را وارد کنید.',
        ];
        $validatedData=$request->validate([
            'name'=>'required',
            'description'=>'required',
            'link'=>'required',
            'tag'=>'required',
            'image'=>'required'
        ],$messages);

        try {
            $portfolio->update($request->all());
        }catch (Exception $exception){
            return redirect(route('admin.portfolio.edit'))->with('warning',$exception->getCode());
        }

        $msg = 'ویرایش با موفقیت انجام شد.';
        return redirect(route('admin.portfolios'))->with('success',$msg);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(portfolio $portfolio)
    {
        //
        $portfolio->delete();
        $msg = 'حذف با موفقیت انجام شد.';
        return redirect(route('admin.portfolios'))->with('success',$msg);
    }
}

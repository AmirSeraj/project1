<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\frontmodels\Comment;
use App\frontmodels\Article;
use App\Mail\CommentSent;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    public function store(Article $article , Request $request)
    {
        //
        $validatedData=$request->validate([
            'name'=>'required',
            'email'=>'required',
            'body'=>'required',
            recaptchaFieldName() => recaptchaRuleName()
        ]);

        $article->comments()->create([
            'name'=>$request->name,
            'email'=>$request->email,
            'body'=>$request->body,
        ]);


        Mail::to($request->email)->send(new CommentSent($request,$article));

        $msg = 'نظر شما با موفقیت ثبت گردید.پس از تایید مدریت منتشر می گردد.';
        return redirect()->back()->with('success',$msg);
    }

}

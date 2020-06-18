<?php

namespace App\Http\Controllers\front;

use App\frontmodels\Message;
use App\Http\Controllers\Controller;
use App\frontmodels\Portfolio;
use App\frontmodels\Article;
use Illuminate\Http\Request;
use Exception;

class HomeController extends Controller
{

    public function index()
    {
        //
        $portfolios = Portfolio::orderBy('id','desc')->get();
        $tags = $portfolios->unique('tag');
        return view('front.index',compact('portfolios','tags'));
    }

    public function show()
    {
        //
    }

    public function store(Message $message,Request $request)
    {
        $messages = [
            'name.required'=>'please fill your name field',
            'email.required'=>'please fill your email field',
            'subject.required'=>'please fill your subject field',
            'message.required'=>'please fill your message field',
        ];
        $validatedData = $request->validate([
            'name'=>'required',
            'email'=>'required',
            'subject'=>'required',
            'message'=>'required',
        ],$messages);

        $message->name = $request->name;
        $message->email = $request->email;
        $message->subject = $request->subject;
        $message->message = $request->message;

        try {
            $message->save();
        }catch (Exception $exception){
            return redirect()->back()->with('warning',$exception->getCode());
        }
        $msg = 'پیام شما با موفقیت ارسال گردید.';
        return redirect(route('index'))->with('success',$msg);
    }
}

<?php

namespace App\Http\Controllers\back;

use App\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{

    public function index()
    {
        //
        $payams = Message::orderBy('id','desc')->paginate(5);
        return view('back.messages.messages',compact('payams'));
    }

    public function destroy(Message $message)
    {
        //
        $message->delete();
        $msg = 'حذف با موفقیت انجام شد.';
        return redirect()->back()->with('success',$msg);
    }
}

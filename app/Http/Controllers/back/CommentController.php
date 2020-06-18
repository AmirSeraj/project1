<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\comment;
use Illuminate\Http\Request;
use Exception;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $comments = Comment::orderBy('id','desc')->paginate(10);
        return view('back.comments.comments',compact('comments'));
    }

    public function edit(comment $comment)
    {
        //
        return view('back.comments.editComment',compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\comment  $r
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, comment $comment)
    {
        //
        $validatedData = $request->validate([
            'body'=>'required',
            'email'=>'required',
        ]);
        try {
            $comment->update($request->all());
        }catch (Exception $exception){
            return redirect(route('admin.comment.edit'))->with('warning',$exception->getCode());
        }
        $msg = 'ویرایش نظر با موفقیت انجام شد.';
        return redirect(route('admin.comments'))->with('success',$msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\comment  $r
     * @return \Illuminate\Http\Response
     */
    public function destroy(comment $comment)
    {
        //
        $comment->delete();
        $msg = 'حذف نظر با موفقیت انجام شد.';
        return redirect(route('admin.comments'))->with('success',$msg);
    }

    public function updateStatus(comment $comment)
    {
        if ($comment->status==0){
            $comment->status=1;
        }else{
            $comment->status=0;
        }
        $comment->save();
        return redirect()->back();
    }
}

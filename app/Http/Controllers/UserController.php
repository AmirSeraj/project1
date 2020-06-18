<?php

namespace App\Http\Controllers;

use App\frontmodels\Message;
use Illuminate\Http\Request;
use App\frontmodels\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Exception;
use function Composer\Autoload\includeFile;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        //
        $messages = DB::table('messages')->where('email',$user->email)->get();
        $messagesCount = $messages->count();
        return view('front.profile.profile',compact('user','messages','messagesCount'));
    }

    public function edit(User $user)
    {
        //
        $title = 'ویرایش پروفایل';
        return view('front.profile.editProfile',compact('title','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //

        $messages = [
            'title.required'=>'فیلد نام و نام خانوادگی را وارد کنید.',
            'title.unique'=>'فیلد نام و نام خانوادگی تکراری است.فیلد نام و نام خانوادگی را عوض کنید.',
            'email.required'=>'فیلد ایمیل را وارد کنید.',
            'email.unique'=>'فیلد ایمیل نمی تواند تکراری باشد.',
            'phone.required'=>'فیلد تلفن همراه را وارد کنید.',
            'password'=>'min:8',
            'password_confirmation'=>'min:8',
        ];

        if (!empty($request->password)){
            $validatedData=$request->validate([
                'name'=>'required',
                'email'=>'required',
                'phone'=>'required',
            ],$messages);
            $password = Hash::make($request->password);
            $user->password = $password;
        }else{
            $validatedData=$request->validate([
                'name'=>'required',
                'email'=>'required',
                'phone'=>'required',
            ],$messages);
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        try {
            $user->save();
        }catch (Exception $exception){
            switch ($exception->getCode()){}
            return redirect()->back()->with('warning',$exception->getCode());
        }
        $msg = 'ویرایش پروفایل با موفقیت انجام شد.';
        return redirect(route('index'))->with('success',$msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

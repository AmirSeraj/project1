<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Exception;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::orderBy('id','desc')->paginate(2);
        return view('back.main',compact('users'));
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        //
        return view('back.users.editprofile',compact('user'));
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
        $user->role = $request->role;
        try {
            $user->save();
        }catch (Exception $exception){
            return redirect()->back()->with('warning',$exception->getCode());
        }
        $msg = 'ویرایش با موفقیت انجام شد.';
        return redirect(route('admin.users'))->with('success',$msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        $user->delete();
        $msg = 'عملیات حذف با موفقیت انجام شد.';
        return redirect()->back()->with('success',$msg);
    }

    public function updateUser(User $user)
    {
        if ($user->status==1){
            $user->status=0;
        }else{
            $user->status=1;
        }
        $user->save();
        return redirect(route('admin.users'));
    }
}

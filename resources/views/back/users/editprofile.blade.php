@extends('back.index')
@section('title')
    ویرایش کاربر
@endsection
@section('profile')

    <style>
        select[name=role] {
            width: 300px;
            display: block;
            font-size: 11pt;
        }

        select[name=role] option {
            font-size: 11pt;
        }
        #back{
            float: left;
        }
    </style>

    <div class="main-panel">

        <div class="content-wrapper">
            <div class="row page-title-header">
                <div class="col-12">
                    <div class="page-header">
                        <h4 class="page-title">فرم ویرایش پروفایل</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-10 grid-margin stretch-card">
                    <div class="card">
                        <form action="{{route('admin.profile.update',$user->id)}}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>نام و نام خانوادگی : </label>
                                    <label>{{$user->name}}</label>
                                </div>
                                <div class="form-group">
                                    <label>ایمیل : </label>
                                    <label for="">{{$user->email}}</label>
                                </div>
                                <div class="form-group">
                                    <label>تلفن همراه : </label>
                                    <label for="">{{$user->phone}}</label>
                                </div>
                                <div class="form-group">
                                    <label>نقش کاربری : </label>
                                    <select name="role" class="form-control">
                                        <option value="1" @if($user->role==1) selected @endif>مدیر سایت</option>
                                        <option value="2" @if($user->role==2) selected @endif>کاربر عادی سایت</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>وضعیت : </label>
                                    <label for="">
                                        @if($user->status==1)
                                            <span style="color: green">کاربر فعال</span>
                                        @else
                                            <span style="color: red">کاربر غیر فعال</span>
                                        @endif
                                    </label>
                                </div>
                                <hr>
                                <input type="submit" value="ثبت ویرایش" class="btn btn-success">
                                <a id="back" href="{{route('admin.users')}}" class="btn btn-info btn-success">بازگشت</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <hr>



@endsection

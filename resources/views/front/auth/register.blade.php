@extends('front.layout')
@section('title')
    <title>ثبت نام کاربر</title>
@endsection

<style>
    #header{
        border-bottom: 1px solid #eee;
    }
    .box {
        width: 70%;
        margin: 20px auto 30px auto;
        border: 1px solid #eee;
        border-radius: 5px;
        padding: 20px;
        background-color: #f0f0f0;
        box-shadow: 2px 2px 2px rgba(0,0,0,0.2);
    }
    label{
        margin-right: 5px;
    }
    #register{
        margin-top: 111px;
    }
</style>

@section('content')

    <div class="container" id="register">

        <nav aria-label="breadcrumb" id="nav">
            <ol class="breadcrumb bgcolor">
                <li class="breadcrumb-item"><a href="{{route('index')}}">خانه</a></li>
                <li class="breadcrumb-item" aria-current="page"><a>ثبت نام</a></li>
            </ol>
        </nav>

        <div class="box">
            <form dir="rtl" method="post" action="{{route('register')}}">
                {{csrf_field()}}
                <h4>فرم ثبت نام</h4>
                <div class="form-group">
                    <label for="exampleInputEmail1">نام و نام خانوادگی</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value="{{old('name')}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">ایمیل</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{old('email')}}">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">تلفن</label>
                    <input type="tel" class="form-control" id="exampleInputPassword1" name="phone" value="{{old('phone')}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">پسورد</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">تایید پسورد</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password_confirmation">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">ثبت نام</button>
            </form>
        </div>
    </div>
@endsection

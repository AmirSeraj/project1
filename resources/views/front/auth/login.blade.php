@extends('front.layout')
@section('title')
    <title>ورود کاربر</title>
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
                <li class="breadcrumb-item" aria-current="page"><a>ورود کاربر</a></li>
            </ol>
        </nav>

        <div class="box">
            <form dir="rtl" method="post" action="{{route('login')}}">
                {{csrf_field()}}
                <h4>فرم ورود کاربر</h4>
                <div class="form-group">
                    <label for="exampleInputEmail1">ایمیل</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{old('email')}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">پسورد</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">ورود</button>
            </form>
        </div>
    </div>
@endsection

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>پروفایل کاربری</title>
    <link rel="stylesheet" href="{{url('/front/css/app.css')}}">
</head>
<body>

<div class="container" dir="rtl">
    <nav aria-label="breadcrumb" id="nav">
        <ol class="breadcrumb bgcolor">
            <li class="breadcrumb-item"><a href="{{route('index')}}">خانه</a></li>
            <li class="breadcrumb-item" aria-current="page"><a>پروفایل کاربر {{$user->name}}</a></li>
        </ol>
    </nav>
</div>

<style>
    .box {
        padding: 15px;
        width: 700px;
        height: auto;
        margin: 30px auto;
        border-radius: 5px;
        border: 1px solid #eee;
        background-color: #f0f0f0;
        box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.2);
    }
    h4{
        text-align: center;
    }
</style>



<div class="box" dir="rtl">
    <form method="post" action="{{route('profileUser.update',$user->id)}}">
        {{csrf_field()}}
        <h4>ویرایش پروفایل کاربر {{$user->name}}</h4>
        <div class="form-group">
            <label for="exampleInputEmail1">نام و نام خانوادگی</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name"
                   value="{{$user->name}}">
            @error('name')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">ایمیل</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email"
                   value="{{$user->email}}">
            @error('email')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">تلفن</label>
            <input type="tel" class="form-control" id="exampleInputPassword1" name="phone" value="{{$user->phone}}">
            @error('phone')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">پسورد</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            @error('password')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">تایید پسورد</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password_confirmation">
            @error('password_confirmation')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">ثبت اطلاعات</button>
        <a href="{{route('ProfileUser',$user->id)}}" class="btn btn-warning">بازگشت</a>
    </form>
</div>

</body>
</html>

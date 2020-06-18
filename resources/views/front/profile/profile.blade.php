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

    h4 {
        text-align: center;
    }

    .form-group label:nth-child(2) {
        color: red;
    }

    .form-group .message {
        width: 98%;
        min-height: 100px;
        height: auto;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 10px;
        margin-bottom: 5px;
        box-shadow: 2px 2px 2px rgba(0,0,0,0.2);
    }

    .date {
        width: 360px;
        height: 35px;
        border: 1px solid #ccc;
        border-radius: 5px;
        text-align: center;
        line-height: 33px;
        display: inline-block;
        float: right;
        margin-bottom: 5px;
    }

    .date1 {
        width: 250px;
        margin-right: 10px;
    }

    .red {
        color: red;
    }
</style>


<div class="box" dir="rtl">
    {{csrf_field()}}
    <h4>پروفایل کاربر{{$user->name}}</h4>
    <div class="form-group">
        <label for="exampleInputEmail1">نام و نام خانوادگی : </label>
        <label>{{$user->name}}</label>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">ایمیل : </label>
        <label>{{$user->email}}</label>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">تلفن : </label>
        <label>{{$user->phone}}</label>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">تعداد پیام های شما : </label>
        <label>{{$messagesCount}}</label>
    </div>
    <div class="form-group">
        <label> پیامهای شما : </label>
        @foreach($messages as $message)
            <div class="message">
                <div class="date">این پیام در تاریخ <span
                        class="red">{!! jdate($message->created_at)->format('%Y-%m-%d | H:i:s') !!}</span> منتشر شده
                    است.
                </div>
                <div class="date date1">موضوع پیام : <span class="red">{{$message->subject}}</span></div>
                <label>متن پیام شما : </label>
                <label class="red">{{$message->message}}</label>
            </div>
        @endforeach
    </div>
    <a href="{{route('ProfileEdit',$user->id)}}" class="btn btn-success">ویرایش پروفایل کاربری</a>
</div>

</body>
</html>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>فعال سازی حساب کاربری</title>
    <link rel="stylesheet" href="{{url('/front/css/app.css')}}">
</head>
<body>

@include('messages.successMessage')

<div class="container p-xl-5">
    <div class="card">
        <div class="card-body">
            برای فعال سازی حساب کاربری خود روی دکمه زیر کلیک کنید تا ایمیل فعال سازی برای شما ارسال گردد.
            <hr>
            <form action="{{route('verification.resend')}}" method="post">
                @csrf
                <button class="btn btn-success">ارسال ایمیل فعال سازی</button>
            </form>
        </div>
    </div>
</div>

<script src="{{url('/front/js/app.js')}}"></script>

</body>
</html>




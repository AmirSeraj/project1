
<style>
    .message{
        position: absolute;
        width: 70%;
        z-index: 10;
        left: 0;
        right: 0;
        margin: auto;
        text-align: center;
        top: 30px;
    }
</style>

@if(session('success'))

    <div class="message alert alert-success">
        {{session('success')}}
    </div>

@endif

@if(session('resent'))

    <div class="message alert alert-success">ایمیل با موفقیت به حساب کاربری شما ارسال گردید. ایمیل خود را بررسی کنید و روی لینک فعال سازی حساب کاربری کلیک نمایید.</div>

@endif

@if($errors->any())
    <div class="message alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                {{$error}}
                <br>
            @endforeach
        </ul>
    </div>
@endif

<script>
    function alert() {
        $('.message').fadeOut(200);
    }

    setTimeout(alert, 7000);
    alert();
</script>

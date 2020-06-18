@extends('back.index')

@section('content')

    <style>
        .title {
            padding: 30px;
        }

        .payam {
            width: 95%;
            height: auto;
            min-height: 150px;
            border: 1px solid #fff;
            background-color: #fff;
            border-radius: 5px;
            margin: 15px 0;
            box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.2);
        }

        .payam .date {
            width: 300px;
            padding: 0 10px;
            height: 40px;
            border: 1px solid red;
            border-radius: 5px;
            margin: 10px 20px;
            text-align: center;
            display: inline-block;
            line-height: 36px;
        }

        .margin {
            margin: 0 10px;
        }
        .payam .matn{
            display: block;
            width: 95%;
            margin: auto;
        }
        .payam .icon{
            float: left;
            margin: 10px 0 0 10px;
        }
    </style>

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row page-title-header">
                <div class="col-12">
                    <div class="page-header">
                        <h4>پنل مدیریت / مدریت پیام ها</h4>
                    </div>
                </div>
            </div>

            @foreach($payams as $payam)
                <div class="payam">
                    <a class="icon btn btn-danger" href="{{route('admin.messages.delete',$payam->id)}}">حذف پیام</a>
                    <div class="date">
                        {!! jdate($payam->created_at)->format('%Y-%m-%d'.' | '.'H:i:s') !!}
                        <span class="margin">|</span>
                        {{$payam->name}}
                    </div>
                    <span>موضوع پیام :  </span>
                    <span style="color: red">{{$payam->subject}}</span>
                    <span class="margin">|</span>
                    <span>ایمیل کاربر : </span>
                    <span style="color: red">{{$payam->email}}</span>

                    <span class="matn">{{$payam->message}}</span>

                </div>
            @endforeach

        </div>
    </div>

@endsection

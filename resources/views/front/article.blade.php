@extends('front.layout')

@section('title')
    <title>مطلب شماره {{$article->id}}</title>
@endsection

<style>
    #register {
        margin-top: 110px;
    }

    .color {
        color: red;
    }

    .row {
        padding: 10px 30px !important;
        background-color: #f0f0f0;
        border-radius: 5px;
        font-family: "Adobe Arabic";
        font-size: 15pt;
        width: 98%;
        margin: 20px auto !important;
        box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.2);
    }

    .row p {
        width: 100%;
        display: block;
    }

    .comment {
        width: 98%;
        position: relative;
        margin: 20px auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    #nazar {
        width: 360px;
        height: 40px;
        border-radius: 5px;
        padding: 10px;
        position: absolute;
        left: 10px;
        bottom: 30px;
        margin-left: 10px;
    }
    .message{
        top: 40px!important;
    }
</style>

@section('content')

    <div class="message">
        @include('messages.successMessage')
    </div>

    <div id="register" class="container">
        <nav aria-label="breadcrumb" id="nav">
            <ol class="breadcrumb bgcolor">
                <li class="breadcrumb-item"><a href="{{route('index')}}">خانه</a></li>
                <li class="breadcrumb-item"><a href="{{route('front.articles')}}">مطالب</a></li>
                <li class="breadcrumb-item" aria-current="page"><a>{{$article->title}}</a></li>
            </ol>
        </nav>

        <h3>عنوان مطلب : <span class="color">{{$article->title}}</span> | مطلب شماره {{$article->id}}</h3>
        <h4>نویسنده : <span class="color">{{$article->user->name}}</span> | تاریخ : <span
                class="color">{!! jdate($article->created_at)->format('%d-%B-%Y') !!}</span></h4>
        <hr>

        <div class="row">
            {!! $article->description !!}
        </div>

        <hr>

        <div class="comment">
            <hr>
            <div>
                <h4>فرم ارسال نظر</h4>
                <form action="{{route('comment.store',$article->slug)}}" method="post">
                    @csrf

                    @auth
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>نام :</label>
                                <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label>ایمیل :</label>
                                <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}" readonly>
                            </div>
                            <div class="form-group col-md-12">
                                <label>متن نظر : (نظرات حاوی عبارات توهین آمیز منتشر نخواهد شد.)</label>
                                <textarea class="form-control" name="body"></textarea>
                            </div>

                            <div class="form-group col-md-12">
                                <label>تصویر امنیتی</label>
                                {!! htmlFormSnippet() !!}
                            </div>

                            <button type="submit" class="btn btn-success">ثبت نظر</button>
                            <div id="nazar">
                                <span>انتشار یافته : {{sizeof($comments_enteshar)}}</span>
                                <span class="p-3">|</span>
                                <span class="color">غیر قابل انتشار : {{sizeof($comments_nonenteshar)}}</span>
                            </div>
                        </div>
                    @else
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>نام :</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="form-group col-md-6">
                                <label>ایمیل :</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            <div class="form-group col-md-12">
                                <label>متن نظر : (نظرات حاوی عبارات توهین آمیز منتشر نخواهد شد.)</label>
                                <textarea class="form-control" name="body"></textarea>
                            </div>

                            <div class="form-group col-md-12">
                                <label>تصویر امنیتی</label>
                                {!! htmlFormSnippet() !!}
                            </div>

                            <button type="submit" class="btn btn-success">ثبت نظر</button>
                            <div id="nazar">
                                <span>انتشار یافته : {{sizeof($comments_enteshar)}}</span>
                                <span class="p-3">|</span>
                                <span class="color">غیر قابل انتشار : {{sizeof($comments_nonenteshar)}}</span>
                            </div>
                        </div>
                    @endauth

                </form>
            </div>
        </div>

        <hr>

        <style>
            .commentShow {
                width: 95%;
                border: 1px solid #eee;
                border-radius: 5px;
                margin: 10px auto;
                min-height: 120px;
            }

            .commentShow .name {
                padding: 0 15px;
                width: 290px;
                font-size: 10.5pt;
                height: 30px;
                border-radius: 5px;
                border: 1px solid forestgreen;
                margin: 10px;
                line-height: 28px;
                text-align: center;
            }

            .commentShow .matn_nazar {
                padding: 5px 10px;
                font-size: 11pt;
            }

            .name .nameUser {
                float: right;
                color: red;
            }
        </style>

        <h4>نظرات کاربران</h4>

        @foreach($comments_enteshar as $comment)
            <div class="commentShow">
                <div class="name"><span class="nameUser">{{$comment->name}}</span> <span
                        class="p-2">|</span> {!! jdate($comment->created_at)->format('%d/%m/%Y - H:i') !!} </div>
                <div class="matn_nazar">متن نظر : {{$comment->body}}</div>
            </div>
        @endforeach

    </div>

@endsection

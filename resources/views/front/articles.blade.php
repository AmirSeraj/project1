@extends('front.layout')
@section('title')
    <title>مطالب</title>
@endsection

<style>
    #register {
        margin-top: 111px;
    }

    h3 {
        margin: 20px 5px 10px 5px !important;
        font-size: 15pt !important;
        font-family: "Adobe Arabic"!important;
        font-weight: bold!important;
        display: inline-block;
    }
    .border{
        border-radius: 4px;
        margin: 1px;
        width: 280px!important;
    }
    .border img{
        margin-right: 40px;
    }
    .border .titleMatlab{
        font-weight: bolder;
        font-size: 17pt;
        color: red;
    }
    .border .date{
        font-size: 14pt;
        color: red;
        font-weight: bold;
    }
    .matlab{
        font-size: 12.5pt;
        font-family: "Adobe Arabic"!important;
        /*font-family: "Adobe Arabic";*/
        margin: 10px;
    }
</style>

@section('content')
    <div id="register" class="container">

        <nav aria-label="breadcrumb" id="nav">
            <ol class="breadcrumb bgcolor">
                <li class="breadcrumb-item"><a href="{{route('index')}}">خانه</a></li>
                <li class="breadcrumb-item" aria-current="page"><a>مطالب</a></li>
            </ol>
        </nav>

        <div class="d-flex justify-content-center">
            <div class="row">
                @foreach($articles as $article)
                    <div class="p-1 border">
                        <img src="<?php echo '/photos/1/thumbs/' . basename($article->image) ?>">
                        <h3><span class="titleMatlab">{{$article->title}}</span> | نویسنده: <span class="date">{{$article->user->name}}</span> | تاریخ انتشار: <span class="date">{!! jdate($article->created_at)->format('%d-%B-%Y') !!}</span></h3>
                        <p class="matlab">
                            <?php echo mb_substr(strip_tags($article->description),0,200,'UTF8').'.....' ?>
                            <a href="{{route('front.article',$article->slug)}}">ادامه مطلب</a>
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
        {{$articles->links()}}
    </div>

    <hr>

@endsection

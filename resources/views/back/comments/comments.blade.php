@extends('back.index')

@section('title')
    مدریت نظرات
@endsection

<style>
    .fontTable {
        text-align: center;
    }

    .show_body {
        display: none;
        position: absolute;
        width: 500px;
        height: auto;
        padding: 30px;
        top: 45px;
        border-radius: 5px;
        border: 1px solid #ccc;
        background-color: #fff;
        z-index: 10;
    }
    .show_body div{
        width: 100%;
        height: 100%;
        border: none;
        white-space: normal;
    }

    .parent {
        position: relative;
    }

    .commentBtn a{
        cursor: pointer;
        font-size: 9.5pt;
    }
    .closeBody{
        float: right;
        cursor: pointer;
        margin: 0 5px 10px 10px;
    }
    .title{
        position: relative;
    }
    .articleTitle{
        cursor: pointer;
    }
    .articleSpan{
        width: auto;
        height: 35px;
        position: absolute;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 10px;
        background-color: #fff;
        z-index: 10;
        bottom: 35px;
        left: -17px;
        display: none;
    }
    .row{
        position: relative;
    }
    .message{
        position: absolute;
    }
</style>

@section('content')

    <div class="main-panel">

        <div class="content-wrapper">
            <div class="row page-title-header">
                <div class="col-12">
                    <div class="page-header">
                        <h4 class="page-title">پنل مدیریت / مدریت نظرات</h4>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="message">@include('messages.successMessage')</div>

                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-hover fontTable">
                                <thead>
                                <tr>
                                    <th>ردیف</th>
                                    <th>برای مطلب</th>
                                    <th>تاریخ ثبت نظر</th>
                                    <th>خلاصه نظر</th>
                                    <th>نویسنده کامنت</th>
                                    <th>وضعیت</th>
                                    <th>مدریت</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($comments as $comment)
                                    <tr>
                                        <td>{{$comment->id}}</td>
                                        <td class="title">
                                            <a class="articleTitle"><?php echo mb_substr(strip_tags($comment->article->title),0,20).'...'?></a>
                                            <span class="articleSpan">عنوان : {{$comment->article->title}}</span>
                                        </td>
                                        <td>{!! jdate($comment->created_at)->format('%Y/%m/%d') !!}</td>
                                        <td class="parent">
                                            <span class="commentBtn">
                                                <?php echo mb_substr(strip_tags($comment->body), 0, 20) . '....'?>
                                                -><a>ادامه مطلب</a>
                                            </span>
                                            <div class="show_body">
                                                <i class="closeBody">&timesbar;</i>
                                                <div>
                                                    <span style="color: red">متن کامل نظر :</span>
                                                      {{$comment->body}}
                                                </div>
                                            </div>
                                        </td>

                                        <td>{{$comment->name}}</td>
                                        <td>
                                            <?php
                                            $url = 'admin.comment.updateStatus';
                                            if ($comment->status == 1){
                                            ?>
                                            <a href="{{route($url,$comment->id)}}" class="badge badge-info">منتشر
                                                شده</a>
                                        <?php }else{ ?>
                                                <a href="{{route($url,$comment->id)}}" class="badge badge-danger">منتشر
                                                    نشده</a>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <a href="{{route('admin.comment.edit',$comment->id)}}" class="badge badge-primary">ویرایش</a>
                                            <a href="{{route('admin.comment.destroy',$comment->id)}}" class="badge badge-danger">حذف</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



@extends('back.index')

@section('title')
آموزش لاراول - مدریت نظرات
@endsection

<style>
    table th, td {
        text-align: center;
    }

    #btn {
        position: absolute;
        left: 85px;
        font-size: 11pt;
    }
</style>

@section('content')

<div class="main-panel">

    @include('messages.successMessage')

    <div class="content-wrapper">
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">پنل مدیریت / ویرایش نظر شماره <span style="color: red">({{$comment->id}})</span> برای مطلب با عنوان <span style="color: red">({{$comment->article->title}})</span></h4>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-lg-10 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.comment.update',$comment->id)}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>متن مطلب</label>
                                <textarea class="form-control" name="body">{{$comment->body}}</textarea>

                                @error('body')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>ایمیل</label>
                                <textarea class="form-control" name="email">{{$comment->email}}</textarea>

                                @error('email')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>نویسنده : </label>
                                ( <label style="color: red">{{$comment->name}}</label> )
                            </div>

                            <div class="form-group">
                                <label>وضعیت</label>
                                <select class="form-control" name="status" style="font-size: 12pt">
                                    <option value="1" <?php if ($comment->status==1){echo 'selected';} ?>>منتشر شده</option>
                                    <option value="0" <?php if ($comment->status==0){echo 'selected';} ?>>منتشر نشده</option>
                                </select>
                            </div>

                            <hr>

                            <div class="form-group">
                                <input type="submit" value="ویرایش مطلب" class="btn btn-info btn-sm">
                                <a id="btn" href="{{route('admin.comments')}}"
                                   class="btn btn-success btn-sm">بازگشت</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection







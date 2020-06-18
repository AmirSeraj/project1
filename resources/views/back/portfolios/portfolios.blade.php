@extends('back.index')
@section('title')
    مدریت نمونه کارها
@endsection

@section('content')

    <style>
        table th, td {
            text-align: center;
        }
        #btn{
            position: absolute;
            left: 85px;
            font-size: 11pt;
        }
        .btn-image{
            cursor: pointer;
        }
        .row{
            position: relative;
        }
        .image{
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            margin: auto;
            width: 470px;
            height: 370px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f0f0f0;
            display: none;
        }
        .image i{
            width: 28px;
            height: 28px;
            display: block;
            background: url("/images/slices.png") -207px -364px;
            float: right;
            margin: 10px;
            cursor: pointer;
        }
        .image h4{
            margin-top: 10px;
        }
        .image img{
            width: 90%!important;
            height: 80%!important;
            border-radius: 5px!important;
        }
        .message{
            top: 0!important;
        }
    </style>

    <div class="main-panel">

        <div class="content-wrapper">
            <div class="row page-title-header">
                <div class="col-12">
                    <div class="page-header">
                        <h4 class="page-title">پنل مدیریت / مدریت نمونه کارها</h4>
                        <a href="{{route('admin.portfolio.create')}}" id="btn" class="btn btn-success btn-lg">ایجاد نمونه کار جدید</a>
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
                                    <th>نام</th>
                                    <th>توضیحات</th>
                                    <th>لینک</th>
                                    <th>تصویر</th>
                                    <th>تگ</th>
                                    <th>مدریت</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($portfolios as $portfolio)
                                    <tr>
                                        <td>{{$portfolio->id}}</td>
                                        <td>{{$portfolio->name}}</td>
                                        <td>{{$portfolio->description}}</td>
                                        <td>{{$portfolio->link}}</td>
                                        <td>
                                            <a class="btn-image btn btn-xs btn-success">مشاهده</a>
                                            <div class="image">
                                                <i></i>
                                                <h4>{{$portfolio->name}}</h4>
                                                <img src="{{$portfolio->image}}">
                                            </div>
                                        </td>
                                        <td>{{$portfolio->tag}}</td>
                                        <td>
                                            <a href="{{route('admin.portfolio.edit',$portfolio->id)}}" class="badge badge-primary">ویرایش</a>
                                            <a href="{{route('admin.portfolio.destroy',$portfolio->id)}}" class="badge badge-danger">حذف</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{$portfolios->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

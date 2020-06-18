@extends('back.index')
@section('title')
    ویرایش نمونه کار
@endsection
@section('content')

    <div class="main-panel">

        @include('messages.successMessage')

        <div class="content-wrapper">
            <div class="row page-title-header">
                <div class="col-12">
                    <div class="page-header">
                        <h4 class="page-title">پنل مدیریت / ویرایش نمونه کار با آیدی <span style="color: red">({{$portfolio->id}})</span> </h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('admin.portfolio.update',$portfolio->id)}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="title">عنوان نمونه کار</label>
                                    <input name="name" class="form-control" value="{{$portfolio->name}}">
                                    @error('name')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="title">توضیح نمونه کار</label>
                                    <textarea name="description" class="form-control">{{$portfolio->description}}</textarea>
                                    @error('description')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="title">لینک نمونه کار</label>
                                    <input name="link" class="form-control" value="{{$portfolio->link}}">
                                    @error('link')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="title">تگ نمونه کار</label>
                                    <input name="tag" class="form-control" value="{{$portfolio->tag}}">
                                    @error('tag')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="title">تصویر نمونه کار</label>
                                    <div class="input-group">
                                       <span class="input-group-btn">
                                           <a id="lfm" data-input="image" data-preview="holder"
                                              class="btn btn-primary"><i class="fa fa-picture-o"></i>
                                               انتخاب
                                           </a>
                                        </span>
                                        <input id="image" class="form-control" type="text" name="image" value="{{$portfolio->image}}">
                                    </div>
                                    <img id="holder" style="margin-top:15px;max-height:100px;" src="{{$portfolio->image}}">
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-success" type="submit">ویرایش نمونه کار</button>
                                    <a href="{{route('admin.portfolios')}}" class="btn btn-warning">بازگشت</a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

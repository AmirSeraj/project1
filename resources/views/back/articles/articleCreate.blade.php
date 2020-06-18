@extends('back.index')

@section('title')
    آموزش لاراول - مدریت مطالب
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
                        <h4 class="page-title">پنل مدیریت / ایجاد مطلب جدید</h4>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-10 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('admin.articles.store')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>عنوان</label>
                                    <input type="text" class="form-control" name="title" value="{{old('title')}}">
                                    @error('title')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>نام مستعار / slug</label>
                                    <input type="text" class="form-control" name="slug" value="{{old('slug')}}">
                                    @error('slug')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label>شرح مطلب</label>
                                    <textarea name="description" id="introduction"
                                              class="introduction">{{old('description')}}</textarea>
                                    @error('description')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label>نویسنده : </label>
                                    <input type="hidden" name="user_id" value="{{Auth::User()->id}}">
                                    ( <label style="color: red">{{Auth::User()->name}}</label> )
                                </div>

                                <div class="form-group">
                                    <label>تصویر شاخص : </label>
                                    <div class="input-group">
                                       <span class="input-group-btn">
                                               <a id="lfm" data-input="image" data-preview="holder"
                                                  class="btn btn-primary"><i class="fa fa-picture-o"></i>
                                                   انتخاب
                                               </a>
                                        </span>
                                        <input id="image" class="form-control" type="text" name="image">
                                    </div>
                                    <img id="holder" style="margin-top:15px;max-height:100px;">
                                </div>

                                <div class="form-group">
                                    <label>انتخاب دسته بندی</label>

                                    <div id="output"></div>

                                    <select name="categories[]" class="chosen-select" multiple
                                            style="width: 400px" data-placeholder="انتخاب دسته بندی">
                                        @foreach($categories as $cat_id => $cat_val)
                                            <option value="{{$cat_id}}">{{$cat_val}}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label>وضعیت</label>
                                    <select class="form-control" name="status" style="font-size: 12pt">
                                        <option value="1">منتشر شده</option>
                                        <option value="0">منتشر نشده</option>
                                    </select>
                                </div>

                                <hr>

                                <div class="form-group">
                                    <input type="submit" value="ایجاد مطلب جدید" class="btn btn-info btn-sm">
                                    <a id="btn" href="{{route('admin.articles')}}"
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







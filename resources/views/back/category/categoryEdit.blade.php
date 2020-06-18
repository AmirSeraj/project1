@extends('back.index')

@section('title')
    ویرایش دسته بندی
@endsection

@section('content')

    <div class="main-panel">

        @include('messages.successMessage')

        <div class="content-wrapper">
            <div class="row page-title-header">
                <div class="col-12">
                    <div class="page-header">
                        <h4 class="page-title">پنل مدیریت / ویرایش دسته بندی <span style="color: red">({{$category->title}})</span> </h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('admin.categories.update',$category->id)}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>عنوان دسته بندی</label>
                                    <input type="text" class="form-control" name="title" value="{{$category->title}}">
                                    @error('title')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>نام مستعار دسته بندی</label>
                                    <input type="text" name="slug" class="form-control" value="{{$category->slug}}">
                                    @error('slug')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-lg">ویرایش دسته بندی</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

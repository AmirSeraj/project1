@extends('back.index')

@section('title')
    آموزش لاراول - مدریت دسته بندی ها
@endsection

<style>
    table th, td {
        text-align: center;
    }
    #btn{
        position: absolute;
        left: 85px;
        font-size: 11pt;
    }
</style>

@section('category')

    <div class="main-panel">

        @include('messages.successMessage')

        <div class="content-wrapper">
            <div class="row page-title-header">
                <div class="col-12">
                    <div class="page-header">
                        <h4 class="page-title">پنل مدیریت</h4>
                        <a id="btn" href="{{route('admin.categories.create')}}" class="btn btn-success btn-lg">افزودن دسته بندی جدید</a>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-10 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>ردیف</th>
                                    <th>عنوان دسته بندی</th>
                                    <th>نام مستعار</th>
                                    <th>مدریت</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->title}}</td>
                                        <td>{{$category->slug}}</td>
                                        <td>
                                            <a href="{{route('admin.categories.edit',$category->id)}}" class="btn btn-success btn-sm">ویرایش</a>
                                            <a href="{{route('admin.categories.destroy',$category->id)}}" class="btn btn-sm btn-warning">حذف</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{$categories->links()}}
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

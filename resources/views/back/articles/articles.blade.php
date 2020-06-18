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
        left: 40px;
        top: 10px;
        font-size: 10pt;
    }

    .boxCat {
        width: 450px;
        height: auto;
        background-color: #f0f0f0;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.2);
        position: absolute;
        top: -110px;
        left: 200px;
        right: 0;
        margin: auto;
        display: none;
        font-size: 12pt !important;
        padding: 10px;
        z-index: 10;
    }

    .boxShow {
        height: 500px !important;
        overflow: hidden;
        overflow-y: auto;
    }

    .title {
        color: red;
        font-size: 12.5pt !important;
    }

    .matlab {
        padding: 10px;
        border-bottom: 1px solid #ccc;
    }

    .modal-title {
        margin-left: 350px;
    }

    .btns span {
        display: block;
        margin-top: 2px;
    }

    .font {
        position: relative;
        font-size: 9.5pt !important;
    }

    .btn {
        cursor: pointer;
    }

    .common {
        border: 1px solid #ccc;
        background-color: #fff;
        border-radius: 5px;
        width: auto;
        padding: 5px 10px;
        height: 30px;
        position: absolute;
        bottom: 45px;
        right: -62px;
        text-align: center;
        color: #000;
        line-height: 17px;
        display: none;
    }

    .complete:hover {
        color: red;
        cursor: pointer;
    }

    .descriptionArticle {
        white-space: normal;
    }

    .descriptionArticle img {
        width: 200px !important;
        height: 200px !important;
        border-radius: 3px !important;
        display: block;
        margin: 5px auto;
    }
</style>

@section('content')

    <div class="main-panel">

        @include('messages.successMessage')

        <div class="content-wrapper">
            <div class="row page-title-header">
                <div class="col-12">
                    <div class="page-header">
                        <h4 class="page-title">پنل مدیریت / مدریت مطالب</h4>
                        <a id="btn" href="{{route('admin.articles.create')}}" class="btn btn-success btn-xs">افزودن مطلب
                            جدید</a>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>ردیف</th>
                                    <th>عنوان مطلب</th>
                                    <th>نام مستعار/slug</th>
                                    <th>شرح مطلب</th>
                                    <th>نویسنده</th>
                                    <th>دسته بندی</th>
                                    <th>بازدید</th>
                                    <th>وضعیت</th>
                                    <th>مدریت</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($articles as $article)
                                    <tr>
                                        <td>{{$article->id}}</td>
                                        <td class="font">
                                            <span class="complete">
                                                <?php
                                                echo substr(strip_tags($article->title), 0, 20) . '....';
                                                ?>
                                            </span>
                                            <div class="common fullTitle">عنوان : {{$article->title}}</div>
                                        </td>
                                        <td class="font">
                                            <div class="slugShow common"> نام مستعار : {{$article->slug}} </div>
                                            <a class="btn btn-sm btn-success slShow">نمایش</a>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-success btnShow">نمایش</a>

                                            <div class="boxShow boxCat scroll">
                                                <div class="modal-header">
                                                    <button type="button" class="close">&times;</button>
                                                    <h4 class="modal-title">شرح مطلب شماره <span
                                                            style="color: red">{{$article->id}}</span></h4>
                                                </div>
                                                <div class="form-group matlab">
                                                    <label>عنوان مطلب :</label>
                                                    <label class="title">{{$article->title}}</label><br>
                                                    <span>توضیحات این مطلب به شرح زیر است:</span>
                                                </div>
                                                <div class="descriptionArticle">{!! $article->description !!}</div>
                                            </div>

                                        </td>
                                        <td>
                                            {{Auth::user()->name}}
                                            @if(Auth::user()->role==1)
                                                (<span style="color: red">مدیر</span>)
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-info catShow">نمایش دسته بندی ها</a>

                                            <div class="boxCat boxCategory">
                                                <div class="modal-header">
                                                    <button type="button" class="close">&times;</button>
                                                    <h4 class="modal-title">دسته بندی ها</h4>
                                                </div>
                                                <div class="form-group matlab">
                                                    <label>عنوان مطلب :</label>
                                                    <label class="title">{{$article->title}}</label><br>
                                                    <span>این مطلب متعلق به دسته بندی های زیر است:</span>
                                                </div>
                                                <div class="btns">
                                                    @foreach($article->categories()->pluck('title') as $category)
                                                        <span class="badge badge-info">{{$category}}</span>
                                                    @endforeach
                                                </div>
                                            </div>

                                        </td>
                                        <td>{{$article->hit}}</td>
                                        <td>
                                            @php
                                                $url = 'admin.status.update';
                                            @endphp
                                            @if($article->status==1)
                                                <a href="{{route($url,$article->id)}}" class="btn btn-sm btn-success">منتشر
                                                    شده</a>
                                            @else
                                                <a href="{{route($url,$article->id)}}" class="btn btn-sm btn-warning">منتشر
                                                    نشده</a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('admin.articles.edit',$article->id)}}"
                                               class="btn btn-success btn-sm">ویرایش</a>
                                            <a onclick="return confirm('آیا آیتم مورد نظر حذف شود؟')"
                                               href="{{route('admin.articles.destroy',$article->id)}}"
                                               class="btn btn-sm btn-warning">حذف</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{$articles->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

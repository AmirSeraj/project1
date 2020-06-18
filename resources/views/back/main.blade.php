@extends('back.index')

@section('title')
    آموزش لاراول - پنل مدریت
@endsection

<style>
    table th, td {
        text-align: center;
    }
</style>

@section('content')

    <div class="main-panel">

        @include('messages.successMessage')

        <div class="content-wrapper">
            <div class="row page-title-header">
                <div class="col-12">
                    <div class="page-header">
                        <h4 class="page-title">پنل مدیریت</h4>
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
                                    <th>نام</th>
                                    <th>ایمیل</th>
                                    <th>تلفن</th>
                                    <th>نقش کاربری</th>
                                    <th>وضعیت</th>
                                    <th>مدریت</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->phone}}</td>
                                        <td>@if($user->role==1) <span style="color: red">مدیر</span> @else کاربر @endif
                                        </td>
                                        <td>
                                            @if($user->status==1)
                                                <a href="{{route('admin.users.updateStatus',$user->id)}}"
                                                   class="btn btn-sm btn-primary">فعال</a>
                                            @else
                                                <a href="{{route('admin.users.updateStatus',$user->id)}}"
                                                   class="btn btn-sm btn-danger">غیر فعال</a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('admin.profile.edit',$user->id)}}"
                                               class="btn btn-sm btn-success">بروز رسانی</a>
                                            <a href="{{route('admin.users.destroy',$user->id)}}" class="btn btn-sm btn-danger">حذف</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{$users->links()}}
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@extends('backend.layouts.master');
@section('title')
<title>List-Users</title>
@endsection
@section('content-header')
<!-- Content Header -->
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Danh sách người dùng</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Người dùng</a></li>
                <li class="breadcrumb-item active">Danh sách</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
@endsection

@section('content')
<div class="container-fluid">
    <!-- Main row -->
    <div class="row">

        <div class="col-12">
            <div class="card">
                <!-- /.card-header -->
                    @if (Cookie::get('success') != '')
                        <div class="alert alert-primary" role="alert">
                            {{Cookie::get('success')}}
                        </div>
                        @endif
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover data-table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Tên</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Thời gian</th>
                            <th>Tài khoản</th>
                            <th>Hàng động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->userInfo->phone}}</td>
                                <td>{{$user->userInfo->address}}</td>
                                <td>{{$user->created_at}}</td>
                                <td><span class="tag tag-success">{{$user->status_text}}</span></td>
                                <td><a href="{{route('backend.user.edit', $user->id)}}"><button class="btn btn-warning" >
                                    <i class="fas fa-edit"></i>
                                </button></a>
                                    <a href="{{route('backend.user.delete', $user->id)}}" onclick="return confirm('Bạn có muốn Xỏa?')">
                                        <button class="btn btn-danger" >
                                        <i class="fas fa-trash-alt"></i>
                                    </button></a>
                                </td>
                            </tr>  
                            @empty
                            <p>Không có dữ liệu</p>                          
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- /.row (main row) -->
</div><!-- /.container-fluid -->
@endsection
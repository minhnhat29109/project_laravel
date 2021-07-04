@extends('backend.layouts.master');
@section('title')
<title>Danh sách danh mực</title>
@endsection

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Danh sách danh mục</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                    <li class="breadcrumb-item active">Danh sách danh mục</li>
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
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover data-table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên danh mục</th>
                            <th>Xử lý</th>
                        </tr>
                        </thead>
                        <tbody>
                       @forelse ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <a href="{{route('backend.category.edit', $category->id)}}" class="btn btn-warning">Sửa</a>
                                    <a href="{{route('backend.category.delete', $category->id)}}" onclick="return confirm('Bạn có muốn Xỏa?')" class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                            @empty
                            <p>Phông có sản phẩm</p>
                       @endforelse               
                        </tbody>

                        
                         
                    </table>
                    {!! $categories->links() !!}
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- /.row (main row) -->
</div><!-- /.container-fluid -->
@endsection
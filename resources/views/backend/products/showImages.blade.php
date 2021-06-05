@extends('backend.layouts.master')
@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Danh sách ảnh</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                    <li class="breadcrumb-item active">Ảnh</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
@section("content")
    <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
    
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Sản phẩm mới nhập</h3>
    
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
    
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Ảnh sản phẩm</th>
                                 <th>Tên sản phẩm</th>
                            
                            </tr>
                            </thead>
                            <tbody>
                           @forelse ($images as $image)
                                <tr>
                                    <td>{{ $image->id }}</td>
                                    <td>{{ $image->name }}</td>
                                    <td>{{ $image->path }}</td>
                                    <th>{{ $image->product->name}}</th>
                                </tr>
                            @empty
                                <p>Không có sản phẩm</p>
                           @endforelse              
                            </tbody>
                             
                        </table>
                        {{-- {!! $images->links() !!} --}}
                   
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
@endsection
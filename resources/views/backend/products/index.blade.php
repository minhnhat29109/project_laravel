@extends('backend.layouts.master');
@section('title')
    <title>List-Products</title>
@endsection

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h2 class="m-0 text-dark">Danh sách sản phẩm</h2>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
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
                    <div class="card-header">
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right"
                                    placeholder="Search">

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
                                    <th>TÊN SẢN PHẨM</th>
                                    <th>GIÁ BÁN</th>
                                    <th>ẢNH</th>
                                    <th>DANH MỤC</th>
                                    <th>NGƯỜI NHẬP</th>
                                    <th>THỜI GIAN</th>
                                    <th>TRẠNG THÁI</th>
                                    <th>HÀNH ĐỘNG</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        @if (count($product->images) > 0)
                                            <td><img src="{{$product->images[0]->image_url}}" style="width: 60px" alt=""></td>
                                        @else
                                            <td>Không có ảnh</td>
                                        @endif
                                        <td>{{number_format($product->sale_price) }} VNĐ</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->user->name }}</td>

                                        <td>11-7-2014</td>
                                        <td><span class="tag tag-danger">{{ $product->status_text }}</span></td>
                                        <td>
                                            <a href="{{ route('backend.products.edit', $product->id) }}"
                                                class="btn btn-warning">Sửa</a>
                                            <a href="{{ route('backend.products.delete', $product->id) }}"
                                                class="btn btn-danger">Xóa</a>
                                        </td>
                                    </tr>
                                @empty
                                    <p>Phông có sản phẩm</p>
                                @endforelse
                            </tbody>



                        </table>
                        <div class="mt-3 float-right mr-5">
                            {!! $products->links() !!}
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
@endsection

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

                    <div class="card-body ">
                        <table class="table table-hover data-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>TÊN SẢN PHẨM</th>
                                    {{-- <th>ẢNH</th> --}}
                                    <th>GIÁ BÁN</th>
                                    <th>DANH MỤC</th>
                                    <th>NGƯỜI NHẬP</th>
                                    <th>THỜI GIAN</th>
                                    <th>TRẠNG THÁI</th>
                                    <th>HÀNH ĐỘNG</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr class="disable-row" @cannot('update-product', $product)
                                        disabled
                                    @endcannot>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        {{-- @if (count($product->images) > 0)
                                            <td><img src="{{$product->images[0]->image_url}}" style="width: 60px" alt=""></td>
                                        @else
                                            <td>Không có ảnh</td>
                                        @endif --}}
                                        <td>{{number_format($product->sale_price) }} VNĐ</td>
                                        <td>
                                            @isset($product->category->name)
                                                {{$product->category->name}}
                                            @endisset
                                        </td>
                                        <td>{{ $product->user->name }}</td>

                                        <td>11-7-2014</td>
                                        <td><span class="rounded w-50 {{$product->status_color}}">{{ $product->status_text }}</span></td>
                                        <td>
                                         @can ('update-product', $product)
                                            <a href="{{ route('backend.products.edit', $product->id) }}"
                                                class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('backend.products.delete', $product->id) }}" onclick="return confirm('Bạn có muốn Xỏa?')"
                                                class="btn btn-danger"><i class="fas fa-trash-alt"></i></a> 
                                            {{-- <a href=""
                                                class="btn btn-primary"><i class="fas fa-eye"></i></a>  --}}
                                         @endcan  
                                         @cannot('update-product', $product)
                                            <button class="btn btn-warning" disabled><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-danger" disabled><i class="fas fa-trash-alt"></i></button>
                                            {{-- <button class="btn btn-primary" disabled><i class="fas fa-eye"></i></button> --}}
                                         @endcannot
                                         
                                        </td>
                                    </tr>
                                @empty
                                    <p>Phông có sản phẩm</p>
                                @endcan
                            </tbody>



                        </table>
                        <div class="mt-3 float-right mr-5">
                            {{-- {!! $products->links() !!} --}}
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



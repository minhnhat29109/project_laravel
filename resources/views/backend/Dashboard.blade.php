@extends('backend.layouts.master')
@section('title')
    <title>Dashboard-Admin</title>
@endsection

@section('content-header')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div>
        </div>
    </div>

@endsection



@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{count($orders)}}</h3>

                        <p>Đơn hàng</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{route('backend.order.index')}}" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{count($products)}}</h3>

                        <p>Sản phẩm</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{route('backend.products.index')}}" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{count($users)}}</h3>

                        <p>Người dùng</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{route('backend.user.index')}}" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>
                            @if (!$total)
                                {{$total->total}}₫
                            @endif
                        </h3>

                        <p>Doanh thu</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{route('backend.order.viewChart')}}" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>

        <div class="row">

            <div class="col-12">
                <div class="card">
                    
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table table-hover data-table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên sản phẩm</th>
                                {{-- <th>Ảnh</th> --}}
                                <th>Giá bán</th>
                                <th>Thời gian</th>
                                <th>Trạng thái</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    @if ($product->status == \App\Models\Product::STATUS_INT)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        {{-- @if (count($product->images) > 0)
                                            <td><img src="{{$product->images[0]->image_url}}" style="width: 60px" alt=""></td>
                                        @else
                                            <td>Không có ảnh</td>
                                        @endif --}}
                                        <td>{{number_format($product->sale_price) }} ₫</td>
                                        <td>11-7-2014</td>
                                        <td><span class="rounded w-50 {{$product->status_color}}">{{ $product->status_text }}</span></td>
                                    </tr>
                                    @endif
                                @empty
                                    <p>Phông có sản phẩm</p>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>

@endsection








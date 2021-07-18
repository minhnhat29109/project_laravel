@extends('backend.layouts.master')
@section('title')
    <title>Chi tiết đơn hàng</title>
@endsection

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h2 class="m-0 text-dark">Chi tiết đơn hàng</h2>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Chi tiết đơn hàng</li>
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
                    <p>Tên khách hàng: {{$order->customer_name}}</p>
                    <p>Email: {{$order->email}}</p>
                    <p>Địa chỉ: {{$order->address}}</p>
                    <p>Số điện thoại: {{$order->phone}}</p>
                <div class="card-body ">
                    @php
                        $stt = 1;
                    @endphp
                    <table class="table">
                        <thead>
                            <th>STT</th>
                            <th>Tên SẢN PHẨM</th>
                            <th>GIÁ</th>
                            <th>MÀU</th>
                            <th>SIZE</th>
                            <th>SỐ LƯỢNG</th>
                            <th>THÀNH TIỀN</th>
                        </thead>
                        <tbody>
                            @forelse ($order->orderproducts as $key=>$product )
                            <tr>
                                <td>{{$stt++}}</td>
                                <td>{{$name[$key]}}</td>
                                <td>{{number_format($product->price)}}₫</td>
                                <td>{{$product->color}}</td>
                                <td>{{$product->size}}</td>
                                <td>{{$product->quantity}}</td>
                                <td>{{number_format($product->price*$product->quantity)}}₫</td>
                            </tr>
                            @empty
                                
                            @endforelse
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Tông thanh toán:</td>
                                <td>{{number_format($order->total)}}₫</td>
                            </tr>

                        </tbody>
                    </table>
                    <a href="{{route('backend.order.index')}}" class="btn bg-secondary">Quay lại</a><span> </span>
                    <a href="{{route('backend.order.printer', $order->id)}}" class="btn btn-success">In hóa đơn</a>
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
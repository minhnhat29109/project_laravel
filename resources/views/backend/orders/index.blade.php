@extends('backend.layouts.master')
@section('title')
    <title>Đơn hàng</title>
@endsection

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h2 class="m-0 text-dark">Danh sách đơn hàng</h2>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Trang chủ</li>
                    <li class="breadcrumb-item active">Đơn hàng</li>
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
                                    <th>TÊN HÁCH HÀNG</th>
                                    {{-- <th>ẢNH</th> --}}
                                    <th>EMAIL</th>
                                    <th>SỐ ĐIỆN THOẠI</th>
                                    <th>ĐỊA CHỈ</th>
                                    <th>GHI CHÚ</th>
                                    <th>THỜI GIAN</th>
                                    <th>TRẠNG THÁI</th>
                                    <th>HÀNH ĐỘNG</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $order)
                                    <tr>
                                        <td>{{ $order->id}}</td>
                                        <td>{{ $order->customer_name}}</td>
                                        <td>{{$order->email}}</td>
                                        <td>{{$order->phone}}</td>
                                        <td>{{$order->address}}</td>
                                        <td>
                                            @isset($order->note)
                                                {{$order->note}}
                                            @endisset
                                        </td>
                                        <td>{{ $order->created_at}}</td>
                                        <td>{{$order->status_order}}</td>
                                     
                                        <td>
                                            <div class="container-sm">
                                                <div class="row">
                                                    <a href="{{ route('backend.order.edit', $order->id) }}"
                                                        class="btn btn-info"><i class="fas fa-eye"></i></a>
                                                    <div class="dropdown">
                                                        <button class="btn btn-warning dropdown-toggle"  id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                          Xử lý
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right" >
                                                            <a href="{{route('backend.order.update-confirm', $order->id)}}" class="dropdown-item">Xác nhận đơn</a>
                                                            <a href="{{route('backend.order.update-transport', $order->id)}}" class="dropdown-item">Gửi hàng</a>
                                                            <a href="{{route('backend.order.update-cancer', $order->id)}}" class="dropdown-item">Hủy đơn</a>
                                                        </div>
                                                      </div>
                                                </div>
                                            </div>
                                                {{-- <a href="{{route('backend.order.update-status', $order->id)}}">
                                                    <button class="btn bg-warning" {{$order->status == 2 ? 'disabled':''}}>Xử lý</button>
                                                </a> --}}
                                        </td>
                                    </tr>
                                @empty
                                    <p>Phông có sản phẩm</p>
                                @endforelse
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
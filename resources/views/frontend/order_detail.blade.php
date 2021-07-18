@extends('frontend.layouts.master')

@section('content')

<div class="container">
    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="#">Trang chủ</a></li>
                <li class="active">Chi tiết đơn hàng</li>
            </ul>
        </div>
    </div>
    <div style="margin-top: 20px;">
    <h4>Thông tin khách hàng</h4>
    <p>Tên khách hàng: {{$order->customer_name}}</p>
    <p>Email: {{$order->email}}</p>
    <p>Địa chỉ: {{$order->address}}</p>
    <p>Số điện thoại: {{$order->phone}}</p>
    <p>Ngày: {{$order->phone}}</p>

    </div>
    @php
        $stt = 1;
    @endphp
    <table class="table table-hover">
        <thead>
            <th>STT</th>
            <th>Tên SẢN PHẨM</th>
            <th>GIÁ</th>
            <th>MÀU</th>
            <th>SIZE</th>
            <th>SỐ LƯỢNG</th>
            <th>THÀNH TIỀN</th>
            <th>Hành động</th>
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
                <td>
                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModalCenter{{$product->id}}">
                        Đánh giá
                    </button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLongTitle">Đánh giá sản phẩm</h4>
                            <div class="stars">
                                <form action=""> <input class="star star-5" id="star-5" type="radio" name="star" /> <label class="star star-5" for="star-5"></label> <input class="star star-4" id="star-4" type="radio" name="star" /> <label class="star star-4" for="star-4"></label> <input class="star star-3" id="star-3" type="radio" name="star" /> <label class="star star-3" for="star-3"></label> <input class="star star-2" id="star-2" type="radio" name="star" /> <label class="star star-2" for="star-2"></label> <input class="star star-1" id="star-1" type="radio" name="star" /> <label class="star star-1" for="star-1"></label> </form>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="" id="">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                                <a href="{{$product->id}}"><button type="button" class="btn btn-warning">Đánh giá</button></a>
                            </div>
                        </div>
                        </div>
                    </div>
                </td>
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

</div>
@endsection

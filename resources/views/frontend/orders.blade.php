@extends('frontend.layouts.master')

@section('content')
<div id="breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="#">Trang chủ</a></li>
            <li class="active">Danh sách đơn hàng</li>
        </ul>
    </div>
</div>
<div class="container">
    <table class="table table-hover">
        @php
            $stt = 1;
        @endphp
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên khách hàng</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Ngày mua</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th colspan="2">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($orders as $order)
                <tr>
                    <td>{{$stt++}}</td>
                    <td>{{$order->customer_name}}</td>
                    <td>{{$order->phone}}</td>
                    <td>{{$order->address}}</td>
                    <td>{{$order->created_at}}</td>
                    <td>{{number_format($order->total)}}₫</td>
                    <td>{{$order->status_order}}</td>
                    <td>
                            <a href="{{ route('frontend.order.detail', $order->id) }}"
                            class="btn btn-info"><i class="fa fa-eye"></i></a>
                    </td>
                    <td>
                            @if ($order->status == 0)
                                <a href="{{route('frontend.order.cancer', $order->id)}}">
                                    <button class="btn btn-danger btn-sm">Hủy đơn</button>
                                </a>
                            @endif

                            @if ($order->review_status == 0 && $order->status != -1 && $order->status != 2 && $order->status != 1 && $order->status != 0)
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModalCenter{{$order->id}}">
                                    Đánh giá
                                </button>
                                <!-- Modal -->
                            <form action="{{route('frontend.order.review', $order->id)}}" method="POST">
                                @csrf
                                <div class="modal fade" id="exampleModalCenter{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog " role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLongTitle">Đánh giá</h4>
                                            <div class="stars">
                                                <input class="star star-5" id="star-5{{$order->id}}" checked type="radio" value="5" name="star" /> 
                                                <label class="star star-5" for="star-5{{$order->id}}"></label> 

                                                <input class="star star-4" id="star-4{{$order->id}}" type="radio" value="4" name="star" /> 
                                                <label class="star star-4" for="star-4{{$order->id}}"></label> 

                                                <input class="star star-3" id="star-3{{$order->id}}" type="radio" value="3" name="star" /> 
                                                <label class="star star-3" for="star-3{{$order->id}}"></label> 

                                                <input class="star star-2" id="star-2{{$order->id}}" type="radio" value="2" name="star" /> 
                                                <label class="star star-2" for="star-2{{$order->id}}"></label> 

                                                <input class="star star-1" id="star-1{{$order->id}}"  type="radio" value="1" name="star" /> 
                                                <label class="star star-1" for="star-1{{$order->id}}"></label> 
                                            </div>
                                            <div class="form-group">
                                                <label for="a">Nhận xét đơn hàng</label>
                                                <textarea name="content" class="form-control" id="a" cols="30" rows="5"></textarea>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                                                <button type="submit" class="btn btn-warning">Đánh giá</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                </div>  
                            @endif

                            @if ($order->status == 2)
                                <a href="{{route('backend.order.update-success', $order->id)}}">
                                    <button class="btn btn-success btn-sm ">Đã nhận hàng</button>
                                </a>
                            @endif
                        {{-- <a href="#">
                            <button class="btn btn-warning btn-sm {{$order->status == -1 || $order->status == 4 ? 'disabled' : ''}}">Đánh giá</button>
                        </a> --}}
                    </td>
                </tr>
            @empty
                <p class="text-danger text-center">Không có đơn hàng</p>
            @endforelse
        </tbody>


    </table>
</div>
@endsection
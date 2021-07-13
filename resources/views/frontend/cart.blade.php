@extends('frontend.layouts.master')
@section('content')
<!-- BREADCRUMB -->
<div id="breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Checkout</li>
        </ul>
    </div>
</div>
<!-- /BREADCRUMB -->

<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
                <div class="col-md-8">
                    <div class="order-summary clearfix">
                        <div class="section-title">
                            <h3 class="title">Thông tin sản phẩm</h3>
                        </div>
                        <table class="shopping-cart-table table">
                            <thead>
                                <tr>
                                    <th class="text-center">Mặt hàng</th>
                                    <th></th>
                                    <th class="text-center">Giá</th>
                                    <th class="text-center">Số lượng</th>
                                    <th class="text-center">Thành tiền</th>
                   
                                    <th class="text-center">Xóa</th>
                                </tr>
                            </thead>
                            @forelse ($items as $item)
                            <tbody>
                                
                                <tr>
                                    @if ($item->options->image)
                                        <td class="thumb">
                                            <img src="{{url(\Illuminate\Support\Facades\Storage::url($item->options->image))}}" alt="">
                                        </td>
                                    @else
                                        <td class="thumb">
                                            <img src="https://www.strawberrycstore.com/images/no-product-image.png" alt="">
                                        </td>

                                    @endif
                                    <td class="details">
                                        <a href="#">{{$item->name}}</a>
                                        <ul>
                                            <li><span>Size:{{$item->options->size}}</span></li>
                                            <li><span>Màu:{{$item->options->color}}</span></li>
                                        </ul>
                                    </td>
                                    <td class="price text-center">
                                        <strong>{{number_format($item->price)}}₫</strong>
                                    </td>
                                    {{-- <td class="text-center">
                                        <a href=""><button>-</button></a><input type="text"><a href=""><button>+</button></a>
                                    </td> --}}
                                    <td class="text-center">
                                      
                                            
                                        <div class="" style="padding: auto">
                                            <a href="{{route('frontend.cart.decrease', $item->rowId)}}">
                                                <button class="btn"> - </button>
                                                </a>
                                                <input class="text-center input" id="demoInput" style="max-width: 50px;" disabled min="1" max="100" value="{{$item->qty}}">
                                                
                                                <a href="{{route('frontend.cart.increase', $item->rowId)}}">
                                                    <button  class="btn">+</button>
                                                </a>
                                        </div>
                                       
                                    </td>
                                    <td class="total text-center">
                                        <strong class="primary-color">{{number_format($item->price * $item->qty)}}₫</strong>
                                    </td>
                                    <td class="text-right"><a href="{{route('frontend.cart.remove',$item->rowId)}}">
                                        <i class="fa fa-close"></i>
                                    </a></td>                      
                                </tr>     
                            </tbody>
                            @empty
                                <td colspan="7" class="primary-color text-center">Giỏ hàng trống</td>
                            @endforelse
                        </table>
                    </div>
                </div>

                <form action="{{route('frontend.order.store')}}" method="post">
                    @csrf
                    <div class="col-md-4">
                        <div class="billing-details">
                            <div class="section-title">
                                <h3 class="title">Thông tin người mua</h3>
                            </div>
                            <div class="form-group">
                                <input class="input" value="{{Auth::check() == true ? Auth::user()->name : ''}}{{old('name')}}" type="text" name="name" placeholder="Tên người mua">
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input class="input" value="{{Auth::check() == true ? Auth::user()->email : ''}}{{old('mail')}}" type="text" name="mail" placeholder="Email">
                                @error('mail')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input class="input" value="{{$info != '' ? $info->address : ''}}{{old('address')}}" type="text" name="address" placeholder="Địa chỉ">
                                @error('address')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input class="input" value="{{$info != '' ? $info->phone : ''}}{{old('phone')}}" type="tel" name="phone" placeholder="Điện thoại">
                                @error('phone')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="note" placeholder="Ghi chú">
                            </div>
                            <table class="shopping-cart-table table">
                                <tfoot>
                                    <tr>
                                        <th class="empty" colspan="3"></th>
                                        <th>Tổng tiền hàng</th>
                                        <th colspan="2" class="sub-total">{{Cart::total()}}₫</th>
                                    </tr>
                                    <tr>
                                        <th class="empty" colspan="3"></th>
                                        <th>Phí giao hàng</th>
                                        <td colspan="2">Miễn phí</td>
                                    </tr>
                                    <tr>
                                        <th class="empty" colspan="3"></th>
                                        <th>Tổng thanh toán</th>
                                        <th colspan="2" class="total">{{Cart::total()}}₫</th>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="pull-right">
                                <button class="btn primary-btn" {{Cart::count() <= 0 ? 'disabled' : ''}}>Đặt hàng</button>
                            </div>
                        </div>
                    </div>
                </form>
{{-- @dd($items) --}}
            
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->
@endsection
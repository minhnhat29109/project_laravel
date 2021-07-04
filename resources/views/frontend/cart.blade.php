@extends('frontend.layouts.master')

@section('slider')
  @include('frontend.includes.slider')  
@endsection

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
            <form id="checkout-form" class="clearfix">
                <div class="col-md-6">
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
                                            <li><span>Size: XL</span></li>
                                            <li><span>Color: Camelot</span></li>
                                        </ul>
                                    </td>
                                    <td class="price text-center">
                                        <strong>{{number_format($item->price)}}</strong>
                                        <br><del class="font-weak"><small>$40.00</small></del>
                                    </td>
                                    <td class="qty text-center">
                                        <input class="input" type="number" value="{{$item->qty}}">
                                    </td>
                                    <td class="total text-center">
                                        <strong class="primary-color">{{number_format($item->price * $item->qty)}}</strong>
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

                <div class="col-md-6">
                    <div class="billing-details">
                        <div class="section-title">
                            <h3 class="title">Thông tin người mua</h3>
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="first-name" placeholder="Tên người mua">
                        </div>
                        <div class="form-group">
                            <input class="input" type="email" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="Địa chỉ" placeholder="Địa chỉ">
                        </div>
                        <div class="form-group">
                            <input class="input" type="tel" name="phone" placeholder="Điện thoại">
                        </div>
                        <table class="shopping-cart-table table">
                            <tfoot>
                                <tr>
                                    <th class="empty" colspan="3"></th>
                                    <th>Tổng tiền hàng</th>
                                    <th colspan="2" class="sub-total">{{Cart::total()}}</th>
                                </tr>
                                <tr>
                                    <th class="empty" colspan="3"></th>
                                    <th>Phí giao hàng</th>
                                    <td colspan="2">Miễn phí</td>
                                </tr>
                                <tr>
                                    <th class="empty" colspan="3"></th>
                                    <th>Tổng thanh toán</th>
                                    <th colspan="2" class="total">{{Cart::total()}}</th>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="pull-right">
                            <button class="primary-btn">Đặt hàng</button>
                        </div>
                    </div>
                </div>
{{-- @dd($items) --}}
            </form>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->
@endsection
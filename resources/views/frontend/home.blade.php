

@extends('frontend.layouts.master')

@section('slider')
  @include('frontend.includes.slider')  
@endsection


@section('content')
@foreach ($categories as $category)
    @if ($category->is_show == 1)
        <div class="container ">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title">{{ $category->name }}</h2>
                    </div>
                </div>
            </div>
            <div class="row slick-product">
                @foreach ($products as $product)
                    @if ($category->id == $product->category_id && $product->status == 1)
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <div class="product product-single">
                                <div class="product-thumb">
                                    <a href="{{route('frontend.home.product-detail', $product->slug)}}"><button class="main-btn quick-view"><i class="fa fa-search-plus"></i>
                                            Chi tiết sản phẩm</button></a>
                                            @if (count($product->images) > 0)
                                                <div class="product-view">
                                                    <img src="{{ $product->images[0]->image_url }}" alt="">
                                                </div>
                                            @else
                                                <div class="product-view">
                                                    <img src="https://www.strawberrycstore.com/images/no-product-image.png" alt="">
                                                </div>
                                            @endif
                                </div>
                                <div class="product-body">
                                    <h3 class="product-price">{{ number_format($product->sale_price) }}₫</h3>

                                    <div class="product-rating">
                                        @if (count($product->reviews) > 0)
                                            {{$product->reviews->sum('rating') / count($product->reviews)}}
                                            <i class="fa fa-star"></i>
                                        @else
                                        <p>Chưa có đánh giá</p>
                                        @endif
                                        
                                    </div>
                                    <h2 class="product-name"><a href="{{route('frontend.home.product-detail', $product->slug)}}">{{$product->name }}</a></h2>
                                    <div class="btn" >
                                        <a href="{{route('frontend.home.product-detail', $product->slug)}}">
                                            <button class="primary-btn add-to-cart">
                                                <i class="fa fa-shopping-cart"></i>
                                                    Mua hàng
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    @endif
@endforeach 
@endsection
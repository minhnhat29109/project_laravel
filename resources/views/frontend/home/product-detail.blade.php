@extends('frontend.layouts.master')
@section('content')
    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!--  Product Details -->
                <div class="product product-details clearfix">
                    <div class="col-md-6">
                        <div id="product-main-view">
                            @if (count($product->images) > 0)
                                @for ($i=0 ; $i < count($product->images); $i++)
                                    <div class="product-view">
                                            <img src="{{ $product->images[$i]->image_url }}" alt="">
                                    </div>
                                @endfor
                            @else
                                <div class="product-view">
                                    <img src="https://www.strawberrycstore.com/images/no-product-image.png" alt="">
                                </div>
                            @endif
                        </div>
                        <div id="product-view">
                            @if (count($product->images) > 0)
                                @for ($i=0 ; $i < count($product->images); $i++)
                                    <div class="product-view">
                                        <img src="{{ $product->images[$i]->image_url }}" alt="ảnh">
                                    </div>
                                @endfor
                            @else
                                <div class="product-view">
                                    <img src="https://www.strawberrycstore.com/images/no-product-image.png" alt="">
                                </div>
                            @endif
                        </div>
                    </div>
                    <form action="{{route('frontend.cart.add', $product->id)}}" method="get">
                        <div class="col-md-6">
                            <div class="product-body">
                                <div class="product-label">
                                    <span>New</span>
                                    <span class="sale">-20%</span>
                                </div>
                                <h2 class="product-name">{{ $product->name }}</h2>
                                <h3 class="product-price">{{number_format($product->sale_price)}}VNĐ<del class="product-old-price">
                                        {{ number_format($product->origin_price) }}₫</del></h3>
                                <div>
                                    <div class="product-rating">
                                        @if (count($product->reviews) > 0)
                                            {{$product->reviews->sum('rating') / count($product->reviews)}}
                                            <i class="fa fa-star"></i>
                                        @else
                                        <p class="text-danger">Chưa có đánh giá</p>
                                        @endif
                                        
                                    </div>
                                </div>
                                <p><strong>Thương hiệu:</strong>
                                    @if ($product->brand_id > 0)
                                    {{$product->brand->name}}</p>
                                    @endif
                                <div class="product-options">
                                    <ul class="size-option">
                                        <li><span class="text-uppercase">Size:</span></li>
                                        <li >
                                            <select name="size" id="">
                                                @forelse ($wares as $ware)
                                                @if ($ware->amount > 0)
                                                    <option value="{{$ware->size}}">{{$ware->size}}</option>
                                                @endif
                                                @empty
                                                @endforelse
                                            </select>
                                            {{-- <a href="#"></a> --}}
                                        </li>
                                    </ul>
                                    <ul class="size-option">
                                        <li><span class="text-uppercase">Màu:</span></li>
                                        {{-- <li class="active"><a href="#" style="background-color:#475984;"></a></li> --}}
                                        <li >
                                            <select name="color" id="">
                                                @forelse ($wares as $ware)
                                                @if ($ware->amount > 0)
                                                    <option value="{{$ware->color}}">{{$ware->color}}</option>
                                                @endif
                                                @empty
                                                @endforelse
                                            </select>
                                            {{-- <a href="#"></a> --}}
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-btns">
                                    {{-- <div class="qty-input">
                                        <span class="text-uppercase">Só lượng: </span>
                                        <input class="input" value="1" type="number">
                                    </div> --}}
                                   <button class="primary-btn add-to-cart">
                                       <i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng
                                    </button>
                                    <div class="pull-right">
                                        <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                        <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                        <button class="main-btn icon-btn"><i class="fa fa-share-alt"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="col-md-12">
                        <div class="product-tab">
                            <ul class="tab-nav">
                                <li class="active"><a data-toggle="tab" href="#tab1">Mô tả</a></li>
                               
                                <li><a data-toggle="tab" href="#tab2">Đánh giá</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="tab1" class="tab-pane fade in active">
                                    <p>{!!$product->content!!}</p>
                                </div>
                                <div id="tab2" class="tab-pane fade in">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="product-reviews">
                                                @forelse ($reviews as $review)
                                                <div class="single-review">
                                                    <div class="review-heading">
                                                        <div><a href="#"><i class="fa fa-user-o"></i>{{$review->user->name}}</a></div>
                                                        <div><a href="#"><i class="fa fa-clock-o"></i>{{$review->created_at}}</a></div> 
                                                        <div class="review-rating">
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                <i class="fa fa-star {{$i <= $review->rating ? '': 'empty'}}"></i>
                                                            @endfor
                                                        </div>
                                                    </div>
                                                    <div class="review-body">
                                                        <p>{{$review->content}}
                                                        </p>
                                                    </div>
                                                </div>
                                                @empty
                                                    <p class="text-danger">Chưa có đánh giá</p>
                                                @endforelse ()
                                            </div>
                                        </div>
                                    
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>

                </div>
                <!-- /Product Details -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->

    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title">Sản phẩm tương tự</h2>
                    </div>
                </div>
                <!-- section title -->

                <!-- Product Single -->
                @forelse ($sames as $product)
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
                @empty
                    <p class="text-center text-danger"></p>
                @endforelse
               
                <!-- /Product Single -->

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
@endsection
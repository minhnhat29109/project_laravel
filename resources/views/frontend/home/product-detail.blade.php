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
                            <div class="product-view">
                                <img src="{{ $product->images[0]->image_url }}" alt="">
                            </div>
                            @else
                                <div class="product-view">
                                    <img src="https://www.strawberrycstore.com/images/no-product-image.png" alt="">
                                </div>
                            @endif

                            <div class="product-view">
                                <img src="/frontend/img/main-product02.jpg" alt="">
                            </div>
                        </div>
                        <div id="product-view">
                            @if (count($product->images) > 0)
                                <div class="product-view">
                                    <img src="{{ $product->images[0]->image_url }}" alt="">
                                </div>
                            @else
                                <div class="product-view">
                                    <img src="https://www.strawberrycstore.com/images/no-product-image.png" alt="">
                                </div>
                            @endif
                            <div class="product-view">
                                <img src="/frontend/img/thumb-product02.jpg" alt="">
                            </div>
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
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o empty"></i>
                                    </div>
                                    <a href="#">3 Review(s) / Add Review</a>
                                </div>
                                <p><strong>Thương hiệu:</strong>
                                    @if ($product->brand_id > 0)
                                    {{$product->brand->name}}</p>
                                    @endif
                                    
                                <p>{!! $product->content !!}</p>
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
                                <li><a data-toggle="tab" href="#tab1">Chi tiết</a></li>
                                <li><a data-toggle="tab" href="#tab2">Đánh giá</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="tab1" class="tab-pane fade in active">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                        nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                        Duis aute
                                        irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                                        nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa
                                        qui officia deserunt mollit anim id est laborum.</p>
                                </div>
                                <div id="tab2" class="tab-pane fade in">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="product-reviews">
                                                <div class="single-review">
                                                    <div class="review-heading">
                                                        <div><a href="#"><i class="fa fa-user-o"></i> John</a></div>
                                                        <div><a href="#"><i class="fa fa-clock-o"></i> 27 DEC 2017 / 8:0
                                                                PM</a></div>
                                                        <div class="review-rating pull-right">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o empty"></i>
                                                        </div>
                                                    </div>
                                                    <div class="review-body">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                                                            do eiusmod tempor incididunt ut labore et dolore magna
                                                            aliqua.Ut enim ad minim veniam, quis nostrud exercitation
                                                            ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis
                                                            aute
                                                            irure dolor in reprehenderit in voluptate velit esse cillum
                                                            dolore eu fugiat nulla pariatur.</p>
                                                    </div>
                                                </div>

                                                <div class="single-review">
                                                    <div class="review-heading">
                                                        <div><a href="#"><i class="fa fa-user-o"></i> John</a></div>
                                                        <div><a href="#"><i class="fa fa-clock-o"></i> 27 DEC 2017 / 8:0
                                                                PM</a></div>
                                                        <div class="review-rating pull-right">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o empty"></i>
                                                        </div>
                                                    </div>
                                                    <div class="review-body">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                                                            do eiusmod tempor incididunt ut labore et dolore magna
                                                            aliqua.Ut enim ad minim veniam, quis nostrud exercitation
                                                            ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis
                                                            aute
                                                            irure dolor in reprehenderit in voluptate velit esse cillum
                                                            dolore eu fugiat nulla pariatur.</p>
                                                    </div>
                                                </div>

                                                <div class="single-review">
                                                    <div class="review-heading">
                                                        <div><a href="#"><i class="fa fa-user-o"></i> John</a></div>
                                                        <div><a href="#"><i class="fa fa-clock-o"></i> 27 DEC 2017 / 8:0
                                                                PM</a></div>
                                                        <div class="review-rating pull-right">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o empty"></i>
                                                        </div>
                                                    </div>
                                                    <div class="review-body">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                                                            do eiusmod tempor incididunt ut labore et dolore magna
                                                            aliqua.Ut enim ad minim veniam, quis nostrud exercitation
                                                            ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis
                                                            aute
                                                            irure dolor in reprehenderit in voluptate velit esse cillum
                                                            dolore eu fugiat nulla pariatur.</p>
                                                    </div>
                                                </div>

                                                <ul class="reviews-pages">
                                                    <li class="active">1</li>
                                                    <li><a href="#">2</a></li>
                                                    <li><a href="#">3</a></li>
                                                    <li><a href="#"><i class="fa fa-caret-right"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h4 class="text-uppercase">Đánh giá của bạn về sản phẩm</h4>
                                            <form class="review-form">
                                                <div class="form-group">
                                                    <input class="input" type="text" placeholder="Your Name" />
                                                </div>
                                                <div class="form-group">
                                                    <input class="input" type="email" placeholder="Email Address" />
                                                </div>
                                                <div class="form-group">
                                                    <textarea class="input" placeholder="Your review"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-rating">
                                                        <strong class="text-uppercase">Your Rating: </strong>
                                                        <div class="stars">
                                                            <input type="radio" id="star5" name="rating"
                                                                value="5" /><label for="star5"></label>
                                                            <input type="radio" id="star4" name="rating"
                                                                value="4" /><label for="star4"></label>
                                                            <input type="radio" id="star3" name="rating"
                                                                value="3" /><label for="star3"></label>
                                                            <input type="radio" id="star2" name="rating"
                                                                value="2" /><label for="star2"></label>
                                                            <input type="radio" id="star1" name="rating"
                                                                value="1" /><label for="star1"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="primary-btn">Đánh giá</button>
                                            </form>
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
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="product product-single">
                        <div class="product-thumb">
                            <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
                            <img src="/frontend/img/product04.jpg" alt="">
                        </div>
                        <div class="product-body">
                            <h3 class="product-price">$32.50</h3>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o empty"></i>
                            </div>
                            <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
                            <div class="product-btns">
                                <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to
                                    Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Product Single -->

                <!-- Product Single -->
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="product product-single">
                        <div class="product-thumb">
                            <div class="product-label">
                                <span>New</span>
                            </div>
                            <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
                            <img src="/frontend/img/product03.jpg" alt="">
                        </div>
                        <div class="product-body">
                            <h3 class="product-price">$32.50</h3>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o empty"></i>
                            </div>
                            <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
                            <div class="product-btns">
                                <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to
                                    Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Product Single -->

                <!-- Product Single -->
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="product product-single">
                        <div class="product-thumb">
                            <div class="product-label">
                                <span class="sale">-20%</span>
                            </div>
                            <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
                            <img src="/frontend/img/product02.jpg" alt="">
                        </div>
                        <div class="product-body">
                            <h3 class="product-price">$32.50 <del class="product-old-price">$45.00</del></h3>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o empty"></i>
                            </div>
                            <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
                            <div class="product-btns">
                                <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to
                                    Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Product Single -->

                <!-- Product Single -->
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="product product-single">
                        <div class="product-thumb">
                            <div class="product-label">
                                <span>New</span>
                                <span class="sale">-20%</span>
                            </div>
                            <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
                            <img src="/frontend/img/product01.jpg" alt="">
                        </div>
                        <div class="product-body">
                            <h3 class="product-price">$32.50 <del class="product-old-price">$45.00</del></h3>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o empty"></i>
                            </div>
                            <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
                            <div class="product-btns">
                                <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to
                                    Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Product Single -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
@endsection
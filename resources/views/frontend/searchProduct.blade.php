@extends('frontend.layouts.master')
@section('content')
    <!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li class="active">Products</li>
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
			

				<!-- MAIN -->
				<div id="main" class="col-md-12">
					<!-- store top filter -->
					<div class="store-filter clearfix">
						<div class="pull-left">
							<form action="{{route('frontend.product.filter')}}" method="GET">
								<div class="row-filter">
									<a href="#"><i class="fa fa-filter"></i></a>
									{{-- <a href="#" class="active"><i class="fa fa-bars"></i></a> --}}
								</div>
                                {{-- @csrf --}}
                                <div class="sort-filter">
                                    <span class="text-uppercase">Lọc theo giá:  </span>
                                    <select class="input" name="price">
											<option value="-1">Từ</option>
                                            <option value="0-1000000">Dưới 1 triệu</option>
                                            <option value="1000000-2000000">Từ 1 - 2 triệu</option>
                                            <option value="2000000-1000000000">Trên 2 triệu</option>
                                        </select>
                                        <select class="input" name="brand">
											<option value="-1">Hãng</option>
											@forelse ($brands as $brand)
												<option value="{{$brand->id}}">{{$brand->name}}</option>
											@empty
												<option value=""></option>
											@endforelse
                                        </select>
                                    <button class="main-btn icon-btn"><i class="fa fa-filter"></i></button>
                                </div>
                            </form>
						</div>
						<div class="pull-right">
							<ul class="store-pages">
                                {!! $products->links() !!}

							</ul>
						</div>
					</div>
					<!-- /store top filter -->

					<!-- STORE -->
					<div id="store">
						<!-- row -->
						<div class="row">
						
                            @forelse ($products as $product)
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
                                <p class="text-center text-danger">Không có sản phẩm</p>
                            @endforelse
							
							<!-- /Product Single -->
						</div>
						<!-- /row -->
					</div>
					<!-- /STORE -->

					<!-- store bottom filter -->
					<div class="store-filter clearfix">
						<div class="pull-right">
							<ul class="store-pages">
                                {!! $products->links() !!}
							</ul>
						</div>
					</div>
					<!-- /store bottom filter -->
				</div>
				<!-- /MAIN -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
@endsection

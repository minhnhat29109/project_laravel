<!DOCTYPE html>
<html lang="en">

@include('frontend.includes.css')

<body>
    <!-- HEADER -->
    @include('frontend.includes.header')
    <!-- /HEADER -->

    <!-- NAVIGATION -->
    @include('frontend.includes.navbar')
    <!-- /NAVIGATION -->

    <!-- HOME -->
    @yield('slider')
    <!-- /HOME -->
    <!-- section -->
    {{-- <div class="section">
		<!-- container -->
		<div class="container">
			@foreach ($categories as $category)
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">{{$category->name}}</h2>
					</div>
				</div>
				<!-- section title -->

				<!-- Product Single -->
				@foreach ($products as $product)
				@if ($category->id == $product->category_id)
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
							<h2 class="product-name"><a href="#">{{$product->names}}</a></h2>
							<div class="product-btns">
								<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
								<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
								<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
							</div>
						</div>
					</div>
				</div>
				@endif
				@endforeach
				<!-- /Product Single -->
			</div>
			<!-- /row -->
			@endforeach
		</div>
		<!-- /container -->
	</div> --}}
    @yield('content')
    <!-- /section -->

    <!-- FOOTER -->
    @include('frontend.includes.footer')
    <!-- /FOOTER -->

    <!-- jQuery Plugins -->
    @include('frontend.includes.script')
<!-- Messenger Plugin chat Code -->
<div id="fb-root"></div>

<!-- Your Plugin chat code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>




</body>

</html>

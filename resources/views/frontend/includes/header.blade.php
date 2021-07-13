<header>
    <!-- top Header -->
    <div id="top-header">
        <div class="container">
            <div class="pull-left">
                <span>Welcome to E-shop!</span>
            </div>
    </div>
    <!-- /top Header -->

    <!-- header -->
    <div id="header">
        <div class="container">
            <div class="pull-left">
                <!-- Logo -->
                <div class="header-logo">
                    <a class="logo" href="{{route('frontend.home')}}">
                        <img src="/frontend/img/logo.png" alt="">
                    </a>
                </div>
                <!-- /Logo -->

                <!-- Search -->
                <div class="header-search">
                    <form>
                        <input class="form-control input-lg" name="product_name" id="product_name" type="text" placeholder="Tìm kiếm">
                        {{-- <select class="input search-categories">
                            <option value="0">All Categories</option>
                            @foreach ($categories as $category)
                                <option value="">{{$category->name}}</option>
                            @endforeach
                        </select> --}}
                        <div id="productList"></div>
                        <button class="search-btn"><i class="fa fa-search"></i></button>    
                        {{ csrf_field() }}
                    </form>
                </div>
                <!-- /Search -->
            </div>
            <div class="pull-right">
                <ul class="header-btns">
                    <!-- Account -->
                    <li class="header-account dropdown default-dropdown">
                        @if(Auth::check())
                        <div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
                            
                            <strong class="text-uppercase">
                                
                                    {{ Auth::user()->name }}    
                                
                                <i class="fa fa-caret-down"></i></strong>
                        </div>
                        @endif
                        @if(!Auth::check()) 
                        <a href="{{ route('login.form')}}" class="">Đăng nhập</a>
                        @endif
                        
                        <ul class="custom-menu">
                            <li><a href="#"><i class="fa fa-user-o"></i>Thông tin tài khoản</a></li>
                            <li><a href="{{route('logout')}}"><i class="fa fa-unlock-alt"></i> Đăng xuất</a></li>
                        </ul>
                    </li>
                    <!-- /Account -->

                    <!-- Cart -->
                    <li class="header-cart dropdown default-dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                            <div class="header-btns-icon">
                                <i class="fa fa-shopping-cart"></i>
                                <span class="qty">{{Cart::count()}}</span>
                            </div>
                            <strong class="text-uppercase">Giỏ hàng: </strong>
                            <br>
                            @if (Cart::count() > 0)
                                <strong>{{Cart::total()}}₫</strong>
                            @else
                                <strong>0.0₫</strong>    
                            @endif
                            
                        </a>
                        <div class="custom-menu">
                            <div id="shopping-cart">
                                <div class="shopping-cart-list">
                                    @forelse ((Cart::content()) as $item )
                                    <div class="product product-widget">
                                        @if ($item->options->image)
                                        <div class="product-thumb">
                                            <img src="{{url(\Illuminate\Support\Facades\Storage::url($item->options->image))}}" alt="">
                                        </div>
                                        @else
                                        <div class="product-thumb">
                                            <img src="https://www.strawberrycstore.com/images/no-product-image.png" alt="">
                                        </div>
                                        @endif
                                        <div class="product-body">
                                            <h3 class="product-price">{{number_format($item->price)}}₫
                                                <span class="qty"> x {{$item->qty}}</span>
                                            </h3>
                                            <h2 class="product-name"><a href="#">{{$item->name}} </a></h2>
                                        </div>
                                        <a href="{{route('frontend.cart.remove', $item->rowId)}}"><button class="cancel-btn"><i class="fa fa-trash"></i></button></a>
                                    </div>
                                    @empty
                                        <p class="text-center text-danger">Giỏ hàng trống</p>
                                    @endforelse
                                </div>
                                @if (Cart::count() > 0)
                                    <div class="shopping-cart-btns">
                                        <a href="{{route('frontend.cart.index')}}"><button class="main-btn">Giỏ hàng</button></a>
                                        <a href="{{route('frontend.cart.index')}}"><button class="primary-btn">Thanh toán <i class="fa fa-arrow-circle-right"></i></button></a>
                                    </div>
                                @endif
                                
                            </div>
                        </div>
                    </li>
                    

                    
            
                    <!-- /Cart -->

                    <!-- Mobile nav toggle-->
                    <li class="nav-toggle">
                        <button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
                    </li>
                    <!-- / Mobile nav toggle -->
                </ul>
            </div>
        </div>
        <!-- header -->
    </div>
    <!-- container -->
</header>
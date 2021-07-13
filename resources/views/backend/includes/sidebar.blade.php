
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('frontend.home')}}" target="_blink" class="brand-link">
        <img src="https://printgo.vn/uploads/media/772948/thiet-ke-logo-shop-giay-18_1584095086.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Shoes Shop</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="{{ route('backend.dashboard')}}" class="nav-link {{request()->is('admin')? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Bảng điều khiển
                        </p>
                    </a>
                </li>
                {{-- menu --}}
                {{-- @if ($menus)
                    @foreach ($menus as $menu)
                        @include('backend.includes.category-children', ['category'=>$menu])
                    @endforeach
                @endif --}}
                <p></p>
                <li class="font-italic" style="color: #c2c7d0">-- Sản phẩm --</li>
                <li class="nav-item has-treeview {{ request()->url() == route('backend.products.create')
                 || request()->url() == route('backend.products.index')  ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-shopping-basket"></i>
                        <p>
                            Quản lý sản phẩm
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('backend.products.create')}}" class="nav-link {{request()->url() == route('backend.products.create') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tạo mới</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('backend.products.index')}}" class="nav-link {{request()->url() == route('backend.products.index') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách</p>
                            </a>
                        </li>
                    </ul>
                </li>
                
                
                <li class="nav-item has-treeview {{ request()->url() == route('backend.brands.create')
                    || request()->url() == route('backend.brands.index')  ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#" class="nav-link ">
                        <i class=" nav-icon far fa-copyright"></i>
                        <p>
                            Quản lý thương hiệu
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('backend.brands.create')}}" class="nav-link {{request()->url() == route('backend.brands.create') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tạo mới</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('backend.brands.index')}}" class="nav-link {{request()->url() == route('backend.brands.index') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview {{ request()->url() == route('backend.category.create')
                    || request()->url() == route('backend.category.index')  ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Quản lý danh mục
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('backend.category.create')}}" class="nav-link {{request()->url() == route('backend.category.create') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tạo mới</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('backend.category.index')}}" class="nav-link {{request()->url() == route('backend.category.index') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách</p>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li class="font-italic" style="color: #c2c7d0">-- Đơn hàng --</li>
                <li class="nav-item has-treeview {{ request()->url() == route('backend.order.index')  ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>
                            Quản lý đơn hàng
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        {{-- <li class="nav-item">
                            <a href="{{route('backend.order.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tạo mới</p>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{route('backend.order.index')}}" class="nav-link {{request()->url() == route('backend.order.index') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @can('login-admin')
                <li class="font-italic" style="color: #c2c7d0">-- Người dùng --</li>
                    <li class="nav-item has-treeview {{ request()->url() == route('backend.user.create')
                        || request()->url() == route('backend.user.index')  ? 'menu-is-opening menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-users"></i> 
                            <p>
                                Quản lý người dùng
                                
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('backend.user.create')}}" class="nav-link {{request()->url() == route('backend.user.create') ? 'active' : ''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Tạo mới</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('backend.user.index')}}" class="nav-link {{request()->url() == route('backend.user.index') ? 'active' : ''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Danh sách</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan
                
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

{{-- @dd($menu) --}}
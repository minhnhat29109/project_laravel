<li class="nav-item has-treeview">
    <a href="{{ route('backend.products.index') }}" class="nav-link">
        <i class="nav-icon fas fa-shopping-basket"></i>
        <p>
            {{$menu->name }}
            <i class="fas fa-angle-left right"></i>
            <span class="badge badge-info right">6</span>
        </p>
    </a>
    @if ($menu->parent_id > 0)
        
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Tạo mới</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="pages/charts/flot.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Danh sách</p>
                </a>
            </li>
        </ul>
    @endif
    
    
</li>
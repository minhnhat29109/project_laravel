<li class="nav-item has-treeview" style="border-bottom: 1px solid; margin-left: 10px;">
    <a href="/admin/products/{{$category->slug}}" class="nav-link">
            {{$category->name }}     
            @if ($category->children)  <i class="fas fa-angle-left right"></i> @endif
         </a>
    @if ($category->children)
        <ul class="nav nav-treeview">
            @foreach ($category->children as $children)
                <li class="nav-item"  >
                    @include("backend.includes.category-children", ['category'=>$children])
                </li>
            @endforeach
        </ul>
       
    @endif
    
    
</li>
<div class="sidebar__item">
    <h4>Menu</h4>
    @if ($menus)
        <ul>
            @foreach ($menus as $menu)
                <li><a href="{{route('showProductOfCategoryAuth', ['id' => $menu->id])}}">{{$menu->type}}</a></li>
            @endforeach
            
        </ul>
    @endif

</div>
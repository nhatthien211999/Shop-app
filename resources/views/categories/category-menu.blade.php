<div class="sidebar__item">
    <h4>Menu</h4>
    @if ($menus)
        <ul>
            @foreach ($menus as $menu)
                <li><a href="#">{{$menu->type}}</a></li>
            @endforeach
            
        </ul>
    @endif

</div>
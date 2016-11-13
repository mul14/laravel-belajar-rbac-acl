<div class="container">
    <div class="well">
        Menu di dalam kotak ini muncul berdasarkan table `menu_role`.
        <ul>
        @foreach($menus as $menu)
            <li><a href="{{ $menu->url }}">{{ $menu->name }}</a></li>
        @endforeach
        </ul>
    </div>
</div>

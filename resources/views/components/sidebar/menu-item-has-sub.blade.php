<div class="menu-item has-sub">
    <a href="#" class="menu-link">
        <span class="menu-icon">
            <i class="fi fi-br-{{ $menuIcon }}"></i>
        </span>
        <span class="menu-text">{{ $menuText }}</span>
        <span class="menu-caret"><b class="caret"></b></span>
    </a>
    <div class="menu-submenu">
        @if (is_array($menuItems))
            @foreach ($menuItems as $menuItem)
                <div class="menu-item">
                    <a href="{{ $menuItem['menuLink'] }}" class="menu-link">
                        <span class="menu-text">{{ $menuItem['menuText'] }}</span>
                    </a>
                </div>
            @endforeach
        @endif
    </div>
</div>

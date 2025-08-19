<div class="nav-wizards-container">
    <nav class="nav nav-wizards-3 mb-2">
        @foreach ($steps as $step)
            <div class="nav-item col">
                <a class="nav-link {{ $step['active'] ? 'active' : '' }}" href="#{{ $step['id'] }}" data-bs-toggle="tab">
                    <div class="nav-dot"></div>
                    <div class="nav-title text-center">{{ $step['title'] }}</div>
                    <div class="nav-text">{{ $step['description'] }}</div>
                </a>
            </div>
        @endforeach
    </nav>

    <hr>

    <div class="tab-content pt-4">
        {{ $slot }}
    </div>

</div>

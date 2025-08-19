@props([
    'pageTitle' => '',
])

<div class="d-flex justify-content-between mb-5">
    <h1 class="cal-sans-regular fs-36px">{{ $pageTitle }}</h1>
    <div>
        {{ $slot }}
    </div>
</div>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.head', [
    'title' => 'WeeNorth Network | Changing The Face Of Industrial Trades In Northern
        Ghana'
])
</head>

<body>

    <!-- BEGIN #app -->
    <div id="app" class="app">
        @include('partials.navbar')

        @yield('content')

        @include('partials.footer')


    </div>
    <!-- END #app -->


    @if (Route::has('login'))
        <div class="h-14.5 hidden lg:block"></div>
    @endif
</body>
<script src="{{ asset('js/app.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/vendor.min.js') }}" type="text/javascript"></script>

</html>

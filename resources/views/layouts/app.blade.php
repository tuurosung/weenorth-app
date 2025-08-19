<!DOCTYPE html>
<html lang="en">

@include('partials.head')

<link rel="stylesheet" href="{{ asset('css/app-styles.css') }}">
<body>
    <!-- BEGIN #app -->
    <div id="app" class="app">
        @include('layouts.partials.navbar')

        @include('layouts.partials.sidebar')

        <!-- BEGIN #content -->
        <div id="content" class="app-content">

            @yield('content')

        </div>
        <!-- END #content -->

        <!-- BEGIN btn-scroll-top -->
        <a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
        <!-- END btn-scroll-top -->

    </div>
    <!-- END #app -->

    @include('layouts.partials.footer')

    @yield('js')

    @if(session()->has('success'))
        <script>
            Toastify({
                    text: " {{ Session::get('success') }} ",
                    duration: 3000,
                    position: 'center',
                    // className: "danger",
                    style: {
                        // background: "#e6180d",
                    },
                    offset: {
                        x: 50, // horizontal axis - can be a number or a string indicating unity. eg: '2em'
                        y: 90 // vertical axis - can be a number or a string indicating unity. eg: '2em'
                    },
                }).showToast();
        </script>
    @endif


    @if (session()->has('error'))
        <script>
            Toastify({
                    text: "{{ Session::get('error') }}",
                    duration: 4000,
                    position: 'center',
                    // className: "danger",
                    style: {
                        background: "#e6180d",
                    },
                    offset: {
                        x: 50, // horizontal axis - can be a number or a string indicating unity. eg: '2em'
                        y: 90 // vertical axis - can be a number or a string indicating unity. eg: '2em'
                    },
                }).showToast();
        </script>
    @endif
</body>
</html>

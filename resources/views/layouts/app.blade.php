<!DOCTYPE html>
<html lang="en">

@include('partials.head')
<style>
    body {
        font-family: 'Avante';
    }
</style>
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
</body>

</html>

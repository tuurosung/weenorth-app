<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>{{ $title ?? config('app.name') }}</title>

<link rel="icon" href="/favicon.ico" sizes="any">
<link rel="icon" href="/favicon.svg" type="image/svg+xml">
<link rel="apple-touch-icon" href="/apple-touch-icon.png">

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />


<link href="{{ asset('css/app.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/vendor.min.css') }}" type="text/css" rel="stylesheet" />
<link href="{{ asset('css/toastify.min.css') }}" type="text/css" rel="stylesheet" />

<link href="{{ asset('css/ui.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('fontawesome/css/all.css') }}" type="text/css" rel="stylesheet" />

<link rel="stylesheet" type="text/stylesheet" href="{{ asset('font/BespokeSans/Fonts/WEB/css/bespoke-sans.css') }}">
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.css" />
<link rel="stylesheet" type="text/stylesheet" href="{{ asset('css/datepicker.css') }}">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />



    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cal+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Pro:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!-- Display Icons -->
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-regular-chubby/css/uicons-regular-chubby.css'>

    <!-- Summernote Text Editor -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">



    <!-- required js / css -->
    <link href="{{ asset('css/jquery.tagit.css') }}" rel="stylesheet">

    <!-- DataTables -->
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
        <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet" /> -->
        <link href="https://cdn.datatables.net/2.3.2/css/dataTables.bootstrap5.css" rel="stylesheet" />


    <!-- WeeNorth CSS -->
    <link href="{{ asset('css/weenorth.css') }}" type="text/css" rel="stylesheet" />

@vite(['resources/css/app.css', 'resources/js/app.js'])


<style type="text/css">
    @font-face {
        font-family: 'Helvetica Neue';
        font-weight: 300;
        font-style: normal;
        src: url('{{ asset('font/helvetica/HelveticaNeueUltraLight.otf') }}');
    }

    @font-face {
        font-family: 'Helvetica Neue';
        src: url('{{ asset('font/helvetica/HelveticaNeueRoman.otf') }}');
        font-weight: normal;
        font-style: normal;
    }

    @font-face {
        font-family: 'Helvetica Neue';
        src: url('{{ asset('font/helvetica/HelveticaNeueMedium.otf') }}');
        font-weight: 500;
        font-style: normal;
    }

    @font-face {
        font-family: 'Helvetica Neue';
        src: url('{{ asset('font/helvetica/HelveticaNeueBold.otf') }}');
        font-weight: 600;
        font-style: normal;
    }


    @font-face {
        font-family: 'BespokeSans-Regular';
        src: url('{{ asset('font/BespokeSans/Fonts/WEB/fonts/BespokeSans-Regular.woff2') }}');
        font-weight: 400;
        font-display: swap;
        font-style: normal;
    }

    @font-face {
        font-family: 'BespokeSans-Medium';
        src: url('{{ asset('font/BespokeSans/Fonts/WEB/fonts/BespokeSans-Medium.woff2') }}');
        font-weight: 500;
        font-display: swap;
        font-style: normal;
    }

    @font-face {
        font-family: 'BespokeSans-Bold';
        src: url('{{ asset('font/BespokeSans/Fonts/WEB/fonts/BespokeSans-Bold.woff2') }}');
        font-weight: 600;
        font-display: swap;
        font-style: normal;
    }

    @font-face {
        font-family: 'Avante';
        src: url({{ asset('font/Avante/ITCAvantGardePro-Md.otf') }});
        font-weight: normal;
        font-style: normal;
    }

    .bootbox .modal-header {
        display: none;
    }

    .bootbox-body {
        font-size: 18px;
    }
</style>

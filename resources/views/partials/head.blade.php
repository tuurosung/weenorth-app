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

    <link href="{{ asset('matdash/css/styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/stylesheet" href="{{ asset('css/datepicker.css') }}">

    <!-- WeeNorth CSS -->
    <link href="{{ asset('css/weenorth.css') }}" type="text/css" rel="stylesheet" />

    <!-- only load vite if we are not in production -->
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
        src: url("{{ asset('font/BespokeSans/Fonts/WEB/fonts/BespokeSans-Medium.woff2') }}");
        font-weight: 500;
        font-display: swap;
        font-style: normal;
    }

    @font-face {
        font-family: 'BespokeSans-Bold';
        src: url("{{ asset('font/BespokeSans/Fonts/WEB/fonts/BespokeSans-Bold.woff2') }}");
        font-weight: 600;
        font-display: swap;
        font-style: normal;
    }

    @font-face {
        font-family: 'Avante';
        src: url("{{ asset('font/Avante/ITCAvantGardePro-Md.otf') }}");
        font-weight: normal;
        font-style: normal;
    }

    .cal-sans {
        font-family: 'Cal Sans', sans-serif;
    }

    .bespoke-sans-regular {
        font-family: 'BespokeSans-Regular', sans-serif;
    }

    .marcellus {
        font-family: 'Marcellus', serif;
    }

    .jost {
        font-family: 'Jost', sans-serif;
    }


    .bootbox .modal-header {
        display: none;
    }

    .bootbox-body {
        font-size: 18px;
    }

    body {
            font-family: 'Avante' !important;
            font-weight: 500;
            font-size: 0.835rem;
            /* background-color: #fff; */
        }

    .table > :not(caption) > * > * {
        /* color: #000000; */
    }

    .nav-link {
            color: #000;
            font-weight: 500;
        }

        .custom-table>tbody>tr>td {
            font-weight: 500;
            font-size: 12px;
        }

        .custom-table>thead>tr>th {
            font-weight: 500;
            font-size: 12px;
        }

        .nav-link.active {
            /* color: blue !important; */
        }

        .nav-pills .nav-link {
            border-radius: var(--bs-nav-pills-border-radius) !important;
        }

        .form-control,
        .form-select,
        .select2-container .select2-selection--single {
            border: 1px solid #ececec;
            border-top-color: rgb(236, 236, 236);
            border-right-color: rgb(236, 236, 236);
            border-bottom-color: rgb(236, 236, 236);
            border-left-color: rgb(236, 236, 236);
            border-radius: 5px;
            height: 40px;
            /* box-shadow: none; */
            /* padding-left: 20px; */
            font-size: 14px;
            width: 100%;

            --bs-border-opacity: 1;
            border-color: rgba(var(--bs-gray-300-rgb), var(--bs-border-opacity)) !important;

            box-shadow: 0 .125rem .25rem rgba(var(--bs-black-rgb), .075) !important;
        }

        .form-control:focus {
            outline: none !important;
            border-color: var(--primary-color) !important;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1) !important;
        }


        .datatables>tbody>tr>td,
        .datatables>tfoot>tr>td {
            padding-right: 20px;
        }

        .table-warning {
            --bs-table-bg: #ffab00 !important;
        }

        .table-danger {
            --bs-table-bg: #d60000 !important;
            --bs-table-color: #fff !important;
        }

        .table-danger a {
            color: #fff !important;
        }

        .nav-link {
            font-size: 14px;
        }

        .card-body {
            color: #000;
        }

        .note-editor.note-frame .note-toolbar .note-btn-group>.note-btn,
        .note-editor.note-frame {
            color: #000;
        }

        :root {
            --bs-body-color: #000;
        }

        .nav-tabs {
            --bs-nav-tabs-border-width: 0;
            --bs-nav-tabs-border-color: var(--bs-border-color);
            --bs-nav-tabs-border-radius: 10px;
            --bs-nav-tabs-link-hover-border-color: var(--bs-secondary-bg) var(--bs-secondary-bg) var(--bs-border-color);
            --bs-nav-tabs-link-active-color: #fff;
            --bs-nav-tabs-link-active-bg: #635bff;
            --bs-nav-tabs-link-active-border-color: var(--bs-border-color) var(--bs-border-color) #635bff;
        }

        i[class^="fi-sr-"]::before, i[class*=" fi-sr-"]::before, span[class^="fi-sr-"]::before, span[class*="fi-sr-"]::before {
            line-height: 1.5 !important;
        }

        .form-label {
            font-weight: 500;
        }

        .btn-sm {
            padding-top: 0.5rem !important;
            padding-bottom: 0.5rem !important;
            padding-left: 1rem !important;
            padding-right: 1rem !important;
            font-size: 0.765625rem !important;
            border-radius: 8px !important;
            border:none;
        }

        .form-select{
            --bs-form-select-bg-img: url({{ asset('images/svgs/caret-down.svg') }}) !important;
        }
</style>

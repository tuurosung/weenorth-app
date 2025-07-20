<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>{{ $title ?? config('app.name') }}</title>

<link rel="icon" href="/favicon.ico" sizes="any">
<link rel="icon" href="/favicon.svg" type="image/svg+xml">
<link rel="apple-touch-icon" href="/apple-touch-icon.png">

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.min.css" rel="stylesheet" /> -->

<link href="{{ asset('css/app.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/vendor.min.css') }}" type="text/css" rel="stylesheet" />
<link href="{{ asset('css/weenorth.css') }}" type="text/css" rel="stylesheet" />
<link href="{{ asset('fontawesome/css/all.css') }}" type="text/css" rel="stylesheet" />
<link rel="stylesheet" type="text/stylesheet" href="{{ asset('font/BespokeSans/Fonts/WEB/css/bespoke-sans.css') }}">

<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.min.css" rel="stylesheet" /> -->

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Cal+Sans&family=Crimson+Pro:ital,wght@0,200..900;1,200..900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet">

<link rel='stylesheet'
    href='https://cdn-uicons.flaticon.com/3.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>


<style>
@font-face {
    font-family: 'Helvetica Neue';
    src: url('{{ asset('font/helvetica/HelveticaNeueUltraLight.otf') }}');
    font-weight: 300;
    font-style: normal;
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
</style>
@vite(['resources/css/app.css', 'resources/js/app.js'])

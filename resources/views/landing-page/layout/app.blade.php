<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="HVC" />
    <meta name="description" content="HVC - Historical Variety Clothes">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HVC | Historical Variety Clothes</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/plugins.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/glightbox/glightbox.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/jquery-steps/jquery.steps.css') }}" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alumni+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    @stack('styles')
</head>

<body>
    <div class="body-inner">
        @if(isset($page) && $page == "Auth")
            @yield('auth')
        @else
            @include('landing-page.layout.header')
            @yield('content')
            @include('landing-page.layout.footer')
        @endif
    </div>

    <a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/functions.js') }}"></script>
    <script src="{{ asset('assets/plugins/glightbox/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-steps/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/plugins/validate/validate.min.js') }}"></script>
    @stack('scripts')
</body>

</html>
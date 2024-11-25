<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">

<title>HVC | {{ $page }}</title>
<meta content="HVC | {{ $page }}" name="description">
<meta content="HVC | {{ $page }}" name="keywords">

<link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

<link href="https://fonts.gstatic.com" rel="preconnect">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<link href="{{ asset('back-assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('back-assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
<link href="{{ asset('back-assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
<link href="{{ asset('back-assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
<link href="{{ asset('back-assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
<link href="{{ asset('back-assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
<link href="{{ asset('back-assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
<link href="{{ asset('back-assets/vendor/izitoast/css/iziToast.min.css') }}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.18/dist/sweetalert2.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/tagify/3.22.1/tagify.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
<link href="{{ asset('back-assets/css/style.css') }}" rel="stylesheet">
</head>

<body>
@include('dashboard.layout.header')
@include('dashboard.layout.sidenav')
    @yield('content')
@include('dashboard.layout.footer')

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<link href="{{ asset('back-assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">

<script src="{{ asset('back-assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('back-assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('back-assets/vendor/chart.js/chart.umd.js') }}"></script>
<script src="{{ asset('back-assets/vendor/echarts/echarts.min.js') }}"></script>
<script src="{{ asset('back-assets/vendor/quill/quill.min.js') }}"></script>
<script src="{{ asset('back-assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
<script src="{{ asset('back-assets/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('back-assets/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ asset('back-assets/vendor/izitoast/js/iziToast.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.18/dist/sweetalert2.all.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tagify/3.22.1/tagify.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>
@stack('scripts')

<script src="{{ asset('back-assets/js/main.js') }}"></script>

</body>

</html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ ($breadcrumb = Breadcrumbs::current()) ? $breadcrumb->title : 'Laziz Accounting' }} - Sistem Akuntansi Terbaik #1</title>
    <meta content="Aplikasi terbaik untuk memanegement keuangan perusahaan." name="description" />
    <meta content="Abdul El-Aziz" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

    <!-- App css -->
    <link href="{{asset('assets/css/config/default/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="{{asset('assets/css/config/default/app.min.css')}}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

    <link href="{{asset('assets/css/config/default/bootstrap-dark.min.css')}}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
    <link href="{{asset('assets/css/config/default/app-dark.min.css')}}" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />
    <!-- icons -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
    @livewireStyles

<!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body class="loading authentication-bg authentication-bg-pattern">
{{$slot}}
<!-- Vendor js -->
<script src="{{asset('assets/js/vendor.min.js')}}"></script>
<!-- App js -->
<script src="{{asset('assets/js/app.min.js')}}"></script>
@livewireScripts
</body>
</html>

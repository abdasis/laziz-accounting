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
        <link rel="shortcut icon" href="{{asset('themes/images/favicon.ico')}}">
        <link href="{{asset('themes/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('themes/css/config/default/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
        <link href="{{asset('themes/css/config/default/app.min.css')}}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />
        <link href="{{asset('themes/css/config/default/bootstrap-dark.min.css')}}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
        <link href="{{asset('themes/css/config/default/app-dark.min.css')}}" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <link href="{{asset('themes/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{asset('themes/css/styles.css')}}">
        @stack('css')
        @vite(['resources/js/app.js'])
    </head>
    <body class="loading"  data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": false}, "topbar" : {"color" : "light"},  "showRightSidebarOnPageLoad": false}'>
    <div id="wrapper">
        <livewire:organisms.navbar/>
        <livewire:organisms.sidebar/>
        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    {{Breadcrumbs::render()}}
                    {{$slot}}
                </div>
            </div>
            <livewire:organisms.footer/>
        </div>
    </div>
    <script src="{{asset('themes/js/vendor.min.js')}}"></script>
    <script src="{{asset('themes/js/app.min.js')}}"></script>
    @livewireScripts
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::scripts />
    @stack('scripts')
    <script>
        $(document).on('select2:open', () => {
            document.querySelector('.select2-search__field').focus();
        });
    </script>
    </body>
</html>







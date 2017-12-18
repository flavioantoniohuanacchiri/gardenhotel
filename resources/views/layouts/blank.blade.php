<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title> {{\Route::currentRouteName()}} | {{ trans('master.name') }} </title>

        <!-- Bootstrap -->
        <link href="{{ asset("css/bootstrap.min.css") }}" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="{{ asset("css/font-awesome.min.css") }}" rel="stylesheet">
        <!-- Custom Theme Style -->
        <link href="{{ asset("css/gentelella.min.css") }}" rel="stylesheet">
        <!-- Add Theme Style -->
        <link rel="stylesheet" href="{{ asset("css/dataTables.bootstrap.min.css") }}">
        <link rel="stylesheet" href="{{ asset("css/responsive.bootstrap.min.css") }}">
        <link rel="stylesheet" href="{{ asset("css/fixedHeader.bootstrap.min.css") }}">
        <link rel="stylesheet" href="{{ asset("css/scroller.bootstrap.min.css") }}">
        <link rel="stylesheet" href="{{ asset("css/bootstrap-select.min.css") }}">
        <link rel="stylesheet" href="{{ asset("css/sweetalert2.min.css") }}">
        <link rel="stylesheet" href="{{ asset("css/toastr.min.css") }}">

        @stack('stylesheets')
        <link href="{{ asset("css/styles.css") }}" rel="stylesheet">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <style>
            #img-form{
                display: block;
                width: 300px;
                height: 300px;
            }
        </style>
    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">

                @include('includes/sidebar')

                @include('includes/topbar')

                @yield('main_container')

            </div>
        </div>

        <!-- jQuery -->
        <script src="{{ asset("js/jquery.min.js") }}"></script>
        <!-- Bootstrap -->
        <script src="{{ asset("js/bootstrap.min.js") }}"></script>
        <script src="{{ asset("js/sweetalert2.min.js") }}"></script>
        <!-- DataTables -->
        <script src="{{ asset("js/jquery.dataTables.min.js") }}"></script>
        <script src="{{ asset("js/dataTables.bootstrap.min.js") }}"></script>
        <script src="{{ asset("js/dataTables.responsive.min.js") }}"></script>
        <script src="{{ asset("js/responsive.bootstrap.js") }}"></script>
        <script src="{{ asset("js/bootstrap-select.min.js") }}"></script>
        <!-- Custom Theme Scripts -->
        <script src="{{ asset("js/gentelella.min.js") }}"></script>
        <script src="{{ asset("js/scripts.js") }}"></script>
        <script src="{{ asset("js/notify.min.js") }}"></script>
        <script src="{{ asset("js/jquery.numeric.min.js") }}"></script>
        <script src="{{ asset("js/toastr.min.js") }}"></script>
        @stack('scripts')

    </body>
</html>
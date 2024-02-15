<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dashboard | Blog Template system</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo url('theme')?>/dist/assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="<?php echo url('theme')?>/dist/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?php echo url('theme')?>/dist/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?php echo url('theme')?>/dist/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <!-- App js -->
    <script src="<?php echo url('theme')?>/dist/assets/js/plugin.js"></script>
</head>

<body data-sidebar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('layouts.header')

        @include('layouts.sidebar')
        
        @yield('content')

        @include('layouts.footer')

        @include('layouts.settings')

        @include('sweetalert::alert')

    </div>

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="<?php echo url('theme')?>/dist/assets/libs/jquery/jquery.min.js"></script>
    <script src="<?php echo url('theme')?>/dist/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo url('theme')?>/dist/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="<?php echo url('theme')?>/dist/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="<?php echo url('theme')?>/dist/assets/libs/node-waves/waves.min.js"></script>

    <!-- apexcharts -->
    <script src="<?php echo url('theme')?>/dist/assets/libs/apexcharts/apexcharts.min.js"></script>

    <!-- dashboard blog init -->
    <script src="<?php echo url('theme')?>/dist/assets/js/pages/dashboard-blog.init.js"></script>
    <script src="<?php echo url('theme')?>/dist/assets/js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- apexcharts -->
    <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

    <!-- dashboard blog init -->
    <script src="<?php echo url('theme')?>/dist/assets/js/pages/dashboard-blog.init.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- file-manager js -->
    <script src="<?php echo url('theme')?>/dist/assets/js/pages/file-manager.init.js"></script>

    <!-- email editor init -->
    <script src="<?php echo url('theme')?>/dist/assets/js/pages/email-editor.init.js"></script>

    <!-- App js -->
    <script src="<?php echo url('theme')?>/dist/assets/js/app.js"></script>
    <script src="<?php echo url('theme')?>/dist/assets/js/pages/profile.init.js"></script>

</body>
</html>
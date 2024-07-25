<?php
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('assets/backend/images/logo.png') }}" />
    <title>GTA Foundation - @yield('title')</title>
    @include('backend.include.style')
</head>

<body class="nav-md footer_fixed">
    <div class="container body">
        <div class="main_container">
            @include('backend.include.sidebar')
            @include('backend.include.header')
            @yield('content')
            @include('backend.include.footer')
        </div>
    </div>
    @include('backend.include.script')
    <script>
        $(document).ready(function() {
            $("@yield('header')").addClass("current-page");
        });
    </script>
    @yield('script')
</body>

</html>

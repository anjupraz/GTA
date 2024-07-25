<!DOCTYPE html>
@php
    $menuService = Data::getServiceCategory();
    $menuImpact = Data::getImpactCategory();
@endphp
<html lang="en-US" data-menu="leftalign">

<head>
    <link rel="shortcut icon" href="{{ asset('assets/backend/images/logo.png') }}" />
    <title>GTA Foundation - @yield('title')</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="format-detection" content="telephone=no">
    @include('frontend.include.style')
    @toastr_css
</head>

<body>

    @include('frontend.include.header')

    <main>
        @yield('content')
    </main>
    @include('frontend.include.footer')
    @include('frontend.include.script')
    @yield('script')
</body>

</html>

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

<body class="login" style="background:#44b4e4">
    @include('frontend.include.overlay')
    <div class="container-fluid" style="margin-top:50px">
        <div class="row">
            <div class="@yield('col-size')">
                <div class="x_panel">
                    <div class="x_title">
                        <a href="{{ route('index') }}"><img width="100" height="100" src="{{ asset('assets/backend/images/logo.png') }}" alt="" /></a>
                        <h3>@yield('cardHeader')</h3>
                    </div>
                    <div class="x_content">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('backend.include.script')
</body>

</html>

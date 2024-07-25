@extends('layouts.app')
@section('title', 'Login')
@section('cardHeader', 'Login')
@section('col-size','col-xs-12 col-sm-12 col-md-offset-4 col-md-4 text-center')
@section('content')
<form method="post" action="{{ route('login') }}">
    @csrf
    <div class="row">
        <div class="form-group col-xs-12">
            <label class="control-label" for="email">
                Email <span class="required">*</span>
            </label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="form-group col-xs-12">
            <label class="control-label" for="password">
                Password <span class="required">*</span>
            </label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            @error('password')
                <span class="invalid-feedback" role="alert">gUAAAAAHlO1YxcQFm4JUWkOM1TqVQayNZE
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="form-group col-xs-12">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">
                Remember Me
            </label>
            <br/>
            {{-- <div class="g-recaptcha" data-sitekey="6LeACPcUAAAAAIjNWxSnnYWZR8_gqVjwONxciBcx" data-callback="enableBtn"></div> --}}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-xs-4">
            {{-- <button id="enableBtn" type="submit" class="btn btn-primary" disabled="disabled">Login</button> --}}
            <button id="enableBtn" type="submit" class="btn btn-primary">Login</button>
        </div>
        <div class="form-group col-xs-8 forgot">
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    Forgot Your Password?
                </a>
            @endif
        </div>
    </div>
</form>
@endsection

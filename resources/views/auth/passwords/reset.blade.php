@extends('layouts.app')
@section('title', 'Reset Password')
@section('cardHeader', 'Reset Password')
@section('col-size','col-xs-12 col-sm-12 col-md-offset-4 col-md-4 text-center')
@section('content')
<form method="POST" action="{{ route('password.update') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <div class="row">
        <div class="form-group col-xs-12">
            <label class="control-label" for="email">
                Email <span class="required">*</span>
            </label>
            <input id="email" readonly="readonly" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
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
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="row">
    <div class="form-group col-xs-12">
        <label class="control-label" for="password-confirm">
                Confrim Password <span class="required">*</span>
            </label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-xs-12">
            <div class="g-recaptcha" data-sitekey="6LeACPcUAAAAAIjNWxSnnYWZR8_gqVjwONxciBcx" data-callback="enableBtn" ></div>
            <br/>
            <button id="enableBtn" type="submit" class="btn btn-primary" disabled="disabled">
                {{ __('Reset Password') }}
            </button>
        </div>
    </div>
</form>
@endsection

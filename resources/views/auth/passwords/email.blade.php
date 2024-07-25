@extends('layouts.app')
@section('title', 'Reset Password')
@section('cardHeader', 'Reset Password')
@section('col-size','col-xs-12 col-sm-12 col-md-offset-4 col-md-4 text-center')
@section('content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
<form method="POST" action="{{ route('password.email') }}">
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
            <div class="g-recaptcha" data-sitekey="6LeACPcUAAAAAIjNWxSnnYWZR8_gqVjwONxciBcx" data-callback="enableBtn"></div>
            <br/>
            <button id="enableBtn" type="submit" class="btn btn-primary" disabled="disabled">
                {{ __('Send Password Reset Link') }}
            </button>
        </div>
    </div>
</form>
@endsection

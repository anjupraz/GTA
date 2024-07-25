@extends('layouts.app')
@section('title', 'Register')
@section('cardHeader', 'Register')
@section('col-size','col-xs-12 col-sm-12 col-md-offset-3 col-md-6 text-center')
@section('content')
<form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="row">
        <div class="form-group col-xs-12">
            <label class="control-label" for="email">
                Email <span class="required">*</span>
            </label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="form-group col-xs-12 col-sm-6 col-md-6">
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
        <div class="form-group col-xs-12 col-sm-6 col-md-6">
            <label class="control-label" for="password-confirm">
                Confirm Password <span class="required">*</span>
            </label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-xs-12 col-sm-6 col-md-6">
            <label class="control-label" for="name">
                Full Name <span class="required">*</span>
            </label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-6">
            <label class="control-label" for="contact">
                Contact <span class="required">*</span>
            </label>
            <input id="contact" type="text" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ old('contact') }}" required autocomplete="contact">
            @error('contact')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="form-group col-xs-12 col-sm-6 col-md-6">
            <label class="control-label" for="gender">
                Gender <span class="required">*</span>
            </label>
            <select id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ old('gender') }}" required autocomplete="gender">
                <option value="0">Male</option>
                <option value="1">Female</option>
                <option value="2">Others</option>
            </select>
            @error('gender')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-6">
            <label class="control-label" for="country">
                Country <span class="required">*</span>
            </label>
            <select id="country" name="country" class="form-control">
                @include('include.country')
            </select>
            @error('country')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="form-group col-xs-12 col-sm-6 col-md-6">
            <div class="g-recaptcha" data-sitekey="6LeACPcUAAAAAIjNWxSnnYWZR8_gqVjwONxciBcx" data-callback="enableBtn"></div>
            <br/>
            <button id="enableBtn" type="submit" class="btn btn-primary" disabled="disabled">
                Register
            </button>
        </div>
    </div>
</form>
@endsection

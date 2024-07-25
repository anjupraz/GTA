@extends('layouts.backend')
@if($userType=="Admin")
    @section('title', 'Admin')
@else
    @section('title', 'Staff')
@endif
@section('header', '#menu_users')
@section('content')
<div class="right_col" role="main">
    <div class="row">
        <div class="col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    @if($userType=="Admin")
                        <h2>
                            Admin
                        </h2>
                    @else
                        <h2>
                            Staff
                        </h2>
                    @endif
                    
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        @if($userType=="Admin")
                            <form method="post" action="{{route('users.admin.store')}}" class="form-horizontal form-label-left" novalidate>
                        @else
                            <form method="post" action="{{route('users.staff.store')}}" class="form-horizontal form-label-left" novalidate>
                        @endif
                            @csrf
                            <div class="item form-group @error('email') bad @enderror">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="email" id="email" name="email" value="{{old('email')}}" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                                @error('email')
                                    <div class="alert">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="item form-group @error('password') bad @enderror">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Password <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="password" id="password" name="password" required="required" data-validate-length-range="7,20" class="form-control col-md-7 col-xs-12">
                                </div>
                                @error('password')
                                    <div class="alert">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password_confirmation">Confirm Password <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="password" id="password_confirmation" name="password_confirmation" data-validate-linked="password" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="item form-group @error('name') bad @enderror">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12"  name="name" value="{{old('name')}}" required="required" type="text">
                                </div>
                                @error('name')
                                    <div class="alert">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="item form-group @error('contact') bad @enderror">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contact">Contact <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="contact" class="form-control col-md-7 col-xs-12"  name="contact" value="{{old('contact')}}" required="required" type="tel">
                                </div>
                                @error('contact')
                                    <div class="alert">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="item form-group @error('gender') bad @enderror">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gender">Gender <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="gender" class="form-control col-md-7 col-xs-12" name="gender" required="required">
                                        <option value="0" @if(old('gender')==0) selected @endif>Male</option>
                                        <option value="1" @if(old('gender')==1) selected @endif>Female</option>
                                        <option value="2" @if(old('gender')==2) selected @endif>Other</option>
                                    </select>
                                </div>
                                @error('gender')
                                    <div class="alert">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="item form-group @error('country') bad @enderror">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="country">Country <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="country" class="form-control col-md-7 col-xs-12"  name="country" required="required">
                                        @include('include.country')
                                    </select>
                                </div>
                                @error('country')
                                    <div class="alert">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button id="send" type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

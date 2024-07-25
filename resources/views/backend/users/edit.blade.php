@extends('layouts.backend')
@section('title', 'Profile')
@section('header', '')
@section('content')
<div class="right_col" role="main">
    <div class="row">
        <div class="col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>
                        Profile
                    </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form method="post" action="{{route('users.profile.update')}}" class="form-horizontal form-label-left" enctype="multipart/form-data" novalidate>
                            @csrf
                            <div class="item form-group">
                                <div class="col-sm-offset-3 col-md-offset-3 col-md-6 col-sm-6 col-xs-12">
                                    @if($user->profile != null)
                                        <img id="preview" height="100" width="100" src="{{$user->profile}}" alt="profile" />
                                    @else
                                        <img id="preview" height="100" width="100" src="/assets/frontend/images/profile.jpg" alt="profile" />
                                    @endif
                                </div>
                            </div>
                            <div class="item form-group @error('profile') bad @enderror">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="profile">Profile <span class="required">*</span>
                                </label>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input data-preview="preview" id="profile" class="form-control col-md-7 col-xs-12 picture"  name="profile" type="file" accept="image/*">
                                </div>
                                @error('profile')
                                    <div class="alert">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="item form-group @error('name') bad @enderror">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12"  name="name" value="{{old('name',$user->name)}}" required="required" type="text">
                                </div>
                                @error('name')
                                    <div class="alert">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="item form-group @error('contact') bad @enderror">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contact">Contact <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="contact" class="form-control col-md-7 col-xs-12"  name="contact" value="{{old('contact',$user->contact)}}" required="required" type="tel">
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
                                        <option value="0" @if(old('gender',$user->gender)==0) selected @endif>Male</option>
                                        <option value="1" @if(old('gender',$user->gender)==1) selected @endif>Female</option>
                                        <option value="2" @if(old('gender',$user->gender)==2) selected @endif>Other</option>
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

@extends('layouts.backend')
@if ($type == 'Blog')
    @section('title', 'Blog Category')
    @section('header', '#menu_blog')
@elseif($type == 'Service')
    @section('title', 'Service')
    @section('header', '#menu_service')
@elseif($type == 'Team')
    @section('title', 'Designation')
    @section('header', '#menu_team')
@else
    @section('title', 'Working Areas')
    @section('header', '#menu_impact')
@endif
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>
                            @if ($type == 'Team')
                                Designation
                            @elseif($type == 'Service')
                                Service
                            @elseif($type == 'Impact')
                                Working Area
                            @else
                                {{ $type }} Category
                            @endif
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            @if ($type == 'Blog')
                                <form method="post" action="{{ route('blogs.category.save') }}" class="form-horizontal form-label-left" enctype="multipart/form-data" novalidate>
                                @elseif($type == 'Service')
                                    <form method="post" action="{{ route('service.category.save') }}" class="form-horizontal form-label-left" enctype="multipart/form-data" novalidate>
                                    @elseif($type == 'Impact')
                                        <form method="post" action="{{ route('impact.category.save') }}" class="form-horizontal form-label-left" enctype="multipart/form-data" novalidate>
                                        @else
                                            <form method="post" action="{{ route('team.category.save') }}" class="form-horizontal form-label-left" enctype="multipart/form-data" novalidate>
                            @endif
                            @csrf
                            <div class="item form-group">
                                <div class="col-sm-offset-3 col-md-offset-3 col-md-6 col-sm-6 col-xs-12">
                                    <img id="preview" height="100" width="100" src="/assets/frontend/images/profile.jpg" alt="profile" />
                                </div>
                            </div>
                            <div class="item form-group">
                                <div class="col-sm-offset-3 col-md-offset-3 col-md-6 col-sm-6 col-xs-12">
                                    @if ($type == 'Blog')
                                        <small> ( 150px * 150px )</small>
                                    @elseif($type == 'Service' || $type == 'Impact')
                                        <small> ( 900px * 636px )</small>
                                    @else
                                        <small> ( 150px * 150px )</small>
                                    @endif
                                </div>
                            </div>
                            <div class="item form-group @error('profile') bad @enderror">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="profile">Profile <span class="required">*</span>
                                </label>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input data-preview="preview" id="profile" class="form-control col-md-7 col-xs-12 picture" name="profile" type="file" accept="image/*">
                                </div>
                                @error('profile')
                                    <div class="alert">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="item form-group @error('title') bad @enderror">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="title" name="title" value="{{ old('title') }}" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                                @error('title')
                                    <div class="alert">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="item form-group @error('code') bad @enderror">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="code">Code <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="code" name="code" value="{{ old('code') }}" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                                @error('code')
                                    <div class="alert">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea id="description" name="description" required="required" class="form-control col-md-7 col-xs-12 summernote">{{ old('description') }}</textarea>
                                </div>
                                @error('description')
                                    <div class="alert">{{ $message }}</div>
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

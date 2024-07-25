@extends('layouts.backend')
@if ($category->post_type == 0)
    @section('title', 'Blog Category')
    @section('header', '#menu_blog')
@elseif($category->post_type == 9)
    @section('title', 'Service')
    @section('header', '#menu_service')
@elseif($category->post_type == 10)
    @section('title', 'Working Areas')
    @section('header', '#menu_impact')
@else
    @section('title', 'Designation')
    @section('header', '#menu_team')
@endif

@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>
                            @if ($category->post_type == 0)
                                Blog Category
                            @elseif($category->post_type == 9)
                                Service
                            @elseif($category->post_type == 10)
                                Working Area
                            @else
                                Designation
                            @endif
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <form method="post" action="{{ route('category.edit', ['id' => $category->id]) }}" class="form-horizontal form-label-left" enctype="multipart/form-data" novalidate>
                                @csrf
                                <div class="item form-group">
                                    <div class="col-sm-offset-3 col-md-offset-3 col-md-6 col-sm-6 col-xs-12">
                                        @if ($category->profile != null)
                                            <img id="preview" height="100" width="100" src="{{ $category->profile }}" alt="profile" />
                                        @else
                                            <img id="preview" height="100" width="100" src="/assets/frontend/images/profile.jpg" alt="profile" />
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
                                        <input type="text" id="title" name="title" value="{{ old('title', $category->title) }}" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                    @error('title')
                                        <div class="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea id="description" name="description" required="required" class="form-control col-md-7 col-xs-12 summernote">{{ old('description', $category->description) }}</textarea>
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

@extends('layouts.backend')
@section('title', 'Notice')
@section('header', '#menu_notice')
@section('content')
<div class="right_col" role="main">
    <form method="post" action="{{route('notice.update',['id' => $notice->id])}}" class="form-horizontal form-label-left" enctype="multipart/form-data" novalidate>
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-8">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>
                            Notice<small>[ code : {{$notice->code}} ]</small>
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="item form-group @error('title') bad @enderror">
                            <label class="col-md-12 col-sm-12 col-xs-12" for="title">Title <span class="required">*</span>
                            </label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="hidden" hidden="hidden" name="code" value="{{old('code',$notice->code)}}">
                                <input type="text" id="title" name="title" value="{{old('title',$notice->title)}}" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                            @error('title')
                                <div class="alert">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="item form-group @error('slug') bad @enderror">
                            <label class="col-md-12 col-sm-12 col-xs-12" for="slug">Link
                            </label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="text" id="slug" name="slug" value="{{old('slug',$notice->slug)}}" class="form-control col-md-7 col-xs-12">
                            </div>
                            @error('slug')
                                <div class="alert">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="item form-group">
                            <label class="col-md-12 col-sm-12 col-xs-12" for="description">Description <span class="required">*</span>
                            </label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <textarea style="resize: none" id="description" name="description" required="required" class="form-control col-md-7 col-xs-12">{{old('description',$notice->description)}}</textarea>
                            </div>
                            @error('description')
                                <div class="alert">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>
                            Featured image <small>( 1440px * 960px )</small> 
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                @if($notice->featured_gallery)
                                    <img id="preview" height="100" width="100" src="{{$notice->featured_gallery['media']}}" alt="profile" />
                                @else
                                    <img id="preview" height="100" width="100" src="/assets/frontend/images/profile.jpg" alt="profile" />
                                @endif
                            </div>
                        </div>
                        <div class="item form-group @error('featured_gallery') bad @enderror">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                @if($notice->featured_gallery)
                                    <input type="hidden" hidden="hidden" name="featured_gallery[id]" value="{{$notice->featured_gallery['id']}}">
                                @endif
                                <input data-preview="preview" id="featured_gallery" class="form-control col-md-12 col-xs-12 picture"  name="featured_gallery[media]" type="file">
                            </div>
                            @error('featured_gallery')
                                <div class="alert">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="x_panel">
                    <div class="x_title">
                        <h2>
                            Update
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="item form-group">
                            <div class="col-md-12">
                                <button id="send" type="submit" class="btn btn-primary">Publish</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
@section('script')
@endsection

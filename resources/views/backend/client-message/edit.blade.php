@extends('layouts.backend')
@section('title', 'Clients Message')
@section('header', '#menu_client')
@section('content')
<div class="right_col" role="main">
    <form method="post" action="{{route('client-message.update',['id' => $client->id])}}" class="form-horizontal form-label-left" enctype="multipart/form-data" novalidate>
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-8">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>
                            Clients Message<small>[ code : {{$client->code}} ]</small>
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="item form-group">
                            <label class="col-md-12 col-sm-12 col-xs-12" for="description">Client Message <span class="required">*</span>
                            </label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <textarea rows="10" style="resize: none" id="description" name="description" required="required" class="form-control col-md-7 col-xs-12">{{old('description',$client->description)}}</textarea>
                            </div>
                            @error('description')
                                <div class="alert">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="item form-group @error('title') bad @enderror">
                            <label class="col-md-12 col-sm-12 col-xs-12" for="title">Client Detail <span class="required">*</span>
                            </label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="hidden" hidden="hidden" name="code" value="{{old('code',$client->code)}}">
                                <textarea rows="5" style="resize: none" id="title" name="title" required="required" class="form-control col-md-7 col-xs-12">{{old('title',$client->title)}}</textarea>
                            </div>
                            @error('title')
                                <div class="alert">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4">
                {{-- <div class="x_panel">
                    <div class="x_title">
                        <h2>
                            Featured image
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                @if($client->featured_gallery)
                                    <img id="preview" height="100" width="100" src="{{$client->featured_gallery['media']}}" alt="profile" />
                                @else
                                    <img id="preview" height="100" width="100" src="/assets/frontend/images/profile.jpg" alt="profile" />
                                @endif
                            </div>
                        </div>
                        <div class="item form-group @error('featured_gallery') bad @enderror">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                @if($client->featured_gallery)
                                    <input type="hidden" hidden="hidden" name="featured_gallery[id]" value="{{$client->featured_gallery['id']}}" accept="image/*">
                                @endif
                                <input data-preview="preview" id="featured_gallery" class="form-control col-md-12 col-xs-12 picture"  name="featured_gallery[media]" type="file" accept="image/*">
                            </div>
                            @error('featured_gallery')
                                <div class="alert">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div> --}}
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

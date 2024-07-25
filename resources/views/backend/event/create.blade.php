@extends('layouts.backend')
@section('title', 'Events')
@section('header', '#menu_event')
@section('content')
<div class="right_col" role="main">
    <form method="post" action="{{route('event.save')}}" class="form-horizontal form-label-left" enctype="multipart/form-data" novalidate>
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-8">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>
                            Events
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="item form-group @error('title') bad @enderror">
                            <label class="col-md-12 col-sm-12 col-xs-12" for="title">Title <span class="required">*</span>
                            </label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="text" id="title" name="title" value="{{old('title')}}" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                            @error('title')
                                <div class="alert">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="item form-group @error('slug') bad @enderror">
                            <label class="col-md-12 col-sm-12 col-xs-12" for="slug">Slug <span class="required">*</span>
                            </label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="text" id="slug" name="slug" value="{{old('slug')}}" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                            @error('slug')
                                <div class="alert">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="item form-group @error('code') bad @enderror">
                            <label class="col-md-12 col-sm-12 col-xs-12" for="code">Code <span class="required">*</span>
                            </label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="text" id="code" name="code" value="{{old('code')}}" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                            @error('code')
                                <div class="alert">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="item form-group @error('video') bad @enderror">
                            <label class="col-md-12 col-sm-12 col-xs-12" for="code">Video Link
                            </label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="text" id="video" name="video" value="{{old('video')}}" class="form-control col-md-7 col-xs-12">
                            </div>
                            @error('video')
                                <div class="alert">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="item form-group">
                            <label class="col-md-12 col-sm-12 col-xs-12" for="description">Description <span class="required">*</span>
                            </label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <textarea id="description" name="description" required="required" class="form-control col-md-7 col-xs-12 summernote">{{old('description')}}</textarea>
                            </div>
                            @error('description')
                                <div class="alert">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="x_panel">
                    <div class="x_title">
                        <h2>
                            Event Schedule
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="item form-group @error('from_date') bad @enderror">
                            <label class="col-md-12 col-sm-12 col-xs-12" for="from_date">Start Date <span class="required">*</span>
                            </label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="date" id="from_date" value="{{old('from_date')}}" required="required" class="form-control col-md-7 col-xs-12"  name="from_date" >
                            </div>
                            @error('from_date')
                                <div class="alert">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="item form-group @error('to_date') bad @enderror">
                            <label class="col-md-12 col-sm-12 col-xs-12" for="to_date">End Date <span class="required">*</span>
                            </label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="date" id="to_date" value="{{old('to_date')}}" required="required" class="form-control col-md-7 col-xs-12"  name="to_date" >
                            </div>
                            @error('to_date')
                                <div class="alert">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="x_panel">
                    <div class="x_title">
                        <h2>
                            Documents
                            <button type="button" onclick="addDocument()" class="btn btn-primary btn-round">
                                <i class="fa fa-plus"></i>
                            </button>
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <th>S.no</th>
                                    <th>Name</th>
                                    <th>Documents</th>
                                    <th>Delete</th>
                                    <th>More</th>
                                </thead>
                                <tbody class="document_data">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="x_panel">
                    <div class="x_title">
                        <h2>
                            Gallery
                            <button type="button" onclick="add()" class="btn btn-primary btn-round">
                                <i class="fa fa-plus"></i>
                            </button>
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <th>S.no</th>
                                    <th>Gallery</th>
                                    <th>Upload</th>
                                    <th>Delete</th>
                                    <th>More</th>
                                </thead>
                                <tbody class="gallery_data">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>
                            Cover Image
                            <small>( 1440px * 960px )</small> 
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <img id="cover_preview" height="100" width="100" src="/assets/frontend/images/profile.jpg" alt="profile" />
                            </div>
                        </div>
                        <div class="item form-group @error('cover_gallery') bad @enderror">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input data-preview="cover_preview" id="cover_gallery" class="form-control col-md-12 col-xs-12 picture"  name="cover_gallery[media]" type="file" accept="image/*">
                            </div>
                            @error('cover_gallery')
                                <div class="alert">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="x_panel">
                    <div class="x_title">
                        <h2>
                            Featured Image <small>( 900px * 636px )</small>
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <img id="preview" height="100" width="100" src="/assets/frontend/images/profile.jpg" alt="profile" />
                            </div>
                        </div>
                        <div class="item form-group @error('featured_gallery') bad @enderror">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input data-preview="preview" id="featured_gallery" class="form-control col-md-12 col-xs-12 picture"  name="featured_gallery[media]" type="file" accept="image/*">
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
                            Brochure
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="item form-group @error('brochure') bad @enderror">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input id="brochure" class="form-control col-md-12 col-xs-12"  name="brochure[media]" type="file" accept="application/pdf">
                            </div>
                            @error('brochure')
                                <div class="alert">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="x_panel">
                    <div class="x_title">
                        <h2>
                            Publish
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
    @include('backend.event.script')
    <script>
        $('#title').change(function(){
            var current_year=(new Date).getFullYear();
            var title=$('#title').val();
            var slug="event-"+title.replace(/\s/g,"-")+"-"+current_year;
            $('#slug').val(slug.toLowerCase());
        });
    </script>
@endsection

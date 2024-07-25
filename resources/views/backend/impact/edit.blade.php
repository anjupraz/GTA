@extends('layouts.backend')
@section('title', 'Impacts')
@section('header', '#menu_impact')
@section('content')
<div class="right_col" role="main">
    <form method="post" action="{{route('impact.update',['id' => $impact->id])}}" class="form-horizontal form-label-left" enctype="multipart/form-data" novalidate>
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-8">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>
                            Impact<small>[ code : {{$impact->code}} ]</small>@if($impact->slug)<small>[ slug : <a href="https://gtanepal.org/impact/{{$impact->slug}}" target="_blank"><strong>https://gtanepal.org/blog/{{$impact->slug}}</strong></a> ]</small>@endif
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="item form-group @error('title') bad @enderror">
                            <label class="col-md-12 col-sm-12 col-xs-12" for="title">Title <span class="required">*</span>
                            </label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="hidden" hidden="hidden" name="code" value="{{old('code',$impact->code)}}">
                                <input type="hidden" hidden="hidden" name="slug" value="{{old('slug',$impact->slug)}}">
                                <input type="text" id="title" name="title" value="{{old('title',$impact->title)}}" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                            @error('title')
                                <div class="alert">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="item form-group">
                            <label class="col-md-12 col-sm-12 col-xs-12" for="description">Description <span class="required">*</span>
                            </label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <textarea id="description" name="description" required="required" class="form-control col-md-7 col-xs-12 summernote">{{old('description',$impact->description)}}</textarea>
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
                                    @foreach($impact->gallery as $gallery)
                                        <tr class="gallery_content" id="gallery_content_{{$loop->iteration-1}}">
                                            <td class="gallery_number">
                                                {{$loop->iteration}}
                                            </td>
                                            <td>
                                                <img class="gallery_preview" id="preview_{{$loop->iteration-1}}" height="100" width="100" src="{{$gallery['media']}}" alt="profile" />
                                            </td>
                                            <td>
                                                <input type="hidden" hidden="hidden" value="{{$gallery['id']}}" name="gallery['{{$loop->iteration-1}}'][id]">
                                                <input data-preview="preview_{{$loop->iteration-1}}" id="gallery_{{$loop->iteration-1}}" class="gallery_input form-control col-md-7 col-xs-12 picture"  name="gallery['{{$loop->iteration-1}}'][media]" type="file" accept="image/*">
                                            </td>
                                            <td>
                                                <button type="button" data-del="false" data-toggle="modal" data-target="#modal_{{$gallery['id']}}" class="gallery_delete btn btn-danger btn-round">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </td>
                                            <td>
                                                <button type="button" onclick="add()" class="btn btn-primary btn-round">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="modal_{{$gallery['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                        </button>
                                                        <h4 class="modal-title" id="myModalLabel_{{$gallery['id']}}">Warning !!!</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4>You are about to delete the media.</h4>
                                                        <p>Once the category is deleted it cannot be recovered.</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="{{route('gallery.delete',['id' => $gallery['id']])}}" class="btn btn-danger">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
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
                            Blog category
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="item form-group @error('category_id') bad @enderror">
                            <select id="category_id" class="form-control col-md-12 col-sm-12 col-xs-12" name="category_id" required="required">
                                @foreach($categoryList as $category)
                                    <option value="{{$category->id}}" @if(old('category_id',$impact->category_id)==$category->id) selected @endif>{{$category->title}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
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
                                @if($impact->featured_gallery)
                                    <img id="preview" height="100" width="100" src="{{$impact->featured_gallery['media']}}" alt="profile" />
                                @else
                                    <img id="preview" height="100" width="100" src="/assets/frontend/images/profile.jpg" alt="profile" />
                                @endif
                            </div>
                        </div>
                        <div class="item form-group @error('featured_gallery') bad @enderror">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                @if($impact->featured_gallery)
                                    <input type="hidden" hidden="hidden" name="featured_gallery[id]" value="{{$impact->featured_gallery['id']}}">
                                @endif
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
                            Documents
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="item form-group @error('brochure') bad @enderror">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                @if($impact->brochure)
                                    <input type="hidden" hidden="hidden" name="brochure[id]" value="{{$impact->brochure['id']}}">
                                @endif
                                <input id="brochure" class="form-control col-md-12 col-xs-12 picture"  name="brochure[media]" type="file" accept="application/pdf">
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
    @include('backend.impact.script')
@endsection

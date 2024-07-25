@extends('layouts.backend')
@section('title', 'Events')
@section('header', '#menu_event')
@section('content')
<div class="right_col" role="main">
    <form method="post" action="{{route('event.update',['id' => $event->id])}}" class="form-horizontal form-label-left" enctype="multipart/form-data" novalidate>
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-8">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>
                            Events<small>[ code : {{$event->code}} ]</small>@if($event->slug)<small>[ slug : <a href="https://gtanepal.org/event/{{$event->slug}}" target="_blank"><strong>https://gtanepal.org/event/{{$event->slug}}</strong></a> ]</small>@endif
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="item form-group @error('title') bad @enderror">
                            <label class="col-md-12 col-sm-12 col-xs-12" for="title">Title <span class="required">*</span>
                            </label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="hidden" hidden="hidden" name="code" value="{{old('code',$event->code)}}">
                                <input type="hidden" hidden="hidden" name="slug" value="{{old('slug',$event->slug)}}">
                                <input type="text" id="title" name="title" value="{{old('title',$event->title)}}" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                            @error('title')
                                <div class="alert">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="item form-group @error('video') bad @enderror">
                            <label class="col-md-12 col-sm-12 col-xs-12" for="code">Video Link
                            </label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="text" id="video" name="video" value="{{old('video',$event->video)}}" class="form-control col-md-7 col-xs-12">
                            </div>
                            @error('video')
                                <div class="alert">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="item form-group">
                            <label class="col-md-12 col-sm-12 col-xs-12" for="description">Description <span class="required">*</span>
                            </label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <textarea id="description" name="description" required="required" class="form-control col-md-7 col-xs-12 summernote">{{old('description',$event->description)}}</textarea>
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
                                <input type="date" id="from_date" value="{{old('from_date',$event->from_date)}}" required="required" class="form-control col-md-7 col-xs-12"  name="from_date" >
                            </div>
                            @error('from_date')
                                <div class="alert">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="item form-group @error('to_date') bad @enderror">
                            <label class="col-md-12 col-sm-12 col-xs-12" for="to_date">End Date <span class="required">*</span>
                            </label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="date" id="to_date" value="{{old('to_date',$event->to_date)}}" required="required" class="form-control col-md-7 col-xs-12"  name="to_date" >
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
                                    @foreach($event->document as $gallery)
                                        <tr class="document_content" id="document_content_{{$loop->iteration-1}}">
                                            <td class="document_number">
                                                {{$loop->iteration}}
                                            </td>
                                            <td>
                                                <input type="text" name="document[{{$loop->iteration-1}}][name]" value="{{$gallery['name']}}" class="document_name form-control col-md-7 col-xs-12"/>
                                            </td>
                                            <td>
                                                <input type="hidden" hidden="hidden" value="{{$gallery['id']}}" name="document[{{$loop->iteration-1}}][id]">
                                                <input class="document_input form-control col-md-7 col-xs-12"  name="document[{{$loop->iteration-1}}][media]" type="file" accept="application/pdf">
                                            </td>
                                            <td>
                                                <button type="button" data-del="false" data-toggle="modal" data-target="#modal_{{$gallery['id']}}" class="gallery_delete btn btn-danger btn-round">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </td>
                                            <td>
                                                <button type="button" onclick="addDocument()" class="btn btn-primary btn-round">
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
                                                        <p>Once the media is deleted it cannot be recovered.</p>
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
                                    @foreach($event->gallery as $gallery)
                                        <tr class="gallery_content" id="gallery_content_{{$loop->iteration-1}}">
                                            <td class="gallery_number">
                                                {{$loop->iteration}}
                                            </td>
                                            <td>
                                                <img class="gallery_preview" id="preview_{{$loop->iteration-1}}" height="100" width="100" src="{{$gallery['media']}}" alt="profile" />
                                            </td>
                                            <td>
                                                <input type="hidden" hidden="hidden" value="{{$gallery['id']}}" name="gallery[{{$loop->iteration-1}}][id]">
                                                <input data-preview="preview_{{$loop->iteration-1}}" id="gallery_{{$loop->iteration-1}}" class="gallery_input form-control col-md-7 col-xs-12 picture"  name="gallery[{{$loop->iteration-1}}][media]" type="file" accept="image/*">
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
                                                        <p>Once the media is deleted it cannot be recovered.</p>
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
                            Cover Image 
                            <small>( 1440px * 960px )</small> 
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                @if($event->cover_gallery)
                                    <img id="cover_preview" height="100" width="100" src="{{$event->cover_gallery['media']}}" alt="profile" />
                                @else
                                    <img id="cover_preview" height="100" width="100" src="/assets/frontend/images/profile.jpg" alt="profile" />
                                @endif
                            </div>
                        </div>
                        <div class="item form-group @error('cover_gallery') bad @enderror">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                @if($event->cover_gallery)
                                    <input type="hidden" hidden="hidden" name="cover_gallery[id]" value="{{$event->cover_gallery['id']}}">
                                @endif
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
                                @if($event->featured_gallery)
                                    <img id="preview" height="100" width="100" src="{{$event->featured_gallery['media']}}" alt="profile" />
                                @else
                                    <img id="preview" height="100" width="100" src="/assets/frontend/images/profile.jpg" alt="profile" />
                                @endif
                            </div>
                        </div>
                        <div class="item form-group @error('featured_gallery') bad @enderror">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                @if($event->featured_gallery)
                                    <input type="hidden" hidden="hidden" name="featured_gallery[id]" value="{{$event->featured_gallery['id']}}">
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
                            Brochure
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="item form-group @error('brochure') bad @enderror">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                @if($event->brochure)
                                    <input type="hidden" hidden="hidden" name="brochure[id]" value="{{$event->brochure['id']}}">
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
    @include('backend.event.script')
@endsection

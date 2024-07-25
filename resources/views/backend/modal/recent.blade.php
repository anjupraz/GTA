@php $user = Auth::user() @endphp
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 @if($user->role == UserType::Admin) col-lg-4 @else col-lg-6 @endif">
        <div class="x_panel recent">
            <div class="x_title">
                <h4>Recent Blogs</h4>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                @foreach($blogList as $blog)
                    <article class="media event">
                        <a class="pull-left date" data-toggle="modal" data-target="#modal_{{$blog->id}}">
                            <p class="month">{{ date('M', strtotime($blog->created_at)) }}</p>
                            <p class="day">{{ date('d', strtotime($blog->created_at)) }}</p>
                        </a>
                        <div class="media-body">
                            <a class="title" href="#" data-toggle="modal" data-target="#modal_{{$blog->id}}">{{$blog->title}}</a>
                            <p>{{$blog->categories()->title}}</p>
                            <p>{{$blog->user()->email}}</p>
                        </div>
                        <div class="modal fade" id="modal_{{$blog->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel">Blog Detail</h4>
                                    </div>
                                    <div class="modal-body">
                                        <h4>Blog :</h4>
                                        {!! html_entity_decode($blog->description) !!}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 @if($user->role == UserType::Admin) col-lg-4 @else col-lg-6 @endif">
        <div class="x_panel recent">
            <div class="x_title">
                <h4>Recent Galleries</h4>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                @foreach($galleryList as $gallery)
                    <article class="media event">
                        <a class="pull-left date" data-toggle="modal" data-target="#modal_{{$gallery->id}}">
                            <p class="month">{{ date('M', strtotime($gallery->created_at)) }}</p>
                            <p class="day">{{ date('d', strtotime($gallery->created_at)) }}</p>
                        </a>
                        <div class="media-body">
                            <a class="title" href="#" data-toggle="modal" data-target="#modal_{{$gallery->id}}">{{$gallery->title}}</a>
                            <p>{{$gallery->user()->email}}</p>
                        </div>
                        <div class="modal fade" id="modal_{{$gallery->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel">Gallery Detail</h4>
                                    </div>
                                    <div class="modal-body">
                                        <h4>Gallery :</h4>
                                        {!! html_entity_decode($gallery->description) !!}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </div>
    @if($user->role == UserType::Admin)
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
            <div class="x_panel recent">
                <div class="x_title">
                    <h4>Recent Contacts</h4>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @foreach($contactList as $contact)
                    <article class="media event">
                        <a class="pull-left date" data-toggle="modal" data-target="#modal_{{$contact->id}}">
                            <p class="month">{{ date('M', strtotime($contact->created_at)) }}</p>
                            <p class="day">{{ date('d', strtotime($contact->created_at)) }}</p>
                        </a>
                        <div class="media-body">
                            <a class="title" href="#" data-toggle="modal" data-target="#modal_{{$contact->id}}">{{$contact->name}}</a>
                            <p>{{$contact->email}}</p>
                            <p>{{$contact->phone}}</p>
                        </div>
                        <div class="modal fade" id="modal_{{$contact->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel">Message Detail</h4>
                                    </div>
                                    <div class="modal-body">
                                        <h4>Message :</h4>
                                        <p>{{$contact->message}}</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
</div>
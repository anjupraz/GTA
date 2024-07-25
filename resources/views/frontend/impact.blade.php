@extends('layouts.frontend')
@section('title', 'Impacts')
@section('content')
<div id="page_caption" class="hasbg parallax" style="text-align:center;height:300px; background-image:url({{asset('assets/frontend/images/impact.jpg')}});background-position: center center;color:#ffffff;">
    @include('frontend.include.overlay')
    <div class="page_title_wrapper">
        <div class="page_title_inner">
            <div class="page_title_content">
                <h1>{{$impact->categories()->title}}</h1>
                <div class="page_tagline" style="color:#ffffff;">{{$impact->title}}</div>
            </div>
        </div>
    </div>
</div>
<div id="page_content_wrapper" class="hasbg blog_wrapper">
    <div class="inner">
        <!-- Begin main content -->
        <div class="inner_wrapper">
            <div class="page_content_wrapper"></div>
            <div class="sidebar_content left_sidebar">
                <!-- Begin each blog post -->
                <div id="post-81" class="post-81 post type-post status-publish format-standard has-post-thumbnail hentry category-travel-tips tag-passport tag-travel tag-world">
                    <div class="post_wrapper">
                        <div class="post_content_wrapper">
                            <br/>
                            <div class="post_header_wrapper description-data">
                                <div class="post_header">
                                    <div class="post_detail single_post">
                                        {{-- <span class="post_info_date">
                                            <a href="#" title="{{$impact->title}}">{{ date('d M Y', strtotime($impact->created_at)) }}</a>
                                        </span> --}}
                                    </div>
                                    <div class="post_header_title">
                                        <h5><a href="#" title="{{$impact->title}}">{{$impact->title}}</a></h5>
                                    </div>
                                </div>
                                <br class="clear" />
                                <br/>
                                {!! html_entity_decode($impact->description) !!}
                                <br/>
                                @php $brochure = $impact->brochure(); @endphp 
                                @if($brochure)
                                    <a href="{{$brochure->media}}" target="_blank" class="fix wpcf7-form-control wpcf7-submit button">Download</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @if(count($impact->gallery()) > 1)
                    <div class="page_content_wrapper">
                        <div id="15675891342113546341" class="portfolio_filter_wrapper gallery grid portrait three_cols" data-columns="4">
                            @foreach($impact->gallery() as $gallery)
                                <div class="item element grid baseline classic3_cols animated1">
                                    <a data-caption="{{$impact->title}}" class="fancy-gallery" href="{{$gallery->media}}">
                                        <div class="one_third gallery3 grid static filterable portfolio_type themeborder" style="background-image:url({{$gallery->media}});">
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
                <!-- End each blog post -->
                <br class="clear" />
            </div>
            <div class="sidebar_wrapper left_sidebar laptop_view">
                @include('frontend.include.impact-sidebar')
            </div>
        </div>
        <!-- End main content -->
    </div>
</div>
<a class="mob-button mobile_view" data-modal href="#modal">
    <i class="fa fa-bars"></i>
</a>
<div id="modal" class="modal">
    <div id="page_content_wrapper" class="hasbg blog_wrapper">
        <div class="inner">
            <div class="sidebar_wrapper">
                @include('frontend.include.impact-sidebar')
            </div>
        </div>
    </div>
</div>
@endsection

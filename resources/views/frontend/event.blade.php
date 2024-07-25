@extends('layouts.frontend')
@section('title', $header.' Events')
@section('content')
<div id="page_caption" class="hasbg parallax" style="text-align:center;height:300px; background-image:url({{asset('assets/frontend/images/banner3.jpg')}});background-position: center center;color:#ffffff;">
    @include('frontend.include.overlay')
    <div class="page_title_wrapper">
        <div class="page_title_inner">
            <div class="page_title_content">
                <h1>{{$header}} Events</h1>
            </div>
        </div>
    </div>
</div>
<div id="page_content_wrapper" class="hasbg blog_wrapper">
    <div class="inner">
        <!-- Begin main content -->
        <div class="inner_wrapper">
            <div class="page_content_wrapper"></div>
                <div id="blog_grid_wrapper" class="sidebar_content ">
                    <!-- Begin each blog post -->
                    @if(count($eventList) > 0)
                        @foreach($eventList as $data)
                            @php
                                $event=$data->post();
                                $schedule=$event->schedule();
                            @endphp
                            <div id="post-{{$loop->iteration}}" class="post type-post hentry status-publish ">
                                <div class="post_wrapper grid_layout blog-box">
                                    <div class="post_img small static">
                                        <a href="{{route('event.slug',['slug' => $event->slug])}}">
                                            @if($event->featured())
                                                <div class="image" style="background-image:url({{$event->featured()->media}});"></div>
                                            @elseif($event->gallery())
                                                @if(count($event->gallery()) > 0)
                                                    <div class="image" style="background-image:url({{$event->gallery()[0]->media}});"></div>
                                                @else
                                                <div class="image" style="background-image:url({{asset('assets/frontend/upload/pexels-photo-211051-700x466.jpeg')}});"></div>
                                                @endif
                                            @else
                                                <div class="image" style="background-image:url({{asset('assets/frontend/upload/pexels-photo-211051-700x466.jpeg')}});"></div>
                                            @endif
                                        </a>
                                    </div>
                                    <div class="post_header_wrapper">
                                        <div class="post_header grid">
                                            <div class="post_detail single_post">
                                                <span class="post_info_date">
                                                    <a href="#" title="{{$event->title}}">
                                                        {{ date('d M Y', strtotime($schedule->from_date)) }} &nbsp;-&nbsp; {{ date('d M Y', strtotime($schedule->to_date)) }}
                                                    </a>
                                                </span>
                                            </div>
                                            <h6><a href="{{route('event.slug',['slug' => $event->slug])}}" title="{{$event->title}}">{!!  substr($event->title, 0, 25) !!}@if(strlen($event->title) > 25)...@endif</a></h6>
                                        </div>
                                        <p>
                                            {!!  substr(strip_tags($event->description), 0, 150) !!}...
                                            <div class="post_button_wrapper">
                                                <a class="readmore" href="{{route('event.slug',['slug' => $event->slug])}}">Read More<span class="ti-angle-right"></span></a>
                                            </div>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="no-data">
                            <h4>No Events Available</h4>
                        </div>
                    @endif
                </div>
                <div class="sidebar_wrapper laptop_view">
                    @include('frontend.include.event')
                </div>
            </div>
        </div>
    </div>
</div>
<a class="mob-button mobile_view" data-modal href="#modal">
    <i class="fa fa-bars"></i>
</a>
<div id="modal" class="modal">
    <div id="page_content_wrapper" class="hasbg blog_wrapper">
        <div class="inner">
            <div class="sidebar_wrapper">
                @include('frontend.include.event')
            </div>
        </div>
    </div>
</div>
@endsection


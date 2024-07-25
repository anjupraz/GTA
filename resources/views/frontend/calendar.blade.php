@extends('layouts.frontend')
@section('title', 'Event Calendar')
@section('content')
<div id="page_caption" class="hasbg parallax" style="text-align:center;height:300px; background-image:url({{asset('assets/frontend/images/banner3.jpg')}});background-position: center center;color:#ffffff;">
    @include('frontend.include.overlay')
    <div class="page_title_wrapper">
        <div class="page_title_inner">
            <div class="page_title_content">
                <h1>Event Calendar</h1>
            </div>
        </div>
    </div>
</div>
<div id="page_content_wrapper" class="blog_wrapper hasbg ">
    <div class="inner">
        <div class="inner_wrapper" style="margin-bottom:50px">
            <div class="page_content_wrapper"></div>
            <div class="sidebar_content">
                <h4 class="p1"><span class="s1"><b>EVENT CALENDAR</b></span></h4>
                <br/>
                <iframe id="calendar" style="border: solid 1px #777;" src="https://calendar.google.com/calendar/b/1/embed?height=600&amp;wkst=1&amp;bgcolor=%23ffffff&amp;ctz=Asia%2FKathmandu&amp;src=ZXZlbnRzb2x1dGlvbm5lcGFsQGdtYWlsLmNvbQ&amp;src=ZW4ubnAjaG9saWRheUBncm91cC52LmNhbGVuZGFyLmdvb2dsZS5jb20&amp;color=%233F51B5&amp;color=%237986CB" width="100%" height="800" frameborder="0" scrolling="no"></iframe>
            </div>
            @include('frontend.include.sidebar')
        </div>
    </div>
</div>
@endsection

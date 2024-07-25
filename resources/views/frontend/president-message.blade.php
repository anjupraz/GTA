@extends('layouts.frontend')
@section('title', "President Message")
@section('content')
<div id="page_caption" class="hasbg parallax" style="text-align:center;height:300px; background-image:url({{asset('assets/frontend/images/about_two.jpg')}});background-position: center center;color:#ffffff;">
    @include('frontend.include.overlay')
    <div class="page_title_wrapper">
        <div class="page_title_inner">
            <div class="page_title_content">
                <h1>President Message</h1>
            </div>
        </div>
    </div>
</div>
<div id="page_content_wrapper" class="blog_wrapper hasbg ">
    <div class="inner">
        <div class="inner_wrapper" style="margin-bottom:50px">
            <div class="page_content_wrapper"></div>
            <div class="sidebar_content left_sidebar">
                <h4 class="p1"><span class="s1"><b>President Message</b></span></h4>
                <p>
                    The Group for Technical Assistance (GTA), is dedicated to improving the quality of life of the
                    people of Nepal through evidence generation and policy development. GTA has made numerous
                    contributions to improve the health and education status of Nepalese people.
                </p>
                <p>
                    GTA is committed to supporting the Government of Nepal to produce the necessary evidence for
                    strengthening the health system, service delivery and utilization. GTA is focusing its activities
                    towards achieving the SDGs through research and project implementation on education,
                    environment, nutrition and health. We work with the community to promote behavior change
                    and to reduce the spread of infectious and non-infectious diseases.
                </p>
                <p>
                    Since its inception, GTA has been involved in conducting several high-quality research studies
                    and implemented development projects. To accomplish its objective, it has developed a broad
                    collaboration with highly renowned international organizations.
                </p>
                <p>
                    GTA is always accessible to working with people who have positive thinking and are focused on
                    bringing tangible changes in the quality of life of marginalized and disadvantaged people of
                    Nepal.
                </p>
            </div>
            <div class="sidebar_wrapper left_sidebar">
                <div class="portfolio_info_wrapper center">
                    <img style="height: 300px !important" src="{{asset('assets/frontend/images/president.jpg')}}"/>
                    <h4>Deepak Chandra Bajracharya</h4>
                    <div class="page_tagline">President</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

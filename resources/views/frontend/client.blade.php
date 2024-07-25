@extends('layouts.frontend')
@section('title', 'Our Clients')
@section('content')
<div id="page_caption" class="hasbg parallax" style="text-align:center;height:300px; background-image:url({{asset('assets/frontend/images/banner3.jpg')}});background-position: center center;color:#ffffff;">
    @include('frontend.include.overlay')
    <div class="page_title_wrapper">
        <div class="page_title_inner">
            <div class="page_title_content">
                <h1>Our Clients</h1>
            </div>
        </div>
    </div>
</div>
<div id="page_content_wrapper" class="blog_wrapper hasbg ">
    <div class="inner">
        <div class="inner_wrapper" style="margin-bottom:50px">
            <div class="page_content_wrapper"></div>
                <h4 class="p1"><span class="s1"><b>OUR CLIENTS</b></span></h4>
                {{-- <p>
                    Over the years GTA has
                    provided a wide range of
                    technical contribution in diverse
                    sectors ranging from health,
                    education,
                    sustainable
                    development, gender equity,
                    youth,
                    to
                    communication,
                    behavioral
                    social
                    marketing, food security and
                    nutrition, and Water Sanitation
                    and Hygiene (WASH).
                </p>
                <p>
                    Our clients include various
                    Nepal-based projects and
                    programs from donors and
                    INGOs such as UNICEF, UNFPA, WHO, USAID, the John Hopkins University, the Henry Ford Health
                    System, WaterAid UK, the FHI 360 (formerly Academy for Educational Development (AED)), ACF
                    International, Another Options and IPAS. We also work closely with governmental organizations such as
                    the Female Community Health Volunteer (FCHV). We have also successfully conducted research work
                    for non-profit institutions such as the Sabin Vaccine Institute and the International Vaccine Institute.
                </p> --}}
                @if(count($clientList) > 0)
                    <div class="client-carousel owl-carousel owl-theme" style="margin-top:20px;">
                        @foreach($clientList as $client)
                            <a @if($client->slug != null) href="{{$client->slug}}" target="_blank" @else href="javascript:void();" @endif>
                                <div class="item" style="text-align:center;height:150px;background-size:contain;background-image:url({{asset($client->featured()->media)}});background-position: center center;background-repeat: no-repeat;color:#ffffff;">
                                </div>
                            </a>
                        @endforeach
                    </div>
                    <br/>
                @endif
                @if(count($clientMessageList) > 0)
                    <hr/>
                    <br/>
                    <h4 class="p1"><span class="s1"><b>Client's Message</b></span></h4>
                    <br/>
                    <div id="15675891342113546341" class="portfolio_filter_wrapper gallery grid portrait two_cols" data-columns="2">
                        @foreach($clientMessageList as $message)
                            <div class="item element grid baseline classic4_cols animated1">
                                <div class="post-81 post type-post status-publish format-standard has-post-thumbnail hentry category-travel-tips tag-passport tag-travel tag-world">
                                    <div class="post_wrapper client_message">
                                        <div class="post_content_wrapper">
                                            <div class="post_header_wrapper">
                                                <div class="post_header">
                                                    <div class="">
                                                        <br/>
                                                        <span class="post_detail single_post">
                                                            <a href="javascript:void();" class="client-message" style="cursor: default">
                                                            {{$message->description}}
                                                            </a>
                                                        </span>
                                                    </div>
                                                    <div class="post_header_title">
                                                        <a href="javascript:void();" style="cursor: default">
                                                        {{$message->title}}
                                                        </a>
                                                    </div>
                                                </div>
                                                <br class="clear" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {!! $clientMessageList->render() !!}
                    
                @endif
            {{-- <div class="sidebar_wrapper">
                <p>
                    <img height="400px" src="{{asset('assets/frontend/images/client/client.jpg')}}"/>
                </p>
            </div> --}}
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        jQuery('document').ready(function(){
            jQuery('.client-carousel').owlCarousel({
                margin:30,
                autoplay:true,
                autoplayTimeout:3000,
                autoplayHoverPause:true,
                responsiveClass:true,
                responsive:{
                    0:{
                        items:1,
                    },
                    600:{
                        items:3
                    },
                    1000:{
                        items:6
                    }

                }
            });
        });
    </script>
@endsection
@extends('layouts.frontend')
@section('title', 'Terms and Condition')
@section('content')
<div id="page_caption" class="hasbg parallax" style="text-align:center;height:300px; background-image:url({{asset('assets/frontend/images/banner3.jpg')}});background-position: center center;color:#ffffff;">
    @include('frontend.include.overlay')
    <div class="page_title_wrapper">
        <div class="page_title_inner">
            <div class="page_title_content">
                <h1>Terms and Condition</h1>
            </div>
        </div>
    </div>
</div>
<!-- Begin content -->
<div id="page_content_wrapper" class="hasbg ">
    <div class="inner">
        <!-- Begin main content -->
        <div class="inner_wrapper">
            <div class="sidebar_content full_width nopadding">
                <div class="sidebar_content page_content">
                    {{-- <p>
                        The FAQ below is designed and intended to respond to a variety of questions from people planning and preparing to visit Nepal. The questions mentioned here are intended only as a general guide to help you plan and coordinate your trip before you actually hit the road. They're not meant to be on the road guide in detail. Get one of many outstanding travel books that have been published over the years to help travelers for more details and more on day-to-day travel guidance.
                    </p>
                    <div class="pp_accordion_close has_icon">
                        <h3><a href="#">Why to choose Yeta Utaa Travel and Tours?</a></h3>
                        <div>
                            <p>Yeta Utaa T&T provide range of facilities as follows:</p>
                            <ul>
                                <li>Offer Nepal Tours, Travel and Tourism information and direct you to schedule your trip as you wish, according to your interest.</li>
                                <li>Provides quality facilities to satisfy all your travel requirements.</li>
                                <li>Provide tour and travel services to a smaller, manageable group so that every guest receives the right support, care and quality services and high attention.</li>
                                <li>Guides you to customize your trip based on your interest and area of specialization.</li>
                                <li>Arrange your Domestic and International Air ticket to and from Nepal.</li>
                                <li>Offers safer and secure mode of payment.</li>
                                <li>Offers volunteering service Program upon request.</li>
                            </ul>
                        </div>
                    </div> --}}
                </div>
                @include('frontend.include.sidebar')
            </div>
        </div>
        <!-- End main content -->
    </div>
</div>
<br class="clear" />
<br/>
@endsection

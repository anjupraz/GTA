@extends('layouts.frontend')
@section('title', 'Home')
@section('content')
    @foreach ($bannerList as $banner)
        
        <section class="banner" style="background-image:url({{ $banner->gallery()[0]->media }})">
            <div class="container">
                <div class="row">
                    <div class="col-12"></div>
                </div>
            </div>
        </section>
    @endforeach
    <section class="bg-01">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="wrapper">
                        <div class="row">
                            <div class="col-lg-12">
                                @foreach ($bannerList as $banner)
                                    <h1>{{ $banner->description }}</h1>
                                @endforeach
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="content">
                                    <ol>
                                        <li class="dashed">
                                            <i class="fal fa-hands-usd"></i>
                                            <h3>Our Vision</h3>
                                            <p>
                                                We envision driving positive change and fostering sustainable development in communities worldwide, guided by principles of equality, transparency, justice, humanity, and accountability.
                                            </p>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="content">
                                    <ol>
                                        <li class="dashed">
                                            <i class="fal fa-funnel-dollar"></i>
                                            <h3>Our Mission</h3>
                                            <p>
                                                To strengthen communities globally by providing access to health, education, and social development opportunities, promoting a brighter, more equitable future for all.
                                            </p>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="content">
                                    <ol>
                                        <li>
                                            <i class="fal fa-person-sign"></i>
                                            <h3>Our Standards</h3>
                                            <p>
                                                We hold ourselves to high standards of integrity, accessibility, collaboration, capacity building, ethical conduct, and accountability, ensuring a meaningful impact and promoting positive social change.
                                            </p>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('frontend.modal.event')
    @include('frontend.modal.about-us')
    @include('frontend.modal.latest')
    @include('frontend.modal.service')
    {{-- @include('frontend.modal.menu') --}}
    {{-- @include('frontend.modal.why-choose') --}}
    {{-- @include('frontend.modal.popular') --}}
    {{-- @include('frontend.modal.team') --}}
    @include('frontend.modal.clients')
    @if (count($noticeList) > 0)
        <div id="notice_list" class="modal" style="width: 50%">
            <div id="modal_content" class="modal-dialog modal-lg">
                <div class="notice-owl-carousel owl-carousel owl-theme">
                    @foreach ($noticeList as $notice)
                        <div class="item" style="text-align: center; width:100%">
                            <div>{{ $notice->description }}</div>
                            <img src="{{ $notice->gallery()[0]->media }}" />
                            <div>
                                <a style="margin-top: 15px" href="{{ $notice->slug }}" target="_blank" class="button"> View more</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
@endsection
@section('script')

@endsection

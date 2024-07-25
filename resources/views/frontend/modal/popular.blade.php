@if (count($latestEventList))
    <section class="bg-02">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="heading">
                        <h2>Recent Events</h2>
                        <p>

                        </p>
                    </div>
                </div>
                @foreach ($latestEventList as $event)
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="wrapper">
                            <figure>
                                <img src="{{ $event->featured()->media }}" />
                            </figure>
                            <div class="bs">
                                <h3>
                                    {!! substr($event->title, 0, 16) !!}
                                    @if (strlen($event->title) > 16)
                                        ...
                                    @endif
                                </h3>
                                <p>
                                    {!! substr(strip_tags($event->description), 0, 150) !!}...
                                </p>
                                <a class="readmore" href="{{ route('event.slug', ['slug' => $event->slug]) }}">Read More<span class="ti-angle-right"></span></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- <div class="bg-grey">
        <div class="one withsmallpadding ppb_header " style="text-align:center;padding:0px 0 0px 0;margin-top:70px;margin-bottom:50px;">
            <div class="standard_wrapper">
                <div class="page_content_wrapper">
                    <div class="inner">
                        <div style="margin:auto;width:100%">
                            <h2 class="ppb_title" style="">Latest Events</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="standard_wrapper">
            <div class="ppb_blog_grid one nopadding" style="padding:0px 0 0px 0;margin-bottom:50px;">
                <div class="page_content_wrapper">
                    <div class="inner">
                        <div class="inner_wrapper">
                            <div class="article-owl-carousel owl-carousel owl-theme  blog_grid_wrapper sidebar_content full_width ppb_blog_posts">
                                @foreach ($latestEventList as $blog)
                                    @php
                                        $schedule = $blog->schedule();
                                    @endphp
                                    <div id="post-{{ $loop->iteration }}" class="item post type-post hentry status-publish ">
                                        <div class="post_wrapper grid_layout blog-box">
                                            <div class="post_img small static">
                                                <a href="{{ route('event.slug', ['slug' => $blog->slug]) }}">
                                                    @if ($blog->featured())
                                                        <div class="image" style="background-image:url({{ $blog->featured()->media }});"></div>
                                                    @elseif($blog->gallery())
                                                        @if (count($blog->gallery()) > 0)
                                                            <div class="image" style="background-image:url({{ $blog->gallery()[0]->media }});"></div>
                                                        @else
                                                            <div class="image" style="background-image:url({{ asset('assets/frontend/upload/pexels-photo-211051-700x466.jpeg') }});"></div>
                                                        @endif
                                                    @else
                                                        <div class="image" style="background-image:url({{ asset('assets/frontend/upload/pexels-photo-211051-700x466.jpeg') }});"></div>
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="post_header_wrapper">
                                                <div class="post_header grid">
                                                    <div class="post_detail single_post">
                                                        <span class="post_info_date">
                                                            {{ date('d M Y', strtotime($schedule->from_date)) }} &nbsp;-&nbsp; {{ date('d M Y', strtotime($schedule->to_date)) }}
                                                        </span>
                                                    </div>
                                                    <h6><a href="{{ route('event.slug', ['slug' => $blog->slug]) }}" title="{{ $blog->title }}">{!! substr($blog->title, 0, 25) !!}@if (strlen($blog->title) > 25)
                                                                ...
                                                            @endif
                                                        </a></h6>
                                                </div>
                                                <p>
                                                    {!! substr(strip_tags($blog->description), 0, 150) !!}...
                                                <div class="post_button_wrapper">
                                                    <a class="readmore" href="{{ route('event.slug', ['slug' => $blog->slug]) }}">Read More<span class="ti-angle-right"></span></a>
                                                </div>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endif

@extends('layouts.frontend')
@section('title', 'Blog Detail')
@section('content')
    <section class="abt-01">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="heading-wrapper">
                        <h3>News & Notice</h3>
                        <ol>
                            <li>Home<i class="far fa-angle-double-right"></i></li>
                            <li>News & Notice<i class="far fa-angle-double-right"></i></li>
                            <li>{{ $blog->title }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-05 blog-detail pb-0">
        <div class="container">
            <div class="blog-main-card d-flex mb-0">
                <article class="blog-sub">
                    <div class="blog-content">
                        @if ($blog->featured())
                            <img src="{{ $blog->featured()->media }}" />
                        @elseif($blog->gallery())
                            @if (count($blog->gallery()) > 0)
                                <img src="{{ $blog->gallery()[0]->media }}" />
                            @else
                                <img src="{{ asset('assets/frontend/images/no-image.jpeg') }}" />
                            @endif
                        @else
                            <img src="{{ asset('assets/frontend/images/no-image.jpeg') }}" />
                        @endif
                    </div>
                    <div class="blog-content-section">
                        <div class="blo-content-title">
                            <h4>
                                {{ $blog->title }}
                            </h4>
                            <p>
                                {!! html_entity_decode($blog->description) !!}
                            </p>
                        </div>
                    </div>
                </article>

            </div>
        </div>
    </section>
    @if (count($blog->gallery()) > 1)
        <section class="bg-05 pt-0 pb-0">
            <div class="container">
                <div class="blog-main-card d-flex mt-0">
                    @foreach ($blog->gallery() as $gallery)
                        <article class="blog-sub">
                            <div class="blog-content">
                                <a data-caption="{{ $blog->title }}" data-fancybox="gallery" href="{{ $gallery->media }}">
                                    <img src="{{ $gallery->media }}" />
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

@endsection

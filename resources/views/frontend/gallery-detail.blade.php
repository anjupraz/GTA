@extends('layouts.frontend')
@section('title', 'Gallery')
@section('content')
    <section class="abt-01">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="heading-wrapper">
                        <h3>Gallery</h3>
                        <ol>
                            <li>Home<i class="far fa-angle-double-right"></i></li>
                            <li>Gallery<i class="far fa-angle-double-right"></i></li>
                            <li>{{ $album->title }}</li>
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
                    <div class="blog-content-section">
                        <div class="blo-content-title">
                            <h4>
                                {{ $album->title }}
                            </h4>
                            <p>
                                {!! html_entity_decode($album->description) !!}
                            </p>
                        </div>
                    </div>
                </article>

            </div>
        </div>
    </section>
    <section class="bg-05 pt-0 pb-0">
        <div class="container">
            <div class="blog-main-card d-flex mt-0">
                @foreach ($album->gallery() as $gallery)
                    <article class="blog-sub">
                        <div class="blog-content">
                            <a data-caption="{{ $album->title }}" data-fancybox="gallery" href="{{ $gallery->media }}">
                                <img src="{{ $gallery->media }}" />
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endsection

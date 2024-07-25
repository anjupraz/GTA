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
                            <li>Gallery</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-05">
        <div class="container">
            <div class="blog-main-card d-flex">
                @foreach ($galleryList as $gallery)
                    <article class="blog-sub">
                        <div class="blog-content">
                            <img src="{{ $gallery->featured()->media }}" />
                        </div>
                        <div class="blog-content-section">
                            <div class="blo-content-title">
                                <h4>

                                    {!! substr($gallery->title, 0, 25) !!}
                                    @if (strlen($gallery->title) > 25)
                                        ...
                                    @endif

                                </h4>
                                <p>
                                    {!! substr(strip_tags($gallery->description), 0, 150) !!}...
                                </p>
                                <a class="readmore" href="{{ route('gallery.slug', ['slug' => $gallery->slug]) }}">Show<span class="ti-angle-right"></span></a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endsection

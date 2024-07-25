@extends('layouts.frontend')
@section('title', 'Blogs')
@section('content')
    <section class="abt-01">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="heading-wrapper">
                        <h3>News & Notice</h3>
                        <ol>
                            <li>Home<i class="far fa-angle-double-right"></i></li>
                            <li>News & Notice</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-05">
        <div class="container">
            <div class="blog-main-card d-flex">
                @foreach ($blogList as $blog)
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

                                    {!! substr($blog->title, 0, 25) !!}
                                    @if (strlen($blog->title) > 25)
                                        ...
                                    @endif

                                </h4>
                                <p>
                                    {!! substr(strip_tags($blog->description), 0, 150) !!}...
                                </p>
                                <a class="readmore" href="{{ route('blog.slug', ['slug' => $blog->slug]) }}">Read More<span class="ti-angle-right"></span></a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
            {!! $blogList->render() !!}
        </div>
    </section>
@endsection

@if (count($latestBlogList) > 0)
    <section class="bg-05">
        <div class="container">
            <div class="col-12">
                <div class="heading text-center">
                    <h2>Recent Blogs</h2>
                </div>
            </div>

            <div class="blog-main-card d-flex">
                @foreach ($latestBlogList as $blog)
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
        </div>
    </section>

@endif

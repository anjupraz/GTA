@extends('layouts.frontend')
@section('title', 'Services')
@section('content')
    <section class="abt-01">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="heading-wrapper">
                        <h3>Working Areas</h3>
                        <ol>
                            <li>Home<i class="far fa-angle-double-right"></i></li>
                            <li>Working Areas<i class="far fa-angle-double-right"></i></li>
                            <li>{{ $impact->title }}</li>
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
                    @if ($impact->profile)
                        <div class="blog-content">
                            <img src="{{ $impact->profile }}" />
                        </div>
                    @endif
                    <div class="blog-content-section">
                        <div class="blo-content-title">
                            <h4>
                                {{ $impact->title }}
                            </h4>
                            <p>
                                {!! html_entity_decode($impact->description) !!}
                            </p>
                        </div>
                    </div>
                </article>

            </div>
        </div>
    </section>

@endsection

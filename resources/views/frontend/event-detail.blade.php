@php
    $cover = $event->cover()->media;
    $floor_plan = $event->floorPlan();
    $schedule = $event->schedule();
    $documentList = $event->document();
    $video = $event->video();
    $brochure = $event->brochure();
@endphp
@extends('layouts.frontend')
@section('title', 'Event Detail')
@section('nav', 'fixed-bg')
@section('content')
    <section class="abt-01">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="heading-wrapper">
                        <h3>Events</h3>
                        <ol>
                            <li>Home<i class="far fa-angle-double-right"></i></li>
                            <li>Events<i class="far fa-angle-double-right"></i></li>
                            <li>{{ $event->title }}</li>
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
                        <img src="{{ $cover }}" />
                    </div>
                    <div class="blog-content-section">
                        <div class="blo-content-title">
                            <small> {{ date('d M Y', strtotime($schedule->from_date)) }} &nbsp;-&nbsp; {{ date('d M Y', strtotime($schedule->to_date)) }}</small>
                            <h4>
                                {{ $event->title }}
                            </h4>
                            @if ($brochure)
                                <a href="{{ $brochure }}" target="_blank" class="btn btn-primary mt-2 mb-2">Brochure</a>
                            @endif
                            <p>
                                {!! html_entity_decode($event->description) !!}
                            </p>
                            @if ($video)
                                <hr />
                                <br />
                                <iframe width="100%" height="400" src="{{ $video->media }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            @endif
                        </div>
                    </div>
                </article>

            </div>
        </div>
    </section>
    @if (count($event->gallery()) > 1)
        <section class="bg-05 pt-0 pb-0">
            <div class="container">
                <div class="blog-main-card d-flex mt-0">
                    @foreach ($event->gallery() as $gallery)
                        <article class="blog-sub">
                            <div class="blog-content">
                                <img src="{{ $gallery->media }}" />
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection

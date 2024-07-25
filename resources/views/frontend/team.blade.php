@extends('layouts.frontend')
@section('title', 'Our Team')
@section('content')
    <section class="abt-01">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="heading-wrapper">
                        <h3>Our Team</h3>
                        <ol>
                            <li>Home<i class="far fa-angle-double-right"></i></li>
                            <li>Our Team</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-04">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="heading text-center">
                        <h2>Meet Our Team</h2>
                    </div>
                </div>
                <div class="main-team-card d-flex">
                    @foreach ($teamCategoryList as $category)
                        @foreach ($category->team($category->id) as $post)
                            <div class="team-setup">
                                <div class="team-items">
                                    <div class="team-user">
                                        <img src="{{ $post['featured_data']['media'] }}" />
                                    </div>
                                    <div class="team-user-social">
                                        <ol>
                                            <li><a title="{{ $post['title'] }}" target="_blank" href="{{ $post['team_data']['facebook'] }}"><i class="fab fa-facebook"></i></a></li>
                                            <li><a title="{{ $post['title'] }}" target="_blank" href="{{ $post['team_data']['instagram'] }}"><i class="fab fa-instagram"></i></a></li>
                                            <li><a title="{{ $post['title'] }}" target="_blank" href="{{ $post['team_data']['twitter'] }}"><i class="fab fa-twitter"></i></a></li>
                                            <li><a title="{{ $post['title'] }}" target="_blank" href="{{ $post['team_data']['linkedin'] }}"><i class="fab fa-linkedin"></i></a></li>
                                        </ol>
                                    </div>
                                    <div class="team-name">
                                        <h2>{{ $post['title'] }}</h2>
                                        <b>{{ $post['description'] }}</b>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')

@endsection

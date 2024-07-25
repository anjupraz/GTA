@if (count($teamCategoryList) > 0)
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
@endif

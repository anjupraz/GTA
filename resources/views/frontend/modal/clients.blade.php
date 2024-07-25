@if (count($clientList) > 0)
    <section class="bg-04">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="heading text-center">
                        <h2>Our Clients</h2>
                    </div>
                </div>
                <div class="main-team-card d-flex">
                    @foreach ($clientList as $client)
                        <div class="team-setup">
                            <div class="team-items">
                                <div class="team-user">
                                    <img src="{{ asset($client->featured()->media) }}" />
                                </div>
                                <div class="team-name">
                                    <h2>{{ $client->title }}</h2>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
@endif

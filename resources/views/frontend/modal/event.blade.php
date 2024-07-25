@if (count($eventList) > 0)
    <section class="bg-02">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="heading text-center">
                        <h2>Upcoming Events</h2>
                        <p>

                        </p>
                    </div>
                </div>
                @foreach ($eventList as $data)
                    @php $event=$data->post() @endphp
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="wrapper">
                            <figure>
                                <img src="{{ $event->featured()->media }}" />
                            </figure>
                            <div class="bs">
                                <h3>
                                    {!! substr($event->title, 0, 16) !!}
                                    @if (strlen($event->title) > 16)
                                        ...
                                    @endif
                                </h3>
                                <p>
                                    {!! substr(strip_tags($event->description), 0, 150) !!}...
                                </p>
                                <a class="readmore" href="{{ route('event.slug', ['slug' => $event->slug]) }}">Read More<span class="ti-angle-right"></span></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif

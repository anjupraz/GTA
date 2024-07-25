@extends('layouts.frontend')
@section('title', 'Contact us')
@section('content')
    <section class="abt-01">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="heading-wrapper">
                        <h3>Contact Us</h3>
                        <ol>
                            <li>Home<i class="far fa-angle-double-right"></i></li>
                            <li>Contact Us</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-0-b">
        <div class="container">
            <div class="row">
                <div class="main-card-contact d-flex">
                    <div class="sup-card-contact">
                        <div class="sup-content">
                            <div class="head-content">
                                <h2>Leave A Message Here</h2>
                                <p>Stay updated on all our latest news and initiatives by subscribing to our newsletter today! </p>
                            </div>

                            <div class="contact-title">
                                <h2>Contact Details</h2>
                                <ol>
                                    <li><i class="far fa-map-marker-check"></i>261 Arun Thapa Marg</li>
                                    <li><i class="far fa-map-marker-check"></i>Jhamsikhel, LMC-02, Lalitpur</li>
                                    <li><i class="far fa-map-marker-check"></i>Bagmati Pradesh, Nepal</li>
                                    <li><i class="fal fa-mobile"></i>+977 1 542 8666</li>
                                    <li><i class="fal fa-envelope"></i>info@gtafoundation.org.np</li>
                                    <li><i class="fal fa-clock"></i>Mon - Fri 9.00 - 17.00.</li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    <div class="sup-card-contact-0a">
                        <div class="contact-a1">
                            @include('frontend.include.contact-form')

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="mab-01">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d16804.57063258736!2d85.3017779186075!3d27.69486842052988!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1836f38aec9f%3A0xbac003dfced06e14!2sGroup%20for%20Technical%20Assistance!5e0!3m2!1sen!2snp!4v1589369968914!5m2!1sen!2snp" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </section>
@endsection

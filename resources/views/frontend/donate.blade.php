@extends('layouts.frontend')
@section('title', 'Donate')
@section('content')
    <div id="page_caption" class="hasbg parallax" style="text-align:center;height:300px; background-image:url({{ asset('assets/frontend/images/banner3.jpg') }});background-position: center center;color:#ffffff;">
        @include('frontend.include.overlay')
        <div class="page_title_wrapper">
            <div class="page_title_inner">
                <div class="page_title_content">
                    <h1>Donate</h1>
                </div>
            </div>
        </div>
    </div>
    <div id="page_content_wrapper" class="blog_wrapper hasbg ">
        <div class="inner">
            <div class="inner_wrapper" style="margin-bottom:50px">
                <div class="page_content_wrapper"></div>
                <div class="sidebar_content">
                    <h4 class="p1"><span class="s1"><b>DONATE</b></span></h4>
                    <br />
                    <p>
                        <u>To donate, you are advised to make a bank transfer to:</u>
                        <br />
                        Account No : <strong>0210017519260</strong><br />
                        Beneficiary name: <strong>Group for Technical Assistance</strong><br />
                        Bank: <strong>Nabil Bank Limited</strong><br />
                        Bank Address: <strong>Lalitpur, Nepal</strong><br />
                        Swift Code: <strong>NARBNPKA021</strong><br />
                    </p>
                    <p>
                        <u>If you would like to mail a donation, please use the following address and make checks A/C Payee to the Group for Technical Assistance:</u>
                        <br />
                        <strong>Group for Technical Assistance</strong><br />
                        <strong>P.O. Box. 11138</strong><br />
                        <strong><u>Head Office:</u></strong><br />
                        <strong>Ward No. 14, Kuleshwor</strong><br />
                        <strong>KMC, Kathmandu, Nepal</strong><br />
                        <strong><u>Branch Office:</u></strong><br />
                        <strong>261 Arun Thapa Marg, Jhamsikhel</strong><br />
                        <strong>LMC, Lalitpur, Nepal</strong><br />
                    </p>
                </div>
                @include('frontend.include.sidebar')
            </div>
        </div>
    </div>
@endsection

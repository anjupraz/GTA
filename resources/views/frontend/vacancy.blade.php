@extends('layouts.frontend')
@section('title', 'Careers')
@section('content')
<div id="page_caption" class="hasbg parallax" style="text-align:center;height:300px; background-image:url({{asset('assets/frontend/images/banner3.jpg')}});background-position: center center;color:#ffffff;">
    @include('frontend.include.overlay')
    <div class="page_title_wrapper">
        <div class="page_title_inner">
            <div class="page_title_content">
                <h1>Careers</h1>
            </div>
        </div>
    </div>
</div>
<div id="page_content_wrapper" class="blog_wrapper hasbg ">
    <div class="inner">
        <div class="inner_wrapper" style="margin-bottom:50px">
            <div class="page_content_wrapper"></div>
            <div class="sidebar_content">
                <h4 class="p1"><span class="s1"><b>VACANCY ANNOUNCEMENT</b></span></h4>
                <br/>
                @if(count($vacancyList) > 0)
                    <small>*&nbsp;Please mail us your Resume with cover letter at <u>hr@gtanepal.org</u></small>
                    <div class="table-responsive">
                        <table width="100%">
                            <thead>
                                <tr>
                                    <th>S.NO</th>
                                    <th>Job Title</th>
                                    <th>Job Detail</th>
                                    <th>Download</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($vacancyList as $vacancy)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$vacancy->title}}</td>
                                        <td><a data-modal href="#vacancy_{{$loop->iteration}}">View</a></td>
                                        <td>
                                            @php $brochure=$vacancy->brochure(); @endphp
                                            @if($brochure)
                                                <a target="_blank" href="{{$brochure->media}}"><i class="fa fa-download"></i></a>
                                            @else
                                                <i class="fa fa-times"></i>
                                            @endif
                                        </td>
                                    </tr>
                                    <div id="vacancy_{{$loop->iteration}}" class="modal">
                                        <h4 class="p1"><span class="s1"><b>{{$vacancy->title}}</b></span></h4>
                                        <hr/>
                                        {!! html_entity_decode($vacancy->description) !!}
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="no-data">
                        <br/>
                        <br/>
                        <h4>No Vacancy Available</h4>
                    </div>
                @endif
            </div>
            @include('frontend.include.sidebar')
        </div>
    </div>
</div>
@endsection

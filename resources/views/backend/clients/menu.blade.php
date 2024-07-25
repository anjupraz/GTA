@extends('layouts.backend')
@section('title', 'Clients')
@section('header', '#menu_client')
@section('content')
<div class="right_col" role="main">
    <div class="row">
        <div class="col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Clients</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="animated flipInY col-lg-2 col-md-2 col-sm-4 col-xs-6">
                        <a href="{{route('clients.index')}}">
                            <div class="tile-stats card">
                                <i class="fa fa-users"></i>
                                <p>Clients</p>
                            </div>
                        </a>
                    </div>
                    <div class="animated flipInY col-lg-2 col-md-2 col-sm-4 col-xs-6">
                        <a href="{{route('client-message.index')}}">
                            <div class="tile-stats card">
                                <i class="fa fa-comment"></i>
                                <p>Clients Message</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.backend')
@section('title', 'Users')
@section('header', '#menu_users')
@section('content')
<div class="right_col" role="main">
    <div class="row">
        <div class="col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Users</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="animated flipInY col-lg-2 col-md-2 col-sm-4 col-xs-6">
                        <a href="{{route('users.admin')}}">
                            <div class="tile-stats card">
                                <i class="fa fa-user-plus"></i>
                                <p>Admin</p>
                            </div>
                        </a>
                    </div>
                    <div class="animated flipInY col-lg-2 col-md-2 col-sm-4 col-xs-6">
                        <a href="{{route('users.staff')}}">
                            <div class="tile-stats card">
                                <i class="fa fa-users"></i>
                                <p>Staff</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

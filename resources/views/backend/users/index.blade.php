@extends('layouts.backend')
@if($userType=="Admin")
    @section('title', 'Admin')
@else
    @section('title', 'Staff')
@endif
@section('header', '#menu_users')
@section('content')
<div class="right_col" role="main">
    <div class="row">
        <div class="col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <div class="col-xs-12 col-sm-11 col-md-11">
                        <h2>
                            {{$userType}}
                        </h2>
                    </div>
                    @if($userType=='Admin')
                        <div class="col-xs-12 col-sm-1 col-md-1">
                            <a href="{{route('users.admin.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp; Add</a>
                        </div>
                    @else
                        <div class="col-xs-12 col-sm-1 col-md-1">
                            <a href="{{route('users.staff.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp; Add</a>
                        </div>
                    @endif
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="table-responsive">
                            <table class="datatable-responsive table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%"">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Gender</th>
                                        <th>Country</th>
                                        <th>Verified</th>
                                        <th>Status</th>
                                        <th>Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($userList as $user)
                                        <tr>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->contact}}</td>
                                            <td>{{GenderType::getKey($user->gender)}}</td>
                                            <td>{{$user->country}}</td>
                                            <td>
                                                @if($user->email_verified_at != null)
                                                    <span class="label label-success">Verified</span>
                                                @else
                                                    <span class="label label-danger">Unverified</span>
                                                @endif

                                            </td>
                                            <td>
                                                <a href="{{route('users.status',['id' => $user->id])}}">
                                                    @if($user->status)
                                                        <span class="label label-success">Active</span>
                                                    @else
                                                        <span class="label label-danger">Inactive</span>
                                                    @endif
                                                </a>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger btn-round" data-toggle="modal" data-target="#modal_{{$user->id}}">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="modal_{{$user->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                        </button>
                                                        <h4 class="modal-title" id="myModalLabel_{{$user->id}}">Warning !!!</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4>You are about to delete the user ( {{ $user->email }} )</h4>
                                                        <p>Once the user is deleted it cannot be recovered.</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="{{route('users.delete',['id' => $user->id])}}" class="btn btn-danger">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

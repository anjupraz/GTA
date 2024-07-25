@extends('layouts.backend')
@section('title', 'Banners')
@section('header', '#menu_banner')
@section('content')
<div class="right_col" role="main">
    <div class="row">
        <div class="col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <div class="col-xs-12 col-sm-11 col-md-11">
                        <h2>
                            Banners
                        </h2>
                    </div>
                    <div class="col-xs-12 col-sm-1 col-md-1">
                            <a href="{{route('banners.add')}}" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp; Add</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="table-responsive">
                        <table class="datatable-responsive table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%"">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Title</th>
                                        <th>Code</th>
                                        <th>Posted By</th>
                                        <th>Status</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($bannerList as $banner)
                                        <tr>
                                            <td>{{ date('d M Y', strtotime($banner->created_at)) }}</td>
                                            <td>{{$banner->title}}</td>
                                            <td>{{$banner->code}}</td>
                                            <td>{{$banner->user()->email}}</td>
                                            <td>
                                                <a href="{{route('posts.status',['id' => $banner->id])}}">
                                                    @if($banner->status)
                                                        <span class="label label-success">Active</span>
                                                    @else
                                                        <span class="label label-danger">Inactive</span>
                                                    @endif
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{route('banners.edit',['id' => $banner->id])}}" class="btn btn-primary btn-round">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger btn-round" data-toggle="modal" data-target="#modal_{{$banner->id}}">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="modal_{{$banner->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                        </button>
                                                        <h4 class="modal-title" id="myModalLabel_{{$banner->id}}">Warning !!!</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4>You are about to delete the banner ( {{ $banner->title }} )</h4>
                                                        <p>Once the banner is deleted it cannot be recovered.</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="{{route('posts.delete',['id' => $banner->id])}}" class="btn btn-danger">Delete</a>
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
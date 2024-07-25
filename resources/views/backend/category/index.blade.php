@extends('layouts.backend')
@if ($type == 'Blog')
    @section('title', 'Blog Category')
    @section('header', '#menu_blog')
@elseif($type == 'Service')
    @section('title', 'Services')
    @section('header', '#menu_service')
@elseif($type == 'Team')
    @section('title', 'Designation')
    @section('header', '#menu_team')
@else
    @section('title', 'Working Areas')
    @section('header', '#menu_impact')
@endif
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <div class="col-xs-12 col-sm-11 col-md-11">
                            <h2>
                                @if ($type == 'Team')
                                    Designation
                                @elseif($type == 'Service')
                                    Services
                                @elseif($type == 'Impact')
                                    Working Areas
                                @else
                                    {{ $type }} Category
                                @endif
                            </h2>
                        </div>
                        <div class="col-xs-12 col-sm-1 col-md-1">
                            @if ($type == 'Blog')
                                <a href="{{ route('blogs.category.add') }}" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp; Add</a>
                            @elseif($type == 'Service')
                                <a href="{{ route('service.category.add') }}" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp; Add</a>
                            @elseif($type == 'Team')
                                <a href="{{ route('team.category.add') }}" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp; Add</a>
                            @else
                                <a href="{{ route('impact.category.add') }}" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp; Add</a>
                            @endif
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="table-responsive">
                                <table class="datatable-responsive table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%"">
                                    <thead>
                                        <tr></tr>
                                        <th>Name</th>
                                        <th>Code</th>
                                        @if ($type == 'Blog')
                                            <th>Featured</th>
                                        @endif
                                        <th>Status</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categoryList as $category)
                                            <tr>
                                                <td>{{ $category->title }}</td>
                                                <td>{{ $category->code }}</td>
                                                @if ($type == 'Blog')
                                                    <td>
                                                        <a href="{{ route('category.featured', ['id' => $category->id]) }}">
                                                            @if ($category->featured)
                                                                <span class="label label-success">Yes</span>
                                                            @else
                                                                <span class="label label-danger">No</span>
                                                            @endif
                                                        </a>
                                                    </td>
                                                @endif
                                                <td>
                                                    <a href="{{ route('category.status', ['id' => $category->id]) }}">
                                                        @if ($category->status)
                                                            <span class="label label-success">Active</span>
                                                        @else
                                                            <span class="label label-danger">Inactive</span>
                                                        @endif
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('category.edit', ['id' => $category->id]) }}" class="btn btn-primary btn-round">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <button class="btn btn-danger btn-round" data-toggle="modal" data-target="#modal_{{ $category->id }}">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="modal_{{ $category->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                            </button>
                                                            <h4 class="modal-title" id="myModalLabel_{{ $category->id }}">Warning !!!</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h4>You are about to delete the category ( {{ $category->title }} )</h4>
                                                            <p>Once the category is deleted it cannot be recovered.</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="{{ route('category.delete', ['id' => $category->id]) }}" class="btn btn-danger">Delete</a>
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
@extends('layouts.backend')
@section('title', 'Dashboard')
@section('cardHeader', 'Dashboard')
@section('content')
<div class="right_col" role="main">
    @include('backend.modal.dashboard-menu')
    @include('backend.modal.event')
    @include('backend.modal.recent')
</div>
@endsection
@section('script')

@endsection

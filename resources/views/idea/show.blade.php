@extends('layout.layout')

@section('content')
<div class="row">
    <div class="col-3">
        @include('inc.side-nav')
    </div>
    <div class="col-6">
        @include('inc.success-message')
        @include('inc.idea-card')
    </div>
    <div class="col-3">
        @include('inc.search-bar')
        @include('inc.follow-box')
    </div>
</div>
@endsection


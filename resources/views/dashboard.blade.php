@extends('layout.layout')

@section('content')
<div class="row">
    <div class="col-3">
        @include('inc.side-nav')
    </div>
    <div class="col-6">
        @include('inc.success-message')
        @include('inc.post-idea')
        <hr>
        @foreach ($ideas as $idea)
            @include('inc.idea-card')
        @endforeach
        <div class="mt-3">
            {{ $ideas->links() }}
        </div>
    </div>
    <div class="col-3">
        @include('inc.search-bar')
        @include('inc.follow-box')
    </div>
</div>
@endsection


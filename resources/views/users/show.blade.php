@extends('layout.layout')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('inc.side-nav')
        </div>
        <div class="col-6">
            @include('inc.success-message')
            @include('inc.user-card')
            <hr>
            @forelse ($ideas as $idea)
                @include('inc.idea-card')
            @empty
                <p class="text-center mt-3">No results found.</p>
            @endforelse
            <div class="mt-3">
                {{ $ideas->withQueryString()->links() }}
            </div>
        </div>
        <div class="col-3">
            @include('inc.search-bar')
            @include('inc.follow-box')
        </div>
    </div>
@endsection

@extends('layout.layout')

@section('content')

<div class="container py-4">
        <div class="row">
            @include('shared.left-side-bar')
            <div class="col-6">
                @include('shared.success')
                @include('ideas.shared.submit-idea')
                <hr>

                @forelse ($ideas as $idea )
                <div class="mt-3">
                    @include('ideas.shared.idea-card')
                </div>
                @empty
                    <div class="text-center my-3">No results found😒😪 " {{ request()->search }} " is not available anywhere</div>
                @endforelse
                <div style="margin-top:10px;">
                    {{$ideas->withQueryString()->links()}}
                </div>


            </div>
            <div class="col-3">
                @include('shared.search-bar')
                @include('shared.follow-box')
            </div>
        </div>
    </div>
@endsection

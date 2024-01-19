@extends('layout.layout')

@section('content')

<div class="container py-4">
        <div class="row">
            @include('shared.left-side-bar')
            <div class="col-6">
                @include('shared.success')
                @include('shared.submit-idea')
                <hr>

                @foreach ($ideas as $idea )
                <div class="mt-3">
                    @include('shared.idea-card')
                </div>
                @endforeach
                <div style="margin-top:10px;">
                    {{$ideas->links()}}
                </div>


            </div>
            <div class="col-3">
                @include('shared.search-bar')
                @include('shared.follow-box')
            </div>
        </div>
    </div>
@endsection

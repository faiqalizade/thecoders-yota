@extends('layouts.site')
@section('content')
    <h3 class="mt-3">Comments</h3>
    <div class="mt-5 comments-wrapper">
        {!! renderCommentsTree($comments, 0) !!}
    </div>
@endsection

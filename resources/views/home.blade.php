@extends('layouts.site')
@section('content')
    <h3 class="mt-3">Comments</h3>
    <div class="mt-5 comments-wrapper" >
    @foreach($comments as $comment)
        <div class="parent-comment my-4">
            <h4>{{$comment['username']}}</h4>
            <div class="comment-item" style="padding: 10px 0; border-bottom: 1px solid #eee">
                <div class="item-wrap d-flex align-items-center">
                    @if(array_key_exists('children', $comment) && count($comment['children']) > 0)
                        <div class="comment-expand-icon mr-2" style="cursor: pointer">
                            >
                        </div>
                    @endif
                    <div class="comment-text">
                        {{$comment['text']}}
                    </div>
                </div>
                <div data-id="{{$comment['id']}}" data-toggle="modal" data-target="#addComment" class="reply-element btn btn-primary mt-3">
                    Reply
                </div>
            </div>
            <div class="parent-children-wrapper" style="display: none">
                @if(array_key_exists('children', $comment) && count($comment['children']) > 0)
                    {!! getCommentChildHTML($comment) !!}
                @endif
            </div>
        </div>
    @endforeach
    </div>
@endsection

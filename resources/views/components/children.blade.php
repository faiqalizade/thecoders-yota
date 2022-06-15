<div class="children" style="margin-left: {{(15 * $level)}}px;">
    <div class="main-content" style="border-bottom: 1px solid #eee; padding: 10px 0;">
        <h4>{{$item['username']}}</h4>
        <div class="comment-text">
            {{$item['text']}}
        </div>
        <div data-id="{{$item['id']}}" data-toggle="modal" data-target="#addComment" class="reply-element btn btn-primary mt-3">
            Reply
        </div>
    </div>
    @if(array_key_exists('children', $item) && count($item['children']) > 0)
        <div class="children">
            {!! getCommentChildHTML($item, $level + 1) !!}
        </div>
    @endif
</div>

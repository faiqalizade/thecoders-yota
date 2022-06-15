<div class="parent" style="padding-left: {{(30 * $level)}}px;">
    <div class="main-content" style="padding: 10px 0;">
        <div class="comment-main-content-wrapper">
            <h4>{{$item['username']}}</h4>
            <div class="comment-wrapper d-flex align-items-start">
                <div class="comment-expand-icon mr-2" style="{{$level == 0 && array_key_exists('children', $item) && count($item['children']) > 0 ? "" : "display:none"}}">
                    <i class="bi bi-plus-square-fill"></i>
                </div>
                <div class="comment-text">
                    {{$item['text']}}
                </div>
            </div>
        </div>
        <div class="buttons-wrapper">
            <div data-level="{{$level + 1}}" data-id="{{$item['id']}}" data-toggle="modal" data-target="#addComment"
                 class="reply-element btn btn-primary mt-3">
                Reply
            </div>
            <div data-id="{{$item['id']}}" data-data='{{json_encode($item)}}' data-toggle="modal" data-target="#addComment"
                 class="edit-element btn btn-primary mt-3">
                Edit
            </div>

            <div data-id="{{$item['id']}}"
                 class="remove-element btn btn-danger mt-3">
                Remove
            </div>
        </div>
    </div>
    <div class="children">
        @if(array_key_exists('children', $item) && count($item['children']) > 0)
            {!! renderCommentsTree($item['children'], $level + 1) !!}
        @endif
    </div>
</div>

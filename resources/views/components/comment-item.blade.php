<div class="parent" id="comment-item" style="padding-left: {{(30 * $level)}}px; display: none">
    <div class="main-content" style="padding: 10px 0;">
        <div class="comment-main-content-wrapper">
            <h4 id="username"></h4>
            <div class="comment-wrapper d-flex align-items-start">
                <div class="comment-expand-icon mr-2" style="display: none">
                    <i class="bi bi-plus-square-fill"></i>
                </div>
                <div id="comment" class="comment-text">

                </div>
            </div>
        </div>
        <div class="buttons-wrapper">
            <div data-id="" id="add-comment-btn" data-toggle="modal" data-target="#addComment"
                 class="reply-element btn btn-primary mt-3">
                Reply
            </div>
            <div data-id="" id="edit-comment-btn" data-toggle="modal" data-target="#addComment"
                 class="reply-element btn btn-primary mt-3">
                Edit
            </div>

            <div data-id=""
                 id="remove-comment-btn"
                 class="remove-element btn btn-danger mt-3">
                Remove
            </div>
        </div>
    </div>
    <div class="children">

    </div>
</div>

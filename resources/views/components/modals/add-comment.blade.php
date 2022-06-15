<div class="modal fade" id="addComment" tabindex="-1" role="dialog" aria-labelledby="addComment" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add comment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username-input" name="username" placeholder="username">
                    </div>

                    <div class="form-group">
                        <label for="comment">Comment</label>
                        <textarea class="form-control" id="comment-input" rows="3" name="comment"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="add-comment-submit-btn">Add</button>
            </div>
        </div>
    </div>
</div>

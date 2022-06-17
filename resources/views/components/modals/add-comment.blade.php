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
                        <input v-model="username" type="text" class="form-control" id="username-input" name="username" placeholder="username">
                    </div>

                    <div class="form-group">
                        <label for="comment">Comment</label>
                        <textarea v-model="comment" class="form-control" id="comment-input" rows="3" name="comment"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" @click="clearData" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" @click="sendComment" data-dismiss="modal" class="btn btn-primary">Add</button>
            </div>
        </div>
    </div>
</div>

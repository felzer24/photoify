<!-- Toggle d-flex -->
<div class="edit-post-overlay jumbotron m-0 position-absolute align-items-center d-none" style="width:100%; height:100%;">
    <!-- Start container for form -->
    <div class="container">
        <h4>Update post</h4>
        <form action="app/posts/update.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <small class="post-filename form-text text-muted text-left">Filename: <i>....</i></small>
                <label for="updatefile<?= $post['post_id'] ?>" class="update-file-label bg-secondary text-light float-left">Upload image</label>
                <input id="updatefile<?= $post['post_id'] ?>" class="update-file-input form-control-file" name="postfile" type="file" accept=".jpg, .jpeg, .gif, .png" />
                <small class="form-text text-muted text-left">Accepted filetypes: .jpg .jpeg .png .gif Maxfilesize: 4MB</small>
            </div>
            <div class="form-group">
                <label for="updatedesc<?= $post['post_id'] ?>" class="float-left">Add description</label>
                <textarea id="updatedesc<?= $post['post_id'] ?>" class="form-control" name="postdesc" maxlength="100"
                placeholder="<?= $_SESSION['errors']['post_desc'] ?? 'Post description' ?>"></textarea>
            </div>
            <button type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o pr-1" aria-hidden="true"></i>Update post</button>
            <button type="button" class="btn btn-danger"><i class="fa fa-trash-o pr-1" aria-hidden="true"></i>Delete post</button>
        </form>
    </div><!-- End container for form -->
</div><!-- End jumbotron for form -->

<!-- Toggle d-flex -->
<div id="post-<?= $post['post_id'] ?>" class="edit-post-overlay jumbotron m-0 position-absolute align-items-center d-none">
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
                placeholder="<?= $_SESSION['errors']['post_desc'] ?? 'Post description' ?>"><?= $post['description'] ?></textarea>
            </div>
            <input type="hidden" name="post_id" value="<?= $post['post_id'] ?>">
            <input type="hidden" name="filename" value="<?= $post['content'] ?>">
            <button type="submit" class="btn btn-primary btn-block" name="update-post-btn"><i class="fa fa-pencil-square-o pr-1" aria-hidden="true"></i>Update post</button>
            <button type="button" class="post-close-overlay-btns btn btn-dark btn-block"><i class="fa fa-times-circle-o pr-1" aria-hidden="true"></i>Close Window</button>
            <small>Post Created: <?= date_format($created_at, 'Y-m-d H:i:s') ?></small>
            <a href="app/posts/delete.php?action=delete-post-link&post_id=<?= $post['post_id'] ?>" class="btn btn-danger btn-block"><i class="fa fa-trash-o pr-1" aria-hidden="true"></i>Delete post</a>
        </form>
    </div><!-- End container for form -->
</div><!-- End jumbotron for form -->

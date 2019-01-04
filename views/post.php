<?php

$statement = $pdo->query('SELECT a.*, b.username, b.profile_pic FROM posts a LEFT JOIN users b ON a.user_id=b.user_id ORDER BY created_at DESC;');

if (!$statement) {
    die(var_dump($pdo->errorInfo()));
}

$posts = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($posts as $post): ?>

    <?php

    $post_id = $post['post_id'];

    $user_id = $_SESSION['logedin']['user_id'];

    $updated_at = date_create($post['updated_at'], timezone_open('UTC'));
    date_timezone_set($updated_at, timezone_open($timezone));

    $created_at = date_create($post['created_at'], timezone_open('UTC'));
    date_timezone_set($created_at, timezone_open($timezone));

    $statement = $pdo->query("SELECT COUNT(*) AS likes FROM likes WHERE post_id = '$post_id';");

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    $likes = $statement->fetchAll(PDO::FETCH_ASSOC);

    // Determine if user already liked the posts
    $statement = $pdo->query("SELECT * FROM likes WHERE user_id= '$user_id' AND post_id='$post_id';");

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    $liked = $statement->fetch(PDO::FETCH_ASSOC);

    if ($liked) {
        $action = 'liked';
    } else {
        $action = 'disliked';
    }

    ?>

    <article class="mt-3">
        <div class="card position-relative" style="width: 100%;">
            <div class="card-header d-flex justify-content-between align-items-center px-2" style="height: 50px;">
                <div class="d-flex justify-content-between align-items-center">
                    <img src="assets/images/profiles/<?= $post['profile_pic'] ?>" alt="Profile picture for <?= $post['username'] ?>" class="img-thumbnail" style="height: auto; max-width: 40px; display: block;" />

                    <?php if ($post['username'] === $username): ?>
                        <button data-id="post-<?= $post['post_id'] ?>" " type="button" class="btn-post-edit btn-small btn-info ml-2"><i class="fa fa-pencil-square-o pr-1" aria-hidden="true"></i>Edit</button>
                    <?php endif ?>

                </div>
                <small>Posted by: <?= $post['username'] ?></small>
            </div>

            <div class="card-body p-0">
                <img class="card-img-top img-fluid" src="assets/images/posts/<?= $post['content'] ?>" alt="Card image cap" />
                <p class="card-text text-left bg-light py-2 px-4 m-0">
                    <small><?= $post['description'] ?></small>
                </p>
            </div>

            <div class="card-footer d-flex justify-content-between align-items-center px-2">
                <div class="d-flex justify-content-start align-items-center">

                <?php if ($post['username'] !== $username): ?>
                    <form method="post" class="my-like-form liked" >
                        <input type="hidden" name="post_id" value="<?= $post_id ?>" />
                        <input type="hidden" name="action" value="<?= $action ?>" />
                        <button type="submit"><i class="fa fa-heart" aria-hidden="true"></i></button>
                    </form>
                <?php endif; ?>

                    <small class="pl-1">Likes:</small><small class="font-italic"><?= $likes[0]['likes'] ?></small>
                </div>

                <div>
                    <small><?= date_format($updated_at, 'Y-m-d H:i:s') ?></small>
                </div>
            </div>
            <?php require __DIR__.'/post-overlay.php'; ?>
        </div>
    </article>

<?php endforeach; ?>

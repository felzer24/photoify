<?php

$statement = $pdo->query('SELECT a.*, b.username, b.profile_pic FROM posts a LEFT JOIN users b ON a.user_id=b.user_id ORDER BY created_at DESC;');

if (!$statement) {
    die(var_dump($pdo->errorInfo()));
}

$posts = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($posts as $post): ?>

<?php

$datetime = date_create($post['updated_at'], timezone_open('UTC'));
date_timezone_set($datetime, timezone_open($timezone));

?>

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
            <a href="app/posts/likes.php?post=<?= $post['post_id'] ?>" class="p-2 border-0 bg-light btn">
                <i class="fa fa-heart" aria-hidden="true"></i>
            </a>
            <?php endif ?>
            <small class="pl-1">Likes:</small><small class="font-italic" id="like-counter">10</small>
        </div>

        <div>
            <small><?= date_format($datetime, 'Y-m-d H:i:s') ?></small>
        </div>
    </div>
    <?php require __DIR__.'/post-overlay.php'; ?>
</div>

<?php endforeach ?>

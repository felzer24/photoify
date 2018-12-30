<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

$user_id = $_SESSION['logedin']['user_id'];

$dir = __DIR__.'/../../assets/images/posts/';

$_SESSION['banner']['class'] = 'alert-danger';

if (isset($_GET['action']) && $_GET['action'] === 'delete-post-link') {

    $post_id = $_GET['post_id'];

    $statement = $pdo->query("SELECT * FROM posts WHERE post_id = '$post_id' AND user_id = '$user_id';");

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    $array = $statement->fetch(PDO::FETCH_ASSOC);

    if (!$array) {
        $_SESSION['banner']['message'] = 'Post from that user does not exist';
        redirect('/account.php');
        exit();
    }

    unlink($dir.$array['content']);

    $statement = $pdo->query("DELETE FROM posts WHERE post_id = '$post_id' AND user_id = '$user_id';");

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    $_SESSION['banner']['message'] = 'Successfully deleted post';
    $_SESSION['banner']['class'] = 'alert-success';
    redirect('/account.php');
    exit();

} else {

    redirect('/account.php');
}

<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

if (!isset($_SESSION['logedin'])) {
    redirect('/');
    exit();
}

if (isset($_GET['action']) && $_GET['action'] === 'delete-account-link') {
    $user_id = $_SESSION['logedin']['user_id'];
    $username = $_SESSION['logedin']['username'];

    if (password_verify($username, $_GET['check'])) {

        // Query pictures from user-posts
        $statement = $pdo->query("SELECT content FROM posts WHERE user_id = '$user_id';");

        if (!$statement) {
            die(var_dump($pdo->errorInfo()));
        }

        $post_files = $statement->fetchAll(PDO::FETCH_ASSOC);

        // Delete user-posts
        $dir = __DIR__.'/../../assets/images/posts/';
        $statement = $pdo->query("DELETE FROM posts WHERE user_id = '$user_id';");

        if (!$statement) {
            die(var_dump($pdo->errorInfo()));
        }

        foreach ($post_files as $post_file) {
            unlink($dir.$post_file['content']);
        }

        // Delete user-likes
        $statement = $pdo->query("DELETE FROM likes WHERE user_id = '$user_id';");

        if (!$statement) {
            die(var_dump($pdo->errorInfo()));
        }

        // Delete user-account + avatar-image
        $profile_pic = $_SESSION['logedin']['profile_pic'];
        $dir = __DIR__.'/../../assets/images/profiles/';

        $statement = $pdo->query("DELETE FROM users WHERE user_id = '$user_id';");

        if (!$statement) {
            die(var_dump($pdo->errorInfo()));
        }

        if ($profile_pic !== 'default_profile.png') {
            unlink($dir.$profile_pic);
        }

        session_unset();
        session_destroy();
        redirect('/');
        exit();
    } else {
        redirect('/account.php');
        exit();
    }
} else {
    redirect('/account.php');
}

<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

if (isset($_GET['action']) && $_GET['action'] === 'delete-account-link') {

    $user_id = $_SESSION['logedin']['user_id'];
    $username = $_SESSION['logedin']['username'];

    if (password_verify($username, $_GET['check'])) {

        // Query profile picture
        $statement = $pdo->query("SELECT profile_pic FROM users WHERE user_id = '$user_id';");

        if (!$statement) {
            die(var_dump($pdo->errorInfo()));
        }

        $array = $statement->fetch(PDO::FETCH_ASSOC);
        $avatar = $array['profile_pic'];
        echo $avatar;

        // Delete user-account

        // Query pictures from user-posts
        $statement = $pdo->query("SELECT content FROM posts WHERE user_id = '$user_id';");

        if (!$statement) {
            die(var_dump($pdo->errorInfo()));
        }

        $post_files = $statement->fetchAll(PDO::FETCH_ASSOC);

        foreach ($post_files as $post_file) {
            echo $post_file['content'];
        }

        // Delete user-posts

    } else {
        redirect('/account.php');
        exit();
    }

} else {
    redirect('/account.php');
}

<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

if (isset($_GET['action'], $_GET['post_id'])) {

    $post_id = $_GET['post_id'];
    $user_id = $_SESSION['logedin']['user_id'];

    if ($_GET['action'] === 'like') {

        $statement = $pdo->prepare('INSERT INTO likes (user_id,post_id) VALUES (:user_id,:post_id);');

        if (!$statement) {
            die(var_dump($pdo->errorInfo()));
        }

        $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $statement->bindParam(':post_id', $post_id, PDO::PARAM_INT);
        $statement->execute();

        redirect('/account.php');
        exit();

    } elseif ($_GET['action'] === 'dislike') {

        $statement = $pdo->query("DELETE FROM likes WHERE post_id = '$post_id' AND user_id = '$user_id';");

        if (!$statement) {
            die(var_dump($pdo->errorInfo()));
        }

        redirect('/account.php');
        exit();

    } else {
        redirect('/account.php');
    }

} else {
    redirect('/account.php');
}

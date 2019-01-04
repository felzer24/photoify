<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

if (isset($_POST['post_id'], $_POST['action'])) {

    $action = $_POST['action'];
    $post_id = $_POST['post_id'];
    $user_id = $_SESSION['logedin']['user_id'];

    if ($action === 'liked') {

        $statement = $pdo->query("DELETE FROM likes WHERE post_id = '$post_id' AND user_id = '$user_id';");

        if (!$statement) {
            die(var_dump($pdo->errorInfo()));
        }

    } elseif ($action === 'disliked') {

        $statement = $pdo->prepare('INSERT INTO likes (user_id,post_id) VALUES (:user_id,:post_id);');

        if (!$statement) {
            die(var_dump($pdo->errorInfo()));
        }

        $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $statement->bindParam(':post_id', $post_id, PDO::PARAM_INT);
        $statement->execute();
    }

    $statement = $pdo->query("SELECT COUNT(*) AS likes FROM likes WHERE post_id = '$post_id';");

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    $likes = $statement->fetch(PDO::FETCH_ASSOC);

    $likes = json_encode($likes);
    header('Content-Type: application/json');
    echo $likes;

} else {
    exit();
}

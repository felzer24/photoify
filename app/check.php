<?php

declare(strict_types=1);

require __DIR__.'/autoload.php';

$user_id = $_SESSION['logedin']['user_id'];
$post_id = 42;

if(isAuthenticated($pdo, $user_id) === true){
    echo "You are authenticated";
} else {
    echo "You are not authenticated";
}

echo "<br/>";
echo "<br/>";

if(isOwnerofPost($pdo, $post_id, $user_id) === true){
    echo "You are the owner of this post";
} else {
    echo "You are not the owner of this post";
}

function isAuthenticated(object $pdo, $user_id): bool
{
    $statement = $pdo->query("SELECT user_id FROM users WHERE user_id = '$user_id';");

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    $auth = $statement->fetch(PDO::FETCH_ASSOC);

    if ($auth['user_id'] === $user_id) {
        return true;
    }
}

function isOwnerofPost(object $pdo, $post_id, $user_id): bool
{
    $statement = $pdo->query("SELECT user_id FROM posts WHERE user_id = '$user_id' AND post_id = '$post_id';");

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    $owner = $statement->fetch(PDO::FETCH_ASSOC);

    if ($owner['user_id'] === $user_id) {
        return true;
    }
}

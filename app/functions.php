<?php

declare(strict_types=1);

if (!function_exists('redirect')) {
    /**
     * Redirect the user to given path.
     *
     * @param string $path
     *
     * @return void
     */
    function redirect(string $path)
    {
        header("Location: ${path}");
        exit;
    }
}

function isOwnerofPost($pdo, $post_id, $user_id): bool
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

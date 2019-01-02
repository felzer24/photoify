<?php

declare(strict_types=1);

require __DIR__.'/app/autoload.php';

if (isset($_POST['post_id'], $_POST['action'])) {

    $user_id = 17;
    $post_id = $_POST['post_id'];

    $statement = $pdo->prepare('INSERT INTO likes (user_id,post_id) VALUES (:user_id,:post_id);');

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':post_id', $post_id, PDO::PARAM_INT);
    $statement->execute();

    $statement = $pdo->query("SELECT COUNT(*) AS likes FROM likes WHERE post_id = '$post_id';");

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    $likes = $statement->fetchAll(PDO::FETCH_ASSOC);

    $likes = json_encode($likes);
    header('Content-Type: application/json');
    echo $likes;

}

// if (isset($_POST['name'], $_POST['actor'])) {
//     $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
//     $actor = filter_var($_POST['actor'], FILTER_SANITIZE_STRING);
//     $vampires = json_decode(file_get_contents(__DIR__.'/vampires.json'), true);
//     foreach ($vampires as $vampire) {
//         if ($vampire['name'] === $name) {
//             http_response_code(400);
//             header('Content-Type: application/json');
//             echo json_encode(['error' => 'The vampire is not unique!']);
//             exit;
//         }
//     }
//     $vampires[] = [
//         'name' => $name,
//         'actor' => $actor,
//     ];
//     $vampires = json_encode($vampires);
//     file_put_contents(__DIR__.'/vampires.json', $vampires);
//     header('Content-Type: application/json');
//     echo $vampires;
// }

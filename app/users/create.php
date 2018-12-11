<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

if (isset($_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['username'], $_POST['password'])) {

    $user = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $fname = filter_var($_POST['fname'], FILTER_SANITIZE_STRING);
    $lname = filter_var($_POST['lname'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $created_at = time();

    $statement = $pdo->prepare('INSERT INTO users (email,firstname,lastname,username,password) VALUES (:email,:fname,:lname,:user,:pass);');

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->bindParam(':fname', $fname, PDO::PARAM_STR);
    $statement->bindParam(':lname', $lname, PDO::PARAM_STR);
    $statement->bindParam(':user', $user, PDO::PARAM_STR);
    $statement->bindParam(':pass', $pass, PDO::PARAM_STR);
    $statement->execute();
}

<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

if (isset($_POST['name'], $_POST['email'], $_POST['username'], $_POST['password'], $_POST['rpassword'])) {

    $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
    $name = trim(filter_var($_POST['name'], FILTER_SANITIZE_STRING));
    $user = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

    if ($_POST['password'] != $_POST['rpassword']) {
        $_SESSION['login-error'] = 'Password does not match';
        redirect('/signup.php');
    }

    if(filter_var($email, FILTER_VALIDATE_EMAIL) != true ){
        $_SESSION['login-error'] ='You provided an invalid email-address';
        redirect('/signup.php');
    }

    $statement = $pdo->prepare('SELECT email, username FROM users WHERE email = :email AND username = :user');

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->bindParam(':user', $user, PDO::PARAM_STR);
    $statement->execute();

    $credentials = $statement->fetch(PDO::FETCH_ASSOC);

    if($credentials['email'] === $email && $credentials['username'] === $user){
        $_SESSION['login-error'] = 'Email or Password already registred';
        redirect('/signup.php');
    }

    $statement = $pdo->prepare('INSERT INTO users (email,name,username,password) VALUES (:email,:name,:user,:pass);');

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->bindParam(':name', $name, PDO::PARAM_STR);
    $statement->bindParam(':user', $user, PDO::PARAM_STR);
    $statement->bindParam(':pass', $pass, PDO::PARAM_STR);
    $statement->execute();

    $_SESSION['login-success'] = 'You are now registred';
    redirect('/index.php');
}

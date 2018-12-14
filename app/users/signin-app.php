<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

if(isset($_POST['username'], $_POST['password'])){

    $user = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
    $pass = $_POST['password'];

    $statement = $pdo->prepare('SELECT * FROM users WHERE username = :user');

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    $statement->bindParam(':user', $user, PDO::PARAM_STR);
    $statement->execute();

    $credentials = $statement->fetch(PDO::FETCH_ASSOC);

    if($credentials != true || password_verify($pass, $credentials['password']) != true){
        $_SESSION['login-error'] ='You provided wrong credentials';
        redirect('../../index.php');
    } else{
        if(password_verify($pass, $credentials['password'])){
            $_SESSION['login-success'] ='You provided right credentials';

            $_SESSION['logedin'] = [
                'id' => $credentials['id'],
                'email' => $credentials['email'],
                'name' => $credentials['name'],
                'user' => $credentials['username'],
                'profile_pic' => $credentials['profile_pic'],
                'profile_bio' => $credentials['profile_bio'],
                'created_at' => $credentials['created_at']
            ];
            redirect('../../page.php');
        }
    }
}

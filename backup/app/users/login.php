<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

// In this file we login users.

if(isset($_POST['email'], $_POST['password'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    if(filter_var($email, FILTER_VALIDATE_EMAIL) != true ){
        $_SESSION['login'] ='You provided an invalid email-address';
        redirect('../../login.php');
    }

    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    $statement = $pdo->prepare('SELECT * FROM users WHERE email = :email');

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    $statement->bindParam(':email', $email, PDO::PARAM_STR);

    $statement->execute();

    $credentials = $statement->fetch(PDO::FETCH_ASSOC);

    if($credentials != true || password_verify($password, $credentials['password']) != true){
        $_SESSION['login'] ='You provided wrong credentials';
        redirect('../../login.php');
    } else{
        if(password_verify($password, $credentials['password'])){
            $_SESSION['login'] ='You provided right credentials';
            $user_id = $credentials['id'];
            $user_name = $credentials['name'];
            $_SESSION['user'] = [
                'id' => $user_id,
                'name' => $user_name,
                'email' =>  $email
            ];
            redirect('../../index.php');
        }
    }
}

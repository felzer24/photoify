<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

if (isset($_POST['login-btn'])) {
    $_SESSION['banner']['class'] = 'alert-danger';

    $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
    $password = $_POST['password'];

    if (empty($username)) {
        $_SESSION['errors']['username'] = 'Please provide a username';
    } else {
        $_SESSION['values']['username'] = $username;
    }

    if (empty($password)) {
        $_SESSION['errors']['password'] = 'You need to enter a password';
    }

    if (isset($_SESSION['errors']) && count($_SESSION['errors']) > 0) {
        $_SESSION['banner']['message'] = 'Check fields for errors';
        redirect('/');
        exit();
    }

    $statement = $pdo->prepare('SELECT * FROM users WHERE username = :username');

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    $statement->bindParam(':username', $username, PDO::PARAM_STR);
    $statement->execute();

    $credentials = $statement->fetch(PDO::FETCH_ASSOC);

    if ($credentials != true || password_verify($password, $credentials['password']) != true) {
        unset($_SESSION['errors']);
        $_SESSION['banner']['message'] = 'You provided wrong credentials';
        redirect('/');
        exit();
    } else {
        if (password_verify($password, $credentials['password'])) {
            $_SESSION['logedin'] = [
                'user_id' => $credentials['user_id'],
                'email' => $credentials['email'],
                'fullname' => $credentials['fullname'],
                'username' => $credentials['username'],
                'timezone' => $credentials['timezone'],
                'profile_pic' => $credentials['profile_pic'],
                'profile_bio' => $credentials['profile_bio'],
                'created_at' => $credentials['created_at']
            ];
            unset($_SESSION['errors']);
            unset($_SESSION['banner']);
            redirect('/account.php');
            exit();
        }
    }
} else {
    redirect('/');
}

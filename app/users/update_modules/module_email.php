<?php

declare(strict_types=1);

$email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));

if (filter_var($email, FILTER_VALIDATE_EMAIL) != true) {
    $_SESSION['banner']['message'] = 'Please provide a valid email';
    redirect('/account.php');
    exit();
}

$statement = $pdo->prepare('SELECT email FROM users WHERE email = :email;');

if (!$statement) {
    die(var_dump($pdo->errorInfo()));
}

$statement->bindParam(':email', $email, PDO::PARAM_STR);
$statement->execute();

$credentials = $statement->fetch(PDO::FETCH_ASSOC);

if ($credentials['email'] === $email) {
    unset($_SESSION['errors']);
    unset($_SESSION['values']);
    $_SESSION['banner']['message'] = 'Email already registred';
    redirect('/account.php');
    exit();
}

$_SESSION['logedin']['email'] = $email;

<?php

declare(strict_types=1);

if (!empty($cpassword) && !empty($npassword) && !empty($rpassword)) {
    $statement = $pdo->prepare('SELECT password FROM users WHERE user_id = :user_id');

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->execute();

    $credentials = $statement->fetch(PDO::FETCH_ASSOC);

    if (password_verify($cpassword, $credentials['password'])) {
        if ($npassword === $rpassword) {
            $password = password_hash($npassword, PASSWORD_DEFAULT);
            $statement = $pdo->prepare('UPDATE users SET password = :password WHERE user_id = :user_id;');

            if (!$statement) {
                die(var_dump($pdo->errorInfo()));
            }

            $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $statement->bindParam(':password', $password, PDO::PARAM_STR);
            $statement->execute();
        } else {
            $_SESSION['banner']['message'] = 'Password does not match';
            redirect('/account.php');
            exit();
        }
    } else {
        $_SESSION['banner']['message'] = 'Error updating password';
        redirect('/account.php');
        exit();
    }
} else {
    $_SESSION['banner']['message'] = 'Fill all password fields';
    redirect('/account.php');
    exit();
}

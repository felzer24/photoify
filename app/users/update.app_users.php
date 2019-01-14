<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

if (!isset($_SESSION['logedin'])) {
    redirect('/');
    exit();
}

$_SESSION['page']['error'] = 'yes';
$user_id = $_SESSION['logedin']['user_id'];
$_SESSION['banner']['class'] = 'alert-danger';

$profile_pic = $_SESSION['logedin']['profile_pic'];
$profile_bio = $_SESSION['logedin']['profile_bio'];
$fullname = $_SESSION['logedin']['fullname'];
$timezone = $_SESSION['logedin']['timezone'];
$email = $_SESSION['logedin']['email'];

if (isset($_POST['update_profile-btn'])) {

    if (isset($_FILES['profile_pic']) && !empty($_FILES['profile_pic']['size'])) {
        require __DIR__.'/update_modules/module_avatar.php';
    }

    if (isset($_POST['profile_bio']) && !empty($_POST['profile_bio'])) {
        require __DIR__.'/update_modules/module_biography.php';
    }

    if (isset($_POST['email']) && !empty($_POST['email'])) {
        if ($email !== $_POST['email']){
            require __DIR__.'/update_modules/module_email.php';
        }
    }

    if (isset($_POST['fullname']) && !empty($_POST['fullname'])) {
        $fullname = trim(filter_var($_POST['fullname'], FILTER_SANITIZE_STRING));
        $_SESSION['logedin']['fullname'] = $fullname;
    }

    if (isset($_POST['timezone']) && !empty($_POST['timezone'])) {
        $timezone = $_POST['timezone'];
        $_SESSION['logedin']['timezone'] = $timezone;
    }

    if (isset($_POST['cpassword'], $_POST['npassword'], $_POST['rpassword'])){

        $cpassword = $_POST['cpassword'];
        $npassword = $_POST['npassword'];
        $rpassword = $_POST['rpassword'];

        if (!empty($cpassword)) {
            require __DIR__.'/update_modules/module_password.php';
        }
    }

    if (isset($_SESSION['errors']) && count($_SESSION['errors']) > 0) {
        $_SESSION['banner']['message'] = 'Check fields for errors';
        redirect('/account.php');
        exit();
    }

    $sql = "UPDATE users SET profile_pic = :profile_pic, profile_bio = :profile_bio, email = :email, fullname = :fullname, timezone = :timezone WHERE user_id = :user_id;";
    $statement = $pdo->prepare($sql);

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    $statement->bindParam(':profile_pic', $profile_pic, PDO::PARAM_STR);
    $statement->bindParam(':profile_bio', $profile_bio, PDO::PARAM_STR);
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->bindParam(':fullname', $fullname, PDO::PARAM_STR);
    $statement->bindParam(':timezone', $timezone, PDO::PARAM_STR);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->execute();

    $_SESSION['banner']['message'] = 'Profile updated successfully';
    $_SESSION['banner']['class'] = 'alert-success';
    $_SESSION['page']['error'] = 'no';
    redirect('/account.php');
    exit();

} else {
    redirect('/account.php');
}

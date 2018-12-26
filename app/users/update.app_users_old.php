<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

if (isset($_POST['update_profile-btn'])) {

    $user_id = $_SESSION['logedin']['user_id'];
    $profile_pic = $_FILES['profile_pic'];

    if(!in_array($profile_pic['type'], ['image/jpeg', 'image/png', 'image/gif'])) {
        $_SESSION['banner']['message'] = 'Filetype is not allowed';
        $_SESSION['banner']['class'] = 'error';
        redirect('/account.php');
        exit();
    }

    if($profile_pic['size'] > 2097152) {
        $_SESSION['banner']['message'] = 'File size exceeds 2MB';
        $_SESSION['banner']['class'] = 'error';
        redirect('/account.php');
        exit();
    }

    $statement = $pdo->query("SELECT profile_pic FROM users WHERE user_id = $user_id;");

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    $current_images = $statement->fetch(PDO::FETCH_ASSOC);
    $current_image = $current_images['profile_pic'];
    $dir = __DIR__.'/../../assets/images/profiles/';

    if(!in_array($current_image, ['default_profile.png'])){
        unlink($dir.$current_image);
    }

    $file_exp = explode('.', $profile_pic['name']);
    $file_ext = strtolower(end($file_exp));
    $random = rand(10, 90);

    $newfilename = "profile_$user_id$random.$file_ext";
    $destination = $dir.$newfilename;

    move_uploaded_file($profile_pic['tmp_name'], $destination);
    $_SESSION['logedin']['profile_pic'] = $newfilename;

    $sql = "UPDATE users SET profile_pic = '$newfilename' WHERE user_id = '$user_id';";
    $statement = $pdo->query($sql);

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    $_SESSION['banner']['message'] = 'New avatar uploaded successfully';
    $_SESSION['banner']['class'] = 'success';
    redirect('/account.php');
    exit();

} else {

    redirect('/account.php');

}

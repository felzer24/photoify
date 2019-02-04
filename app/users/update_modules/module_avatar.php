<?php

declare(strict_types=1);

$profile_files = $_FILES['profile_pic'];
$dir = __DIR__.'/../../../assets/images/profiles/';

if (!in_array($profile_files['type'], ['image/jpeg', 'image/png', 'image/gif'])) {
    $_SESSION['banner']['message'] = 'Filetype is not allowed';
    redirect('/account.php');
    exit();
}

if ($profile_files['size'] > 2097152) {
    $_SESSION['banner']['message'] = 'File size exceeds 2MB';
    redirect('/account.php');
    exit();
}

if ($profile_pic !== 'default_profile.png') {
    unlink($dir.$profile_pic);
}

$file_exp = explode('.', $profile_files['name']);
$file_ext = strtolower(end($file_exp));
$random = rand(10, 90);

$profile_pic = "profile_$user_id$random.$file_ext";
$destination = $dir.$profile_pic;

move_uploaded_file($profile_files['tmp_name'], $destination);
$_SESSION['logedin']['profile_pic'] = $profile_pic;

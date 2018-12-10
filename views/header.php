<?php
// Always start by loading the default application setup.
require __DIR__.'/../app/autoload.php';

    if(isset($_SESSION['user'])){
        $navlink=[
            'link' => 'Logout',
            'href' => 'app/users/logout.php'
        ];
    } else {
        $navlink=[
            'link' => 'Login',
            'href' => 'login.php'
        ];
    }

    $array = $_SERVER['REQUEST_URI'];
    $array = (explode('/', $array));
    $page = end($array);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?php echo $config['title']; ?></title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/styles/main.css">
</head>
<body>
    <?php require __DIR__.'/navigation.php'; ?>

    <div class="container py-5">

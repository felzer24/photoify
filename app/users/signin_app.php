<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

if(isset($_POST['login-btn'])){

    $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
    $password = $_POST['password'];

}

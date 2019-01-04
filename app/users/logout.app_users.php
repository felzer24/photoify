<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

if (isset($_GET['clicked'])) {

    session_unset();
    session_destroy();

    redirect('/');
    exit();

} else {

    redirect('/account.php');
}

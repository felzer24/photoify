<?php if (isset($_SESSION['logedin'])): ?>

    <body>
        <header class="position-relative">
            <nav class="navbar main navbar-light bg-light my-orange-color">
                <div class="container">
                    <a class="navbar-brand font-weight-bold" href="/">Photoify</a>

                    <i class="navbar font-weight-bold d-none d-lg-block fa fa-sign-out" aria-hidden="true">
                        <a class="pl-2 text-dark" href="app/users/logout.app_users.php?clicked=true" title="Logout">Logout</a>
                    </i>

                    <div class="mobile-menu d-flex d-lg-none">
                        <div class="hamburger-menu"></div>
                    </div>
                </div>
            </nav>
        </header>

    <?php

    $email = $_SESSION['logedin']['email'];
    $user_id = $_SESSION['logedin']['user_id'];
    $fullname = $_SESSION['logedin']['fullname'];
    $username = $_SESSION['logedin']['username'];
    $timezone = $_SESSION['logedin']['timezone'];
    $created_at = $_SESSION['logedin']['created_at'];
    $profile_pic = $_SESSION['logedin']['profile_pic'];
    $profile_bio = $_SESSION['logedin']['profile_bio'];

    $datetime = date_create($created_at, timezone_open('UTC'));
    date_timezone_set($datetime, timezone_open($timezone));
    $my_timezone = date_timezone_get($datetime);

    $timezones=[
        str_replace('_','',"$timezone") => $timezone,
        'Europe/Stockholm' => 'Europe/Stockholm',
        'Europe/London' => 'Europe/London',
        'America/New York' => 'America/New_York',
        'Asia/Dubai' => 'Asia/Dubai'
    ];

    $timezones = array_unique($timezones);

    ?>

<?php endif ?>

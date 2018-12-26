<?php

declare(strict_types=1);

$profile_bio = trim(filter_var($_POST['profile_bio'], FILTER_SANITIZE_STRING));

if (strlen($profile_bio) > 100) {
    $_SESSION['errors']['profile_bio'] = 'Max 100 characters';
    $_SESSION['logedin']['profile_bio'] = '';
} else {
    $_SESSION['logedin']['profile_bio'] = $profile_bio;
}

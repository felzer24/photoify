<?php

declare(strict_types=1);

$a=[
    'Europe/Stockholm',
    'Europe/London',
    'America/New_York',
    'Asia/Dubai',
    'Europe/Stockholm'
];
print_r(array_unique($a));

//$profile_pic = 'default_profile.png';
//$$profile_pic = '';
$profile_bio = 'My example biography on photoify';
$fullname = 'Unknown User';
$email = 'example@mail.se';
$password = '1234';
$timezone = 'Europe/Stockholm';

$sql = "UPDATE users SET ";
$fields = [];

if (isset($profile_pic)) {
   if (!empty($profile_pic)) {
       $sql .= "'profile_pic' = $profile_pic";
   }
   $fields[] = 'profile_pic';
}

if (isset($profile_bio)) {
   if (!empty($profile_bio)) {
       if (count($fields) > 0) {
           $sql .= ", ";
       }
       $sql .= "'profile_bio' = $profile_bio";
   }
   $fields[] = 'profile_bio';
}

if (isset($fullname)) {
   if (!empty($fullname)) {
       if (count($fields) > 0) {
           $sql .= ", ";
       }
       $sql .= "'profile_bio' = $profile_bio";
   }
   $fields[] = 'profile_bio';
}


//
// if (isset($fullname)) {
//    if (!empty($fullname)) {
//        if (count($fields) > 0) {
//            $sql .= ", 'fullname' = $fullname";
//        } else {
//            $sql .= "'fullname' = $fullname";
//        }
//        $fields[] = 'fullname';
//    }
// }
//
// if (isset($email)) {
//    if (!empty($email)) {
//        if (count($fields) > 0) {
//            $sql .= ", 'email' = $email";
//        } else {
//            $sql .= "'email' = $email";
//        }
//        $fields[] = 'email';
//    }
// }
//
// if (isset($password)) {
//    if (!empty($password)) {
//        if (count($fields) > 0) {
//            $sql .= ", 'password' = $password";
//        } else {
//            $sql .= "'password' = $password";
//        }
//        $fields[] = 'profile_bio';
//    }
// }
//
// if (isset($timezone)) {
//    if (!empty($timezone)) {
//        if (count($fields) > 0) {
//            $sql .= ", 'profile_bio' = $timezone";
//        } else {
//            $sql .= "'profile_bio' = $timezone";
//        }
//        $fields[] = 'profile_bio';
//    }
// }

if (count($fields) > 0) {
    $sql .= " WHERE 'user_id' = 1;";
}

echo $sql;

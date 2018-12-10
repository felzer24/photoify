<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__.'/../autoload.php';

if (isset($_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['username'], $_POST['password'])) {

    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $fname = filter_var($_POST['fname'], FILTER_SANITIZE_STRING);
    $lname = filter_var($_POST['lname'], FILTER_SANITIZE_STRING);
    $user = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $pass = $_POST['password'];
    $created_at = time();

    //$statement = $pdo->prepare('INSERT INTO users (id,email,firstname,lastname,username,password,created_at) VALUES (:p1,:p2,:p3,:p4,:p5,:p6);');

    $pdo->query(INSERT INTO users ('id,email,firstname,lastname,username,password,created_at) VALUES ("$email","$fname","$lname","$user","$pass","$created_at")';);
    // $statement->bindParam(':p1:p2:p3:p4:p5:p6',$email,$firstname,$lastname,$username,$password,$time, PDO::PARAM_STR);

    // if (!$statement) {
    //     die(var_dump($pdo->errorInfo()));
    // }

    // $statement->execute();

    // INSERT INTO users (email,firstname,lastname,username,password,created_at)
    // VALUES ('fredrik@leemann.se','Fredrik','Leemann','freddan88','1234',strftime('%s','now','localtime'));
}

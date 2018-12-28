<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

if (isset($_POST['timeline_post-btn'])) {

    $dir = __DIR__.'/../../assets/images/posts/';
    $user_id = $_SESSION['logedin']['user_id'];
    $_SESSION['banner']['class'] = 'alert-danger';

    if (isset($_FILES['postfile']) && !empty($_FILES['postfile']['size'])) {

        $post_files = $_FILES['postfile'];

        if (!in_array($post_files['type'], ['image/jpeg', 'image/png', 'image/gif'])) {
            $_SESSION['banner']['message'] = 'Filetype is not allowed';
            redirect('/account.php');
            exit();
        }

        if ($post_files['size'] > 4194304) {
            $_SESSION['banner']['message'] = 'File size exceeds 4MB';
            redirect('/account.php');
            exit();
        }

        $file_exp = explode('.', $post_files['name']);
        $file_ext = strtolower(end($file_exp));
        $filename = $user_id.'_'.uniqid().'_'.date('Y-m-d').'_'.time().'.'.$file_ext;
        $destination = $dir.$filename;

        move_uploaded_file($post_files['tmp_name'], $destination);

    } else {
        $_SESSION['banner']['message'] = 'You need to provide a file to be able to post';
        redirect('/account.php');
        exit();
    }

    if (isset($_POST['postdesc']) && !empty($_POST['postdesc'])) {

        $post_desc = trim(filter_var($_POST['postdesc'], FILTER_SANITIZE_STRING));

        if (strlen($post_desc) > 100) {
            $_SESSION['errors']['post_desc'] = 'Max 100 characters';
            $_SESSION['logedin']['post_desc'] = '';
        }

    } else {

        $post_desc = "No description";

    }

    if (isset($_SESSION['errors']) && count($_SESSION['errors']) > 0) {
        $_SESSION['banner']['message'] = 'Check fields for errors';
        redirect('/account.php');
        exit();
    }

    $statement = $pdo->prepare('INSERT INTO posts (content,description,user_id) VALUES (:content,:description,:user_id);');

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    $statement->bindParam(':content', $filename, PDO::PARAM_STR);
    $statement->bindParam(':description', $post_desc, PDO::PARAM_STR);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->execute();

    $_SESSION['banner']['message'] = 'Posted successfully to timeline';
    $_SESSION['banner']['class'] = 'alert-success';
    redirect('/account.php');
    exit();

} else {
    redirect('/account.php');
}

<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

if (!isset($_SESSION['logedin'])) {
    redirect('/');
    exit();
}

if (isset($_POST['update-post-btn'])) {

    $_SESSION['banner']['class'] = 'alert-danger';
    $dir = __DIR__.'/../../assets/images/posts/';

    $user_id = $_SESSION['logedin']['user_id'];
    $post_id = $_POST['post_id'];
    $postdesc = $_POST['postdesc'];
    $filename = $_POST['filename'];

    if(isOwnerofPost($pdo, $post_id, $user_id) === false){
        redirect('/');
        exit();
    }

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

        unlink($dir.$filename);

        $file_exp = explode('.', $post_files['name']);
        $file_ext = strtolower(end($file_exp));
        $filename = $user_id.'_'.uniqid().'_'.date('Y-m-d').'_'.time().'.'.$file_ext;
        $destination = $dir.$filename;

        move_uploaded_file($post_files['tmp_name'], $destination);

    }

    if (isset($_POST['postdesc']) && !empty($_POST['postdesc'])) {

        $postdesc = trim(filter_var($_POST['postdesc'], FILTER_SANITIZE_STRING));

        if (strlen($postdesc) > 100) {
            $_SESSION['banner']['message'] = 'Max 100 characters in description';
            redirect('/account.php');
            exit();
        }
    }

    $statement = $pdo->prepare('UPDATE posts SET content = :content, description = :description, updated_at = CURRENT_TIMESTAMP WHERE post_id = :post_id;');

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    $statement->bindParam(':content', $filename, PDO::PARAM_STR);
    $statement->bindParam(':description', $postdesc, PDO::PARAM_STR);
    $statement->bindParam(':post_id', $post_id, PDO::PARAM_INT);
    $statement->execute();

    $_SESSION['banner']['message'] = 'Post updated successfully';
    $_SESSION['banner']['class'] = 'alert-success';
    redirect('/account.php');
    exit();

}  else {

    redirect('/account.php');
}

<?php require __DIR__.'/views/header.php'; ?>

<article>
    <h1><?php echo $config['title']; ?></h1>
    <p>This is the home page.</p>

    <?php if(isset($_SESSION['user'])){
        $name = $_SESSION['user']['name'];
        echo "Welcome, $name!";
    }
    ?>

</article>

<?php require __DIR__.'/views/footer.php'; ?>

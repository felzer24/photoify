<?php require __DIR__.'/views/header.php'; ?>

<main>
    <h3>Welcome <?= $_SESSION['logedin']['fullname'] ?></h3>

    <?php var_dump($_SESSION['logedin']); ?>

    <a style="color: white;" href="app/users/logout_app.php" title="Logout">Logout</a>
</main>

<?php require __DIR__.'/views/footer.php'; ?>

<?php require __DIR__.'/views/header.php'; ?>

<article>
    <h1>Login</h1>

<?php if(isset($_SESSION['login'])){
    echo $_SESSION['login'];
}
?>

    <form action="app/users/login.php" method="post">
        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="text" name="email" placeholder="francis@darjeeling.com" value="francis@darjeeling.com" required>
            <small class="form-text text-muted">Please provide the your email address.</small>
        </div><!-- /form-group -->

        <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" value="the-darjeeling-limited" required>
            <small class="form-text text-muted">Please provide the your password (passphrase).</small>
        </div><!-- /form-group -->

        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</article>

<?php require __DIR__.'/views/footer.php'; ?>

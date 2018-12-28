<?php

require __DIR__.'/views/header.php';

if (isset($_SESSION['logedin'])) {
    redirect('/account.php');
    exit();
}

?>

<main style="height: 100vh;" class="d-flex justify-content-center align-items-center">

    <section class="login-form">

        <div class="alert <?= $_SESSION['banner']['class'] ?? 'alert-secondary' ?> m-0 d-flex align-items-center justify-content-center">
            <small><strong><?= $_SESSION['banner']['message'] ?? 'Messages will appear here' ?></strong></small>
        </div>

        <div class="container m-0 py-3 my-orange-color">
            <h6 class="text-center">Photoify Login</h6>

            <div class="col-4 mx-auto pt-1">
                <img src="assets/images/profiles/default_profile.png" class="img-thumbnail img-fluid" alt="Default Profile picture" />
            </div>
        </div>

        <form action="app/users/signin.app_users.php" method="post">

            <div class="form-group m-3">
                <label for="username">Username</label>
                <input id="username" name="username" class="form-control" type="text"
                value="<?= $_SESSION['values']['username'] ?? '' ?>" autocomplete="off"
                placeholder="<?= $_SESSION['errors']['username'] ?? 'Username' ?>" required />
            </div>

            <div class="form-group m-3">
                <label for="password">Password</label>
                <input id="password" name="password" class="form-control" type="password" autocomplete="off"
                placeholder="<?= $_SESSION['errors']['password'] ?? 'Password' ?>" required />
            </div>

            <div class="m-4">
                <button type="submit" class="btn btn-block btn-primary" name="login-btn">Login</button>
            </div>

            <div class="mb-4 text-center">
                <a href="signup.php" class="text-dark d-block font-weight-bold">Don´t have an account ?</a>
                <a href="#" class="text-dark d-block font-weight-bold">I forgot my account</a>
            </div>

        </form>
    </section>
</main>

<?php require __DIR__.'/views/footer.php'; ?>

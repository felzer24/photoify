<?php

require __DIR__.'/views/header.php';

if (isset($_SESSION['logedin'])) {
    redirect('/account.php');
    exit();
}

?>

<main>
    <h3>Photoify Login</h3>

    <div class="login-box-image">
        <div class="placeholder-100">
            <img src="assets/images/profiles/default_profile.png" alt="Default Profile Picture">
        </div>
    </div>

    <form class="user-action-forms signin-form" action="app/users/signin.app_users.php" method="post">

        <div class="banner-messages <?= $_SESSION['banner']['class'] ?? '' ?>">
            <?= $_SESSION['banner']['message'] ?? '' ?>
        </div>

        <label for="username">Username</label>
        <input id="username" type="text" name="username"
        placeholder="<?= $_SESSION['errors']['username'] ?? 'Username' ?>" required />

        <label for="password">Password</label>
        <input id="password" type="password" name="password" autocomplete="off"
        placeholder="<?= $_SESSION['errors']['password'] ?? 'Password' ?>" required />

        <button type="submit" name="login-btn">Login</button>

        <a href="signup.php">Don´t have an account ?</a>
        <a href="#">I forgot my account</a>

    </form>
</main>

<?php require __DIR__.'/views/footer.php'; ?>

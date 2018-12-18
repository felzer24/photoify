<?php require __DIR__.'/views/header.php'; ?>

<main>
    <h3>Photoify Login</h3>

    <div class="login-box-image">
        <div class="placeholder-100">
            <img src="assets/images/profiles/default_profile.png" alt="Default Profile Picture">
        </div>
    </div>

    <form class="user-action-forms signin-form" action="app/users/login.php" method="post">

        <div class="banner-messages <?= $_SESSION['success']['class'] ?? '' ?>">
            <?= $_SESSION['success']['signup'] ?? '' ?>
        </div>

        <label for="username">Username</label>
        <input id="username" type="text" name="username" placeholder="Username" required />

        <label for="password">Password</label>
        <input id="password" type="password" name="password" autocomplete="off" placeholder="Password" required />

        <button type="submit" name="login-btn">Login</button>

        <a href="signup.php">Don´t have an account ?</a>
        <a href="#">I forgot my account</a>

    </form>
</main>

<?php require __DIR__.'/views/footer.php'; ?>

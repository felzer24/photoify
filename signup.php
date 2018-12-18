<?php require __DIR__.'/views/header.php'; ?>

<main>
    <h3>Photoify Create Account</h3>

    <form class="user-action-forms signup-form" action="app/users/signup_app.php" method="post">

        <div class="banner-messages <?= $_SESSION['errors']['class'] ?? '' ?>">
            <?= $_SESSION['errors']['banner'] ?? '' ?>
        </div>

        <label for="email">Email</label>
        <input id="email" type="text" name="email" value="<?= $_SESSION['values']['email'] ?? '' ?>"
        placeholder="<?= $_SESSION['errors']['email'] ?? 'Your Email' ?>" />

        <label for="username">Username</label>
        <input id="username" type="text" name="username" value="<?= $_SESSION['values']['username'] ?? '' ?>"
        placeholder="<?= $_SESSION['errors']['username'] ?? 'Username' ?>" />

        <label for="fullname">Fullname</label>
        <input id="fullname" type="text" name="fullname" placeholder="Firstname Lastname"
        value="<?= $_SESSION['values']['fullname'] ?? '' ?>" />

        <label for="npassword">Create Password</label>
        <input id="npassword" type="password" name="npassword" autocomplete="off"
        placeholder="<?= $_SESSION['errors']['npassword'] ?? 'New Password' ?>" />

        <label for="rpassword">Confirm Password</label>
        <input id="rpassword" type="password" name="rpassword" autocomplete="off"
        placeholder="<?= $_SESSION['errors']['rpassword'] ?? 'Repeat Password' ?>" />

        <label for="timezone">Timezone</label>
        <select name="timezone" id="timezone" />
            <option value="Europe/Stockholm" selected>Europe/Stockholm</option>
            <option value="Europe/London">Europe/London</option>
            <option value="America/New_York">America/NewYork</option>
            <option value="Asia/Dubai">Asia/Dubai</option>
        </select>

        <button type="submit" name="signup-btn">Create Account</button>

        <a href="index.php">Already have an account ?</a>
      </form>

    </form>
</main>

<?php require __DIR__.'/views/footer.php'; ?>

<?php

require __DIR__.'/views/header.php';

if (isset($_SESSION['logedin'])) {
    redirect('/account.php');
    exit();
}

?>

<main class="d-flex justify-content-center my-4">

    <section class="login-form">

        <div class="alert <?= $_SESSION['banner']['class'] ?? 'alert-secondary' ?> m-0 d-flex align-items-center justify-content-center">
            <small><strong><?= $_SESSION['banner']['message'] ?? 'Messages will appear here' ?></strong></small>
        </div>

        <form action="app/users/signup.app_users.php" method="post">

            <div class="form-group m-3">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" class="form-control"
                placeholder="<?= $_SESSION['errors']['email'] ?? 'Your Email' ?>"
                value="<?= $_SESSION['values']['email'] ?? '' ?>" required />
            </div>

            <div class="form-group m-3">
                <label for="username">Username</label>
                <input id="username" type="text" name="username" class="form-control"
                placeholder="<?= $_SESSION['errors']['username'] ?? 'Username' ?>"
                value="<?= $_SESSION['values']['username'] ?? '' ?>" required />
            </div>

            <div class="form-group m-3">
                <label for="fullname">Fullname</label>
                <input id="fullname" type="text" name="fullname" class="form-control"
                placeholder="Firstname Lastname" value="<?= $_SESSION['values']['fullname'] ?? '' ?>" />
            </div>

            <div class="form-group m-3">
                <label for="npassword">Create Password</label>
                <input id="npassword" type="password" name="npassword" class="form-control" autocomplete="off"
                placeholder="<?= $_SESSION['errors']['npassword'] ?? 'New Password' ?>" required />
            </div>

            <div class="form-group m-3">
                <label for="rpassword">Confirm Password</label>
                <input id="rpassword" type="password" name="rpassword" class="form-control" autocomplete="off"
                placeholder="<?= $_SESSION['errors']['rpassword'] ?? 'Repeat Password' ?>" required />
            </div>

            <div class="form-group m-3">
                <label for="timezone">Timezone</label>
                <select name="timezone" id="timezone" class="form-control" />
                    <option value="Europe/Stockholm" selected>Europe/Stockholm</option>
                    <option value="Europe/London">Europe/London</option>
                    <option value="America/New_York">America/NewYork</option>
                    <option value="Asia/Dubai">Asia/Dubai</option>
                </select>
            </div>

            <div class="m-4">
                <button type="submit" class="btn btn-block btn-primary" name="signup-btn">Create Account</button>
            </div>

            <div class="mb-4 text-center">
                <a href="index.php" class="text-dark d-block font-weight-bold">Already have an account ?</a>
            </div>
        </form>
    </section>
</main>

<?php require __DIR__.'/views/footer.php'; ?>

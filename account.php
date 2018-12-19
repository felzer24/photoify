<?php

require __DIR__.'/views/header.php';

if (!isset($_SESSION['logedin'])) {
    redirect('/');
    exit();
}

?>

<main>
    <h3>Welcome <?= $_SESSION['logedin']['fullname'] ?></h3>

    <?php var_dump($_SESSION['logedin']); ?>

    <h3>User Account Created:

        <?php

        $datetime = date_create($_SESSION['logedin']['created_at'], timezone_open('UTC'));
        date_timezone_set($datetime, timezone_open($_SESSION['logedin']['timezone']));
        echo date_format($datetime, 'Y-m-d H:i:s') . "\n";
        $tz = date_timezone_get($datetime);
        echo 'Timezone: '.timezone_name_get($tz);

        ?>
    </h3>

    <div class="banner-messages <?= $_SESSION['banner']['class'] ?? '' ?>">
        <?= $_SESSION['banner']['message'] ?? '' ?>
    </div>

    <form action="app/users/update.app_users.php" method="post" enctype="multipart/form-data">

        <img src="assets/images/profiles/<?= $_SESSION['logedin']['profile_pic'] ?>" alt="Profile picture for <?= $_SESSION['logedin']['username'] ?>" />

        <label for="avatar">Upload your avatar here...<br />
        Accepted formats: jpg/jpeg/gif/png Max filezise: 2MB</label>
        <input id="avatar" type="file" accept=".jpg, .jpeg, .gif, .png" name="profile_pic" />

        <button type="submit" name="update_profile-btn">Save Changes</button>
    </form>

    <a style="color: white;" href="app/users/logout.app_users.php?clicked=true" title="Logout">Logout</a>
</main>

<?php require __DIR__.'/views/footer.php'; ?>
